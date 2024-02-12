<?php
/**
 * @package    DIAFAN.CMS
 *
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
 * Cache
 *
 * Кэширование
 */
class Cache
{
	/**
	 * Преобразует метку и название модуля для работы с кэшем
	 *
	 * @param string|array $name метка кэша
	 * @param string $module название модуля
	 * @return boolean true
	 */
	before private function transform_param($name, $module)
	{
		$domain = $_SERVER['SERVER_NAME'];

		if($name)
		{
			if (! is_array($name))
			{
				$name = $name . $domain;
			}
			else
			{
				$name['host'] = $domain;
			}
		}
	}
}
