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

if (! defined('DIAFAN')) {
	$path = __FILE__;
	while(! file_exists($path.'/includes/404.php'))
	{
		$parent = dirname($path);
		if($parent == $path) exit;
		$path = $parent;
	}
	include $path.'/includes/404.php';
}

class Antispam_install extends Install
{
	/**
	 * @var string название
	 */
	public $title = "Анти-спам";

	/**
	 * @var array таблицы в базе данных
	 */
	public $tables = array(
		array(
			"name" => "antispam",
			"comment" => "Отфильтрованные сообщения",
			"fields" => array(
				array(
					"name" => "id",
					"type" => "INT(11) UNSIGNED NOT NULL AUTO_INCREMENT",
					"comment" => "идентификатор",
				),
				array(
					"name" => "created",
					"type" => "INT(10) UNSIGNED NOT NULL DEFAULT '0'",
					"comment" => "дата создания",
				),
				array(
					"name" => "text",
					"type" => "TEXT",
					"comment" => "сообщение",
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
	);


	/**
	 * @var array записи в таблице {modules}
	 */
	public $modules = array(
		array(
			"name" => "antispam",
			"admin" => true,
			"site" => true,
			"site_page" => false,
		),
	);

	public $admin = array(
		array(
			"name" => "Анти-спам",
			"rewrite" => "antispam",
			"group_id" => 3,
			"sort" => 19,
			"act" => true,
			//"docs" => "http://www.diafan.ru/moduli/obratnaya_svyaz/",
			"children" => array(
				array(
					"name" => "Настройки",
					"rewrite" => "antispam/config",
				),
			)
		),
	);

	/**
	 * @var array настройки
	 */
	public $config = array(
		array(
			"name" => "blacklist",
			"value" => "http\nhttps\nand\nor\nthen\nnew\nnot\nfrom\nthis\nmost\nimportant\nsex\nsexy",
		),
		array(
			"name" => "blacklist_sources",
			"value" => "spam-blacklist.lst",
		),
		array(
			"name" => "fields_to_filter",
			"value" => "",
		),
	);

}
