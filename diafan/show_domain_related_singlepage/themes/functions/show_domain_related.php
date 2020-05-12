<?php
/**
 * Шаблонный тег: Домено-зависимый текст.
 * Вставляет текст, в зависимости от текущего домена.
 */

 /**
 * Массив ссылок
 * Состоит из блоков:
 *	'СТРОКА_ДЛЯ_ПОИСКА_В_АДРЕСЕ' => array(
 *		'css' => 'CSS код'
 *	),
 */

// Подключаем конфиг с массивом CSS-кодов
$data = include(dirname(__FILE__) . '/../domain_related.php');


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

$attributes = $this->get_attributes($attributes, 'key');
$key = $attributes['key'];

$text = '';

foreach ($data as $pattern => $value) {
	if ( $pattern == $_SERVER['SERVER_NAME'] and isset($value[$key]) ) {
		$text = $value[$attributes['key']];
		break;
	}
}

echo $text;
