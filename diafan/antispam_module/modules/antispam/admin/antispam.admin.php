<?php
/**
 * Редактирование почтовых отправлений
 *
 * @package    DIAFAN.CMS
 * @author     diafan.ru
 * @version    6.0
 * @license    http://www.diafan.ru/license.html
 * @copyright  Copyright (c) 2003-2018 OOO «Диафан» (http://www.diafan.ru/)
 */

if ( ! defined('DIAFAN'))
{
	$path = __FILE__;
	while(! file_exists($path.'/includes/404.php'))
	{
		$parent = dirname($path);
		if($parent == $path) exit;
		$path = $parent;
	}
	include $path.'/includes/404.php';
}

/**
 * Antispam_admin
 */
class Antispam_admin extends Frame_admin
{
	/**
	 * @var string таблица в базе данных
	 */
	public $table = 'antispam';

	/**
	 * @var array поля в базе данных для редактирования
	 */
	public $variables = array (
		'main' => array (
			'created' => array(
				'type' => 'datetime',
				'name' => 'Дата',
				'help' => 'Дата поступления сообщения в формате дд.мм.гггг чч:мм.',
			),
			'text' => array(
				'type' => 'textarea',
				'name' => 'Сообщение',
				'help' => 'Отфильтрованное сообщение.',
			),
		),
	);

	/**
	 * @var array поля в списка элементов
	 */
	public $variables_list = array (
		'checkbox' => '',
		'created' => array(
			'name' => 'Дата и время',
			'type' => 'datetime',
			'sql' => true,
			'no_important' => true,
		),
		'text' => array(
			'type' => 'text',
			'class' => 'text',
			'name' => 'Сообщение',
			'help' => 'Отфильтрованное сообщение.',
			'sql' => true,
		),
		'adapt' => array(
			'class_th' => 'item__th_adapt',
		),
		'separator' => array(
			'class_th' => 'item__th_seporator',
		),
		'actions' => array(
			'trash' => true,
		),
	);


	/**
	 * @var array настройки модуля
	 */
	public $config = array (
	);

	/**
	 * Выводит список обращений в обратную связь
	 * @return void
	 */
	public function show()
	{
		$this->diafan->list_row();
	}


	/**
	 * Выводит дополнительные поля в списке
	 *
	 * @return string
	 */
	public function list_variable_text($row)
	{
		$data = json_decode($row['text']);
		if (!empty($data) and property_exists($data, 'field') and !empty($data->{$data->field})) {
			$msg = htmlspecialchars($data->{$data->field});
		} else {
			$msg = $row['id'];
		}
		$text = '<div class="name"><a href="'.$this->diafan->get_base_link($row).'">';
		$text .= !empty($msg) ? $msg : 'Empty';
		$text .= '</a></div>';
		return $text;
	}


	/**
	 * Редактирование поля "Помечает как прочитанное"
	 *
	 * @return void
	 */
	public function edit_variable_text()
	{
		$data = json_decode($this->diafan->value);
		if ($data and property_exists($data, 'field')) {
			echo '<div class="helper">';
			echo '<h2>Текст сообщения:</h2>';
			echo '<pre>';
			echo htmlspecialchars($data->{$data->field});
			echo '</pre>';
			echo '</div>';
		}

		if (!$data) {
			switch (json_last_error()) {
				case JSON_ERROR_NONE:
					echo ' - Ошибок нет';
				break;
				case JSON_ERROR_DEPTH:
					echo ' - Достигнута максимальная глубина стека';
				break;
				case JSON_ERROR_STATE_MISMATCH:
					echo ' - Некорректные разряды или несоответствие режимов';
				break;
				case JSON_ERROR_CTRL_CHAR:
					echo ' - Некорректный управляющий символ';
				break;
				case JSON_ERROR_SYNTAX:
					echo ' - Синтаксическая ошибка, некорректный JSON';
				break;
				case JSON_ERROR_UTF8:
					echo ' - Некорректные символы UTF-8, возможно неверно закодирован';
				break;
				default:
					echo ' - Неизвестная ошибка';
				break;
			}
		}



		echo '<h2>Техническая информация:</h2>';
		echo '<textarea name="text" cols="49" rows="10" readonly>';
		echo $this->diafan->value;
		echo '</textarea>';
	}

}
