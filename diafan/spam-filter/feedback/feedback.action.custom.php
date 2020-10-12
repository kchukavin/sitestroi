<?php
/**
 * Обработка POST-запроса
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

class Feedback_action extends Action
{	
	new protected function url_exists($url) {
		$headers = @get_headers($url);
		if($headers && (strpos($headers[0],'200') !== false)) {
			return true;
		}
		return false;
	}

	new protected function load_array_from_file($file) {
		if (!file_exists($file)) return [];
		return file($file, FILE_IGNORE_NEW_LINES);
	}
	
	new protected function load_array_from_url($url) {
		if (!$this->url_exists($url)) return [];
		return file($url, FILE_IGNORE_NEW_LINES);
	}
	
	new protected function load_blacklist()
	{
		$blackListDefault = ['http', 'https', 'and', 'or', 'then', 'new', 'not', 'from', 'this', 'most', 'important', 'sex', 'sexy'];
		$blackListFile = ABSOLUTE_PATH . 'spam-blacklist.lst';
		$blackListUrl = 'https://sitestroi.net/spam-blacklist-global.lst';

		$blackList = $this->load_array_from_file($blackListFile);

		if (empty($blackList)) {
			$blackList = $this->load_array_from_url($blackListUrl);
		}
		
		if (empty($blackList)) {
			$blackList = $blackListDefault;
		}
		
		$blackList = array_unique($blackList);
		
		foreach ($blackList as $key => $val) {
			$blackList[$key] = trim($val);
			if (empty($blackList[$key])) unset($blackList[$key]);
		}
		
		return $blackList;
	}

	new protected function check_words_blacklist($text)
	{
        $separators = [' ', '.', ',', ';', ':', '?', '<', '>', '_', '"', "'"];
		
		$blackList = $this->load_blacklist();
		
        $textCleaned = str_replace($separators, ' ', strtolower($text));

        $words = explode(' ', $textCleaned);

        foreach ($words as $word) {
            if (in_array($word, $blackList)) return false;
        }

        return true;
	}

	/**
	 * Обрабатывает полученные данные из формы
	 * 
	 * @return void
	 */
	before public function add()
	{
        if (isset($_REQUEST['p19']) and !$this->check_words_blacklist($_REQUEST['p19']))
        {
            $logMessage = date('Y-m-d H:i:s') . ":\n" . print_r($_REQUEST, true) . "\n\n";
            file_put_contents(ABSOLUTE_PATH . 'spam-filtered.log', $logMessage, FILE_APPEND);
            return;
        }

		/*
		print_r($_REQUEST);
		[site_id] => 180
		[tmpcode] => 47951a40efc0d2f7da8ff1ecbfde80f4
		[p17] => name
		[p18] => subject
		[p19] => test@test.test
		[p20] => message
		die();
		*/
	}
}
