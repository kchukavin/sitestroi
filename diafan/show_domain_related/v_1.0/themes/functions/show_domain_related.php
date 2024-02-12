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

require_once(dirname(__FILE__) . '/domain_related.inc.php');
$dr = new DomainRelated();

$attributes = $this->get_attributes($attributes, 'key');
$key = $attributes['key'];

$text = $dr->getText($key);

echo $text;
