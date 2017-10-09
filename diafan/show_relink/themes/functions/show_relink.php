<?php
/**
 * Шаблонный тег: Ссылки перелинковки.
 * Генерирует ссылку в зависимости от адреса текущей страницы.
 *
 * @param array $attributes атрибуты шаблонного тега
 * type - тип вывода ('html' (по умолчанию), 'url', 'title')
 */

 /**
 * Массив ссылок
 * Состоит из блоков:
 *	'СТРОКА_ДЛЯ_ПОИСКА_В_АДРЕСЕ' => array(
 *		'url' => 'URL_ССЫЛКИ',
 *		'title' => 'НАЗВАНИЕ_ССЫЛКИ',
 *	),
 */

// Подключаем конфиг с массивом ссылок
$linksArray = include(dirname(__FILE__) . '/../../relink_config.php');


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

$attributes = $this->get_attributes($attributes, 'type');
$type = $attributes['type'];

$linkToShow = array();

foreach ($linksArray as $pattern => $link) {
	if (preg_match('@.*' . $pattern . '.*@', $this->diafan->_site->rewrite)) {
		$linkToShow = $link;
		break;
	}
}

if (empty($linkToShow)) {
	return;
}

$url = BASE_PATH_HREF . $linkToShow['url'];
$title = $linkToShow['title'];

switch ($type) {
	case 'url':
		echo $url;
		break;
	
	case 'title':
		echo $title;
		break;
	
	default:
		echo '<a href="'. $url .'">'. $title .'</a>';
}

