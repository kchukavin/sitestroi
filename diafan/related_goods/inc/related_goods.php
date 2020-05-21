<?php
/**
 * Выводит список связанных товаров для текущего модуля
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


$currentUrl = '/' . $this->diafan->_route->link($this->diafan->_site->id, $result['id'], $this->diafan->_site->module);
$relatedGoods = $this->htmleditor('<insert name="show_block" module="shop" count="16" images="1" param="29='. $currentUrl .'">');
if (!empty($relatedGoods)) {
	echo '<h3>Связанные товары</h3>';
	echo $relatedGoods;
}
