<?php
/**
 * Шаблон блока калькулятора
 * 
 * Шаблонный тег <insert name="show_block" module="calc" [template="шаблон"]>:
 * выводит блок на сайте
 * 
 * @package    DIAFAN.CMS
 * @author     diafan.ru
 * @version    6.0
 * @license    http://www.diafan.ru/license.html
 * @copyright  Copyright (c) 2003-2017 OOO «Диафан» (http://www.diafan.ru/)
 */

if (! defined('DIAFAN'))
{
    $path = __FILE__; $i = 0;
	while(! file_exists($path.'/includes/404.php'))
	{
		if($i == 10) exit; $i++;
		$path = dirname($path);
	}
	include $path.'/includes/404.php';
}

echo '<div class="calc">';
	echo '<div class="calc__col">';
		echo '<div class="calc__heading">Выбор услуги</div>';

		echo '<label class="calc__row">Курс дрессировки';
			echo '<select name="course">';
				foreach ($result['courses'] as $course) {
					if (empty($course['price'])) continue;
					echo '<option data-price="'. $course['price'] .'" value="'. $course['id'] .'">'. $course['name'] .'</option>';
				}
			echo '</select>';
		echo '</label>';
		echo '<label class="calc__row">Возраст (месяцев)';
			echo '<select name="age">';
				echo '<option value="1">До 12 мес</option>';
				echo '<option value="2">От 13 до 18 мес</option>';
				echo '<option value="3">От 19 мес</option>';
			echo '</select>';
		echo '</label>';
		echo '<label class="calc__row">Способ дрессировки';
			echo '<select name="method">';
				echo '<option value="1">С выездом</option>';
				echo '<option value="2">С проживанием у дрессировщика</option>';
			echo '</select>';
		echo '</label>';
		echo '<label class="calc__row">Пост гарантийное обслуживание (количество учебных часов)';
			echo '<input name="warranty" type="number" value="1" min="0">';
		echo '</label>';
	echo '</div>';

	echo '<div class="calc__col">';
		echo '<div class="calc__heading">Предварительный расчет</div>';

        echo '<div class="calc__selected"></div>';

        echo '<div class="calc__total">';
            echo 'Итого: <span class="calc__value">0</span>';
        echo '</div>';

        echo '<p>Оставить заявку</p>';
        echo '<div class="calc__form">';
            echo $this->htmleditor('<insert name="show_form" module="feedback" template="calc" site_id="202" />');
        echo '</div>';
	echo '</div>';
echo '</div>';


$this->diafan->_site->js_view[] = 'modules/calc/js/calc.js';
?>

