<?php
/**
 * Шаблонный тег: выводит заголовок. Используется между тегами `<title></title>` в шапке сайта.
 * 
 * @package    DIAFAN.CMS
 * @author     diafan.ru
 * @version    6.0
 * @license    http://www.diafan.ru/license.html
 * @copyright  Copyright (c) 2003-2016 OOO «Диафан» (http://www.diafan.ru/)
 */

if (! defined('DIAFAN'))
{
	$path = __FILE__; $i = 0;
	while(! file_exists($path.'/includes/404.php'))
	{
		if($i == 10) exit; $i++;
		$path = dirname($path);
	}
	include $path.'/includes/404.php';
}

require_once(dirname(__FILE__) . '/domain_related.inc.php');
$dr = new DomainRelated();

if ($this->diafan->_site->titlemodule_meta)
{
	$text = $this->diafan->_site->titlemodule_meta;
	echo $dr->replaceKeys($text);
	return;
}
if($this->diafan->_route->page > 1)
{
	$page = $this->diafan->_(' — Страница %d', false, $this->diafan->_route->page);
}
else
{
	$page = '';
}
if ($this->diafan->_site->title_meta)
{
	$text = ($this->diafan->_site->titlemodule ? $this->diafan->_site->titlemodule.' — ' : '').$this->diafan->_site->title_meta.$page;
	echo $dr->replaceKeys($text);
	return;
}
if($this->diafan->configmodules('title_tpl', 'site'))
{
	if($this->diafan->_site->parent_id && ! $this->diafan->_site->parent_name
	   && strpos($this->diafan->configmodules("title_tpl", 'site'), '%parent') !== false)
	{
		$this->diafan->_site->parent_name = DB::query_result("SELECT [name] FROM {site} WHERE id=%d", $this->diafan->_site->parent_id);
	}
	$this->diafan->_site->title_meta = str_replace(
		array('%name', '%parent'),
		array($this->diafan->_site->name, $this->diafan->_site->parent_name),
		$this->diafan->configmodules("title_tpl", 'site')
	);
	$text = $this->diafan->_site->title_meta.$page;
	echo $dr->replaceKeys($text);
	return;
}
$text = ($this->diafan->_site->titlemodule ? $this->diafan->_site->titlemodule.' — ' : '').$this->diafan->_site->name.$page.(TITLE ? ' — '.TITLE : '');
echo $dr->replaceKeys($text);
