<?php
/**
 * Редактирование товаров
 * 
 * @package    DIAFAN.CMS
 * @author     diafan.ru
 * @version    6.0
 * @license    http://www.diafan.ru/license.html
 * @copyright  Copyright (c) 2003-2016 OOO «Диафан» (http://www.diafan.ru/)
 */
if ( ! defined('DIAFAN'))
{
	$path = __FILE__; $i = 0;
	while(! file_exists($path.'/includes/404.php'))
	{
		if($i == 10) exit; $i++;
		$path = dirname($path);
	}
	include $path.'/includes/404.php';
}

/**
 * Shop_admin
 */
class Shop_admin extends Frame_admin
{
	new protected function addArrayValueAfterKey($array, $key, $value)
	{
		$pos = array_search($key, array_keys($array)) + 1;
		return array_slice($array, 0, $pos, true)
			+ $value
			+ array_slice($array, $pos, count($array) - $pos, true);
	}

	new public function __construct(&$diafan)
	{
		$this->variables['main'] = $this->addArrayValueAfterKey($this->variables['main'], 'rel_elements', [
			'rel2_elements' => [
				'type' => 'function',
				'name' => 'С этим покупают',
				'help' => '',
				'no_save' => true,
			],
		]);

		return parent::__construct($diafan);
	}
}
