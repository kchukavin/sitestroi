<?php
/**
 * Редактирование
 * 
 * @package    DIAFAN.CMS
 * @author     diafan.ru
 * @version    6.0
 * @license    http://www.diafan.ru/license.html
 * @copyright  Copyright (c) 2003-2018 OOO «Диафан» (http://www.diafan.ru/)
 */

if (! defined('DIAFAN'))
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
 * Pagegen_admin
 */
class Pagegen_admin extends Frame_admin
{
	/**
	 * @var string таблица в базе данных
	 */
	public $table = 'pagegen';

	/**
	 * @var array поля в базе данных для редактирования
	 */
	public $variables = array (
		'main' => array (
            'id' => array(
                'type' => 'text',
                'name' => 'ID',
                'sql' => true,
            ),
			'cat_id' => array(
				'type' => 'function',
				'name' => 'Категория',
				'help' => 'Категория, к которой относится страница.',
			),
			'act' => array(
				'type' => 'checkbox',
				'name' => 'Опубликовать на сайте',
				'help' => 'Если не отмечена, новость не увидят посетители сайта.',
				'default' => true,
				'multilang' => true,
			),
            'name' => array(
                'type' => 'text',
                'name' => 'Название',
                'sql' => true,
            ),
			'text' => array(
				'type' => 'editor',
				'name' => 'Текст',
				'help' => 'Сгенерированный текст страницы.',
			),
        ),
        'other_rows' => array(
			'title_meta' => array(
				'type' => 'text',
				'name' => 'Заголовок окна в браузере, тег Title',
				'help' => 'Если не заполнен, тег *Title* будет автоматически сформирован как «Название категории – Название страницы – Название сайта», либо согласно шаблонам автоформирования из настроек модуля (SEO-специалисту).',
				'multilang' => false,
			),
			'keywords' => array(
				'type' => 'textarea',
				'name' => 'Ключевые слова, тег Keywords',
				'help' => 'Если не заполнен, тег *Keywords* будет автоматически сформирован согласно шаблонам автоформирования из настроек модуля (SEO-специалисту).',
				'multilang' => false,
			),
			'descr' => array(
				'type' => 'textarea',
				'name' => 'Описание, тег Description',
				'help' => 'Если не заполнен, тег *Description* будет автоматически сформирован согласно шаблонам автоформирования из настроек модуля (SEO-специалисту).',
				'multilang' => false,
			),
        ),
	);

	/**
	 * @var array поля в списка элементов
	 */
	public $variables_list = array (
		'checkbox' => '',
        'id' => array(
            'type' => 'text',
            'name' => 'ID',
            'sql' => true,
        ),
        'name' => array(
            'type' => 'text',
            'name' => 'Название',
            'sql' => true,
        ),
        'cat' => array(
            'type' => 'function',
            'name' => 'Категория',
            'help' => 'Категория, к которой относится страница.',
        ),
        'params' => array(
			'type' => 'text',
            'name' => 'Параметры',
			'sql' => true,
		),
		'actions' => array(
			'view' => true,
			'act' => true,
			'trash' => true,
		),
	);

	/**
	 * @var array настройки модуля
	 */
	public $config = array (
		'element_site', // делит элементы по разделам (страницы сайта, к которым прикреплен модуль)
		'element', // используются группы
		'element_multiple', // модуль может быть прикреплен к нескольким группам
	);


	/**
	 * @var array поля для фильтра
	 */
	public $variables_filter = array (
		'cat_id' => array(
			'type' => 'select',
			'name' => 'Искать по категории',
		),
		'site_id' => array(
			'type' => 'select',
			'name' => 'Искать по разделу',
		),
	);


	/**
	 * Подготавливает конфигурацию модуля
	 * @return void
	 */
	public function prepare_config()
	{
		if(! $this->diafan->configmodules("cat", "pagegen", $this->diafan->_route->site))
		{
			$this->diafan->config("element", false);
			$this->diafan->config("element_multiple", false);
		}
	}

	/**
	 * Выводит список
	 * @return void
	 */
	public function show()
	{
		$this->diafan->list_row();
	}


	/**
	 * Выводит название категории в списке элементов
	 *
	 * @param array $row информация о текущем элементе списка
	 * @param array $var текущее поле
	 * @return string
	 */
	public function list_variable_cat($row, $var)
	{
		$cat_id = DB::query_result("SELECT cat_id FROM {pagegen} WHERE id=%d", $row['id']);
		$text = '<div class="name'.($var["class"] ? ' '.$var["class"] : '').'">';
        $text .= DB::query_result("SELECT [name] FROM {pagegen_category} WHERE id=%d AND site_id=%d", $cat_id, $row['site_id']);
		$text .= '</div>';
		return $text;
	}
}
