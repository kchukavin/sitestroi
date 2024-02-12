<?php
/**
 * Установка модуля
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

class Pagegen_install extends Install
{
	/**
	 * @var string название
	 */
	public $title = "Генератор страниц";

	/**
	 * @var array записи в таблице {modules}
	 */
	public $modules = array(
		array(
			"name" => "pagegen",
			"admin" => true,
			"site" => true,
			"site_page" => true,
		),
	);

	/**
	 * @var array меню административной части
	 */
	public $admin = array(
		array(
			"name" => "Генератор страниц",
			"rewrite" => "pagegen",
			"group_id" => 1,
			"sort" => 5,
			"act" => true,
			"add" => true,
			"add_name" => "Страница",
			"children" => array(
				array(
					"name" => "Сгенерированные страницы",
					"rewrite" => "pagegen",
					"act" => true,
				),
				array(
					"name" => "Категории",
					"rewrite" => "pagegen/category",
					"act" => true,
				),
				array(
					"name" => "Настройки",
					"rewrite" => "pagegen/config",
				),
			)
		),
	);

	public $tables = array(
		array(
			"name" => "pagegen",
			"comment" => "Генератор страниц",
			"fields" => array(
				array(
					"name" => "id",
					"type" => "INT(11) UNSIGNED NOT NULL AUTO_INCREMENT",
					"comment" => "идентификатор",
				),
				array(
					"name" => "name",
					"type" => "TEXT",
					"comment" => "Название",
					"multilang" => false,
				),
				array(
					"name" => "text",
					"type" => "TEXT",
					"comment" => "Содержание",
					"multilang" => false,
				),
				array(
					"name" => "keywords",
					"type" => "VARCHAR(250) NOT NULL DEFAULT ''",
					"comment" => "ключевые слова, тег Keywords",
					"multilang" => false,
				),
				array(
					"name" => "descr",
					"type" => "TEXT",
					"comment" => "описание, тэг Description",
					"multilang" => false,
				),
				array(
					"name" => "title_meta",
					"type" => "VARCHAR(250) NOT NULL DEFAULT ''",
					"comment" => "заголовок окна в браузере, тег Title",
					"multilang" => false,
				),
				array(
					"name" => "params",
					"type" => "TEXT",
					"comment" => "Значения параметров",
					"multilang" => false,
				),
				array(
					"name" => "cat_id",
					"type" => "INT(11) UNSIGNED NOT NULL DEFAULT '0'",
					"comment" => "идентификатор основной категории из таблицы {pagegen_category}",
				),
				array(
					"name" => "site_id",
					"type" => "INT(11) UNSIGNED NOT NULL DEFAULT '0'",
					"comment" => "идентификатор страницы сайта из таблицы {site}",
				),
				array(
					"name" => "act",
					"type" => "ENUM('0', '1') NOT NULL DEFAULT '0'",
					"comment" => "показывать на сайте: 0 - нет, 1 - да",
					"multilang" => true,
				),
                array(
                    "name" => "trash",
                    "type" => "ENUM('0', '1') NOT NULL DEFAULT '0'",
                    "comment" => "запись удалена в корзину: 0 - нет, 1 - да",
                ),
			),
			"keys" => array(
				"PRIMARY KEY (id)",
			),
		),
		array(
			"name" => "pagegen_category",
			"comment" => "Категории",
			"fields" => array(
				array(
					"name" => "id",
					"type" => "INT(11) UNSIGNED NOT NULL AUTO_INCREMENT",
					"comment" => "идентификатор",
				),
				array(
					"name" => "parent_id",
					"type" => "INT(11) UNSIGNED NOT NULL DEFAULT '0'",
					"comment" => "идентификатор родителя из таблицы {pagegen_category}",
				),
				array(
					"name" => "name",
					"type" => "TEXT",
					"comment" => "название",
					"multilang" => true,
				),
				array(
					"name" => "params",
					"type" => "TEXT",
					"comment" => "Варианты параметров",
					"multilang" => false,
				),
				array(
					"name" => "act",
					"type" => "ENUM('0', '1') NOT NULL DEFAULT '0'",
					"comment" => "показывать на сайте: 0 - нет, 1 - да",
					"multilang" => true,
				),
				array(
					"name" => "map_no_show",
					"type" => "ENUM( '0', '1' ) NOT NULL DEFAULT '0'",
					"comment" => "не показывать на карте сайта: 0 - нет, 1 - да",
				),
				array(
					"name" => "changefreq",
					"type" => "ENUM( 'always', 'hourly', 'daily', 'weekly', 'monthly', 'yearly', 'never' ) NOT NULL DEFAULT 'always'",
					"comment" => "Changefreq для sitemap.xml",
				),
				array(
					"name" => "priority",
					"type" => "VARCHAR(3) NOT NULL DEFAULT ''",
					"comment" => "Priority для sitemap.xml",
				),
				array(
					"name" => "noindex",
					"type" => "ENUM('0','1') NOT NULL DEFAULT '0'",
					"comment" => "не индексировать: 0 - нет, 1 - да",
				),
				array(
					"name" => "site_id",
					"type" => "INT(11) UNSIGNED NOT NULL DEFAULT '0'",
					"comment" => "идентификатор страницы сайта из таблицы {site}",
				),
				array(
					"name" => "keywords",
					"type" => "VARCHAR(250) NOT NULL DEFAULT ''",
					"comment" => "ключевые слова, тег Keywords",
					"multilang" => true,
				),
				array(
					"name" => "descr",
					"type" => "TEXT",
					"comment" => "описание, тэг Description",
					"multilang" => true,
				),
				array(
					"name" => "canonical",
					"type" => "VARCHAR(100) NOT NULL DEFAULT ''",
					"comment" => "канонический тег",
					"multilang" => true,
				),
				array(
					"name" => "title_meta",
					"type" => "VARCHAR(250) NOT NULL DEFAULT ''",
					"comment" => "заголовок окна в браузере, тег Title",
					"multilang" => true,
				),
				array(
					"name" => "name_tpl",
					"type" => "TEXT",
					"comment" => "Шаблон названия страницы",
					"multilang" => false,
				),
				array(
					"name" => "keywords_tpl",
					"type" => "VARCHAR(250) NOT NULL DEFAULT ''",
					"comment" => "ключевые слова, тег Keywords",
					"multilang" => false,
				),
				array(
					"name" => "descr_tpl",
					"type" => "TEXT",
					"comment" => "описание, тэг Description",
					"multilang" => false,
				),
				array(
					"name" => "title_meta_tpl",
					"type" => "VARCHAR(250) NOT NULL DEFAULT ''",
					"comment" => "заголовок окна в браузере, тег Title",
					"multilang" => false,
				),
				array(
					"name" => "text",
					"type" => "TEXT",
					"comment" => "описание",
					"multilang" => true,
				),
				array(
					"name" => "sort",
					"type" => "INT(11) UNSIGNED NOT NULL DEFAULT '0'",
					"comment" => "подрядковый номер для сортировки",
				),
				array(
					"name" => "theme",
					"type" => "VARCHAR(50) NOT NULL DEFAULT ''",
					"comment" => "шаблон страницы сайта",
				),
				array(
					"name" => "view",
					"type" => "VARCHAR(50) NOT NULL DEFAULT ''",
					"comment" => "шаблон модуля",
				),
				array(
					"name" => "view_rows",
					"type" => "VARCHAR(50) NOT NULL DEFAULT ''",
					"comment" => "шаблон модуля для элементов в списке категории",
				),
				array(
					"name" => "view_element",
					"type" => "VARCHAR(50) NOT NULL DEFAULT ''",
					"comment" => "шаблон модуля для элементов в категории",
				),
				array(
					"name" => "view_gen",
					"type" => "VARCHAR(50) NOT NULL DEFAULT ''",
					"comment" => "шаблон генерации для элементов в категории",
				),
				array(
					"name" => "trash",
					"type" => "ENUM('0', '1') NOT NULL DEFAULT '0'",
					"comment" => "запись удалена в корзину: 0 - нет, 1 - да",
				),
			),
			"keys" => array(
				"PRIMARY KEY (id)",
				"KEY site_id (site_id)",
			),
		),
		array(
			"name" => "pagegen_category_parents",
			"comment" => "Родительские связи категорий",
			"fields" => array(
				array(
					"name" => "id",
					"type" => "INT( 11 ) UNSIGNED NOT NULL AUTO_INCREMENT",
					"comment" => "идентификатор",
				),
				array(
					"name" => "element_id",
					"type" => "INT( 11 ) UNSIGNED NOT NULL DEFAULT '0'",
					"comment" => "идентификатор категории из таблицы {pagegen_category}",
				),
				array(
					"name" => "parent_id",
					"type" => "INT( 11 ) UNSIGNED NOT NULL DEFAULT '0'",
					"comment" => "идентификатор категории-родителя из таблицы {pagegen_category}",
				),
				array(
					"name" => "trash",
					"type" => "ENUM( '0', '1' ) NOT NULL DEFAULT '0'",
					"comment" => "запись удалена в корзину: 0 - нет, 1 - да",
				),
			),
			"keys" => array(
				"PRIMARY KEY (id)",
			),
		),
		array(
			"name" => "pagegen_category_rel",
			"comment" => "Связи страниц и категорий",
			"fields" => array(
				array(
					"name" => "id",
					"type" => "INT(11) UNSIGNED NOT NULL AUTO_INCREMENT",
					"comment" => "идентификатор",
				),
				array(
					"name" => "element_id",
					"type" => "INT(11) UNSIGNED NOT NULL DEFAULT '0'",
					"comment" => "идентификатор страницы из таблицы {pagegen}",
				),
				array(
					"name" => "cat_id",
					"type" => "INT(11) UNSIGNED NOT NULL DEFAULT '0'",
					"comment" => "идентификатор категории из таблицы {pagegen_category}",
				),
				array(
					"name" => "trash",
					"type" => "ENUM('0', '1') NOT NULL DEFAULT '0'",
					"comment" => "запись удалена в корзину: 0 - нет, 1 - да",
				),
			),
			"keys" => array(
				"PRIMARY KEY (id)",
				"KEY cat_id (`cat_id`)",
			),
		),
	);

}
