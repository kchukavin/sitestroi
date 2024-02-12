<?php

$configAll = include(ABSOLUTE_PATH . 'config_domain_related.php');

foreach ($configAll as $subdomain => $config) {
	
	if (empty($config['subfolder'])) continue;
	$subfolder = $config['subfolder'];

	$GLOBALS["url_replace"] = '';
	$GLOBALS["url_replace_to"] = '';

	if (preg_match('#^'. $subfolder .'/?(.*)#', $_GET["rewrite"], $m)) {
		
		$_GET["rewrite"] = $m[1];
		$_SERVER['SERVER_NAME'] = $subfolder . '.avtolombard116.ru';
		
		$GLOBALS["url_replace"] = [
			'/',
			'https://www.avtolombard116.ru/'
		];
		$GLOBALS["url_replace_to"] = 'https://www.avtolombard116.ru/'. $subfolder .'/';
		
		break;
	}
}
