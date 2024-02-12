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
 * Shop_admin_config
 */
class Shop_admin_config extends Frame_admin
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
		$this->variables['base'] = $this->addArrayValueAfterKey($this->variables['base'], 'rel_two_sided', [
			'rel2_two_sided' => [
				'type' => 'checkbox',
				'name' => 'В блоке с этим покупают связь двусторонняя',
				'help' => 'Если отметить, то при назначении товару А похожего товара Б, у товара Б автоматически станет похожим товар А.',
			]
		]);

		return parent::__construct($diafan);
	}
}    
