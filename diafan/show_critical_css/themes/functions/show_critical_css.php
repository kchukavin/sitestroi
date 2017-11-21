<?php
/**
 * Шаблонный тег: Критический CSS.
 * Вставляет inline-css код в зависимости от адреса текущей страницы.
 */

 /**
 * Массив ссылок
 * Состоит из блоков:
 *	'СТРОКА_ДЛЯ_ПОИСКА_В_АДРЕСЕ' => array(
 *		'css' => 'CSS код'
 *	),
 */

// Подключаем конфиг с массивом CSS-кодов
$linksArray = include(dirname(__FILE__) . '/../critical_css.php');


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

$cssToShow = array();

foreach ($linksArray as $pattern => $value) {
	if (preg_match('@.*' . $pattern . '.*@', $_SERVER['REQUEST_URI'])) {
		$cssToShow = $value;
		break;
	}
}

if (!isset($cssToShow['css'])) {
	return;
}

echo '<style>'. $cssToShow['css'] .'</style>';



