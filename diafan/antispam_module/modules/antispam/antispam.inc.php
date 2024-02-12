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
	const SESSION_MAX_UNIQUE_TEXT = 2;
	const SESSION_MAX_DAY_POSTS = 3;
	const SESSION_BLOCK_DAYS = 3;

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

	protected function load_json_file($filename) {
		if (!file_exists($filename)) return [];
		$json = file_get_contents($filename);
		return json_decode($json, true);
	}

	protected function save_json_file($filename, $data = null) {
		if ($data === null) {
			return;
		}
		if (!file_exists(dirname($filename))) {
			mkdir(dirname($filename), 0777, true);
		}
		file_put_contents($filename, json_encode($data));
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

	protected function get_session_filename()
	{
		return ABSOLUTE_PATH . 'cache/antispam_sessions/' . md5($_SERVER['HTTP_COOKIE']) . '.json';
	}

	protected function calc_session_block_to($data)
	{
		$log = $data['log'];
		$datas = array_column($log, 'data');
		$times = array_column($log, 'time');
		$minTime = min($times ? $times : [0]);
		$maxTime = max($times ? $times : [0]);
		if (count($log) > self::SESSION_MAX_DAY_POSTS and ($maxTime - $minTime < 24 * 60 * 60)) {
			return $maxTime + self::SESSION_BLOCK_DAYS * 24 * 60 * 60;
		}
		if (count(array_unique($datas)) > self::SESSION_MAX_UNIQUE_TEXT) {
			return $maxTime + self::SESSION_BLOCK_DAYS * 24 * 60 * 60;
		}
		return $data['block_to'];
	}

	protected function check_session($text)
	{
		$filename = $this->get_session_filename();
		$data = $this->load_json_file($filename);

		if (!$data) {
			$data = [
				'block_to' => 0,
				'log' => []
			];
		}

		$data['log'][] = [
			'time' => time(),
			'data' => $text
		];

		$logLength = self::SESSION_MAX_DAY_POSTS + 1;
		$data['log'] = array_slice($data['log'], -$logLength, $logLength);

		$blockTo = $this->calc_session_block_to($data);
		$data['block_to'] = $blockTo;

		$this->save_json_file($filename, $data);

		return $blockTo < time();
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
			
			$testTypes = ['bl'];
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
			$field = array_shift($fieldArr);

			if ($fieldArr) {
				$testTypes = $fieldArr;
			}

			$filters = [];

			foreach ($testTypes as $testType) {
				switch ($testType) {
					case 'ne': // Not empty
						if (!isset($_REQUEST[$field]) or !$this->check_not_empty($_REQUEST[$field])) {
							$filters[] = 'Not empty';
						}
					break;
					
					case 'se': // Unique for session
						if (!$this->check_session($_REQUEST[$field])) {
							$filters[] = 'Suspicious session';
						}
					break;
					
					case 'bl': // BlackList
					default:
						if (isset($_REQUEST[$field]) and !$this->check_words_blacklist($_REQUEST[$field]))
						{
							$filters[] = 'Black list';
						}
				}
			}

			if (!empty($filters)) {
				$data = array_merge(
					$_REQUEST,
					[
						'filters' => $filters,
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
