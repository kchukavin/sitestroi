<?php
/**
 * @package    DIAFAN.CMS
 * @author     diafan.ru
 * @version    6.0
 * @license    http://www.diafan.ru/license.html
 * @copyright  Copyright (c) 2003-2016 OOO «Диафан» (http://www.diafan.ru/)
 */

if (! defined('DIAFAN'))
{
	echo 'DIAFAN.CMS version 6.0.3.7'; exit;
}

/**
 * Init
 *
 * Основной класс системы
 */
class Init extends Core
{
	/**
	 * Инициализирует генерирование страницы
	 *
	 * @return void
	 */
	before public function start()
	{
		if ($GLOBALS["url_replace"]) {
			ob_start();
		}
	}

	/**
	 * Инициализирует генерирование страницы
	 *
	 * @return void
	 */
	after public function start()
	{
		if ($GLOBALS["url_replace"]) {
			$diafan_output = ob_get_contents();
			ob_end_clean();
			
			//$diafan_output = str_replace('href="' . $GLOBALS["url_replace"], 'href="' . $GLOBALS["url_replace_to"], $diafan_output);
			
			//$regex = '~<a ([^>]*)href="'. $GLOBALS["url_replace"] .'(.*"[^>]*)>~m';
			//$diafan_output = preg_replace($regex, '<a \\1href="'. $GLOBALS["url_replace_to"] .'\\2>', $diafan_output);
			
			// Parse the HTML into a document
			libxml_use_internal_errors(true);
			$dom = new \DOMDocument();
			$dom->loadHtml($diafan_output);

			// Loop over all links within the `<body>` element
			foreach($dom->getElementsByTagName('body')[0]->getElementsByTagName('a') as $link) {
				// Save the existing link
				$oldLink = $link->getAttribute('href');
				$newLink = '';
				
				if (!is_array($GLOBALS["url_replace"])) $GLOBALS["url_replace"] = [$GLOBALS["url_replace"]];
				
				foreach ($GLOBALS["url_replace"] as $key => $from) {
					$to = is_array($GLOBALS["url_replace_to"]) ? $GLOBALS["url_replace_to"][$key] : $GLOBALS["url_replace_to"];
					$regex = '~^' . $from . '~';
					if (preg_match($regex, $oldLink)) {
						$newLink = preg_replace($regex, $to, $oldLink);
						break;
					}
					// $newLink = str_replace($GLOBALS["url_replace"], $GLOBALS["url_replace_to"], $oldLink);
				}

				// Prefix the link with the new URL
				if ($newLink) $link->setAttribute('href', $newLink);
			}

			// Output the result
			$diafan_output = $dom->saveHtml();
			
			echo $diafan_output;
		}
	}
}

