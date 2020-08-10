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

class Reviews_action extends Action
{	

	new protected function check_words_blacklist($text)
	{
        $separators = [' ', '.', ',', ';', ':', '?', '<', '>', '_', '"', "'"];
        $blackList = ['http', 'https', 'and', 'or', 'then', 'new', 'not', 'from', 'this', 'most', 'important', 'sex', 'sexy'];

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
		if ($_REQUEST['element_id'] == 39) {
			if (!$this->check_words_blacklist($_REQUEST['p8']))
			{
				$logMessage = date('Y-m-d H:i:s') . ":\n" . print_r($_REQUEST, true) . "\n\n";
				file_put_contents(ABSOLUTE_PATH . 'spam-filtered.log', $logMessage, FILE_APPEND);
				return;
			}
		}
	}
}
