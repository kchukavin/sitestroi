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
	new protected function load_blacklist()
	{
        $blackList = ['http', 'https', 'and', 'or', 'then', 'new', 'not', 'from', 'this', 'most', 'important', 'sex', 'sexy'];
		
		$blackList = array_unique(array_merge($blackList, file(ABSOLUTE_PATH . 'spam-blacklist.lst', FILE_IGNORE_NEW_LINES)));
		
		foreach ($blackList as $key => $val) {
			$blackList[$key] = trim($val);
			if (empty($blackList[$key])) unset($blackList[$key]);
		}
		
		return $blackList;
	}

	new protected function check_words_blacklist($text)
	{
        $separators = [' ', '.', ',', ';', ':', '?', '<', '>'];
		
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
		if ($_REQUEST['site_id'] == 165) {
			if (!$this->check_words_blacklist($_REQUEST['p19']))
			{
				$logMessage = date('Y-m-d H:i:s') . ":\n" . print_r($_REQUEST, true) . "\n\n";
				file_put_contents(ABSOLUTE_PATH . 'spam-filtered.log', $logMessage, FILE_APPEND);
				return;
			}
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