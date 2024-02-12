<?php
/**
 * Настройки модуля
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
 * Antispam_admin_config
 */
class Antispam_admin_config extends Frame_admin
{
	/**
	 * @var array поля в базе данных для редактирования
	 */
	public $variables = array (
		'config' => array (
			'blacklist' => array(
				'type' => 'textarea',
				'name' => 'Список блокируемых слов (blacklist)',
				'help' => 'Слова через запятую или с новой строки.',
			),
			'blacklist_sources' => array(
				'type' => 'textarea',
				'name' => 'Внешний источник блокируемых слов',
				'help' => 'Список файлов (от корня сайта) или URL с дополнительными источниками слов. Один на строку.',
			),
			'fields_to_filter' => array(
				'type' => 'text',
				'name' => 'Список полей для проверки',
				'help' => 'Имена input-полей в формах через запятую. Перед полем через точку можно указать номер страницы (site_id), а после поля через двоеточие тип фильтра. Например: p17,180.p64:ne,p95',
			),
		),
	);

	/**
	 * @var array настройки модуля
	 */
	public $config = array (
		'config', // файл настроек модуля
	);
}
