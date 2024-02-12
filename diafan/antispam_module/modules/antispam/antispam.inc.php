<?php
/**
 * Подключение модуля
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

/**
 * Antispam_inc
 */
class Antispam_inc extends Model
{
	protected $blacklist = null;

	protected function url_exists($url) {
		if (filter_var($url, FILTER_VALIDATE_URL) === false) return false;

		$headers = @get_headers($url);
		if(!$headers || (strpos($headers[0],'200') === false)) {
			return false;
		}
		return true;
	}

	protected function load_array_from_file($file) {
		if (!file_exists($file)) return [];
		return file($file, FILE_IGNORE_NEW_LINES);
	}
	
	protected function load_array_from_url($url) {
		if (!$this->url_exists($url)) return [];
		return file($url, FILE_IGNORE_NEW_LINES);
	}

	protected function load_blacklist()
	{
		$blackList = explode(
			'##EXPLODE##',
			str_replace(["\r\n", "\r", "\n", ','], '##EXPLODE##', $this->diafan->configmodules('blacklist', 'antispam'))
		);

		$blackListSources = explode(
			'##EXPLODE##',
			str_replace(["\r\n", "\r", "\n"], '##EXPLODE##', $this->diafan->configmodules('blacklist_sources', 'antispam'))
		);

		foreach ($blackListSources as $blackListSource) {
			$blackList = array_merge($blackList, $this->load_array_from_file(ABSOLUTE_PATH . $blackListSource));
			$blackList = array_merge($blackList, $this->load_array_from_url($blackListSource));
		}
		
		foreach ($blackList as $key => $val) {
			$blackList[$key] = trim($val);
			if (empty($blackList[$key])) unset($blackList[$key]);
		}
		
		$blackList = array_unique($blackList);

		return $blackList;
	}

	public function get_blacklist()
	{
		if ($this->blacklist === null)
		{
			$this->blacklist = $this->load_blacklist();
		}

		return $this->blacklist;
	}

	protected function check_words_blacklist($text)
	{
		$separators = [' ', '.', ',', ';', ':', '?', '<', '>', '_', '"', "'", "\n", "\r"];
		
		$blackList = $this->get_blacklist();

		$textCleaned = str_replace($separators, ' ', strtolower($text));

		$words = explode(' ', $textCleaned);

		foreach ($words as $word) {
			if (in_array($word, $blackList)) return false;
		}

		return true;
	}
	
	protected function check_not_empty($text)
	{
		if (empty($text)) return false;
		return true;
	}

	public function check_spam()
	{
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

		$fields = explode(',', $this->diafan->configmodules('fields_to_filter', 'antispam'));

		foreach ($fields as $field) {
			$siteId = null;
			
			$testType = 'bl';
			$field = trim($field);
			
			$fieldArr = explode('.', $field);
			if (isset($fieldArr[1])) {
				$siteId = $fieldArr[0];
				$field = $fieldArr[1];
			}
			if (!is_null($siteId) and $_REQUEST['site_id'] != $siteId) {
				continue;
			}
			
			$fieldArr = explode(':', $field);
			$field = $fieldArr[0];

			if (isset($fieldArr[1])) {
				$testType = trim($fieldArr[1]);
			}

			$filter = null;

			switch ($testType) {
				case 'ne': // Not empty
					if (!isset($_REQUEST[$field]) or !$this->check_not_empty($_REQUEST[$field])) {
						$filter = 'Not empty';
					}
				break;
				
				case 'bl': // BlackList
				default:
					if (isset($_REQUEST[$field]) and !$this->check_words_blacklist($_REQUEST[$field]))
					{
						$filter = 'Black list';
					}
			}

			if (!empty($filter)) {
				$data = array_merge(
					$_REQUEST,
					[
						'filter' => $filter,
						'field' => $field,
					]
				);
				$save = DB::query("INSERT INTO {antispam} (created, `text`) VALUES (%d, %b)", time(), json_encode($data));
				return false;
			}
			
		}

		return true;
	}
}
