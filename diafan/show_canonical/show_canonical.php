<?php
/**
 * Шаблонный тег: выводит ссылку rel canonical
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

echo '<link rel="canonical" href="https://'.$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'].'" >';

