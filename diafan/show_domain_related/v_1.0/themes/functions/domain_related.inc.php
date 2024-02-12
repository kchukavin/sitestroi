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
 * Domain related
 */
class DomainRelated
{
	private $data = null;

	protected function getData()
	{
		if ($this->data === null) {
			$this->data = include(ABSOLUTE_PATH . 'config_domain_related.php');
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
		foreach ($this->getData() as $pattern => $value) {
			if ( $pattern == $_SERVER['SERVER_NAME'] and isset($value[$key]) ) {
				return $value[$key];
			}
		}
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
