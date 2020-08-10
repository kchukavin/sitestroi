<?php
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
 * Custom string
 */
class CustomString
{
	private $data = null;

	protected function getData()
	{
		if ($this->data === null) {
			$this->data = include(dirname(__FILE__) . '/../../custom_string.conf.php');
		}
		return $this->data;
	}
	

	protected function getDomainData()
	{
		$r = [];

		$data = $this->getData();
		if (isset($data[$_SERVER['SERVER_NAME']])) {
			$r = $data[$_SERVER['SERVER_NAME']];
		}

		return $r;
	}

	public function getText($key)
	{
		$r = '';
		if (isset($_GET[$key])) {
			$data = $this->getData();
			$r = isset($data[$key][$_GET[$key]]) ? $data[$key][$_GET[$key]] : '';
		}
		return $r;
	}

	public function replaceKeys($text)
	{
		$data = $this->getDomainData();

		$keys = array();
		$values = array();

		foreach ($data as $key => $value) {
			$keys []= '$' . $key;
			$values []= $value;
		}

		$r = str_replace($keys, $values, $text);

		return $r;
	}
}
