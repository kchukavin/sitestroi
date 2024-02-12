<?php
header('Content-Type: text/plain');

$googleEnabled = [
	'avtolombard116.ru',
	'www.avtolombard116.ru',
];

$template = 'robots.tpl';

if (in_array($_SERVER['SERVER_NAME'], $googleEnabled)) {
	$template = 'robots_google_enabled.tpl';
}

$text = file_get_contents($template);

$generated = preg_replace('/\$DOMAIN/', $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['SERVER_NAME'], $text);

echo $generated;
