<?php
/**
 * RSS лента страниц сайта
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

/*
$site_ids = $this->diafan->_route->id_module('site');
if(empty($site_ids))
{
	Custom::inc('includes/404.php');
}
*/

$limit = 15;
$time = mktime(23, 59, 0, date("m"), date("d"), date("Y"));

$rows = DB::query_fetch_all("SELECT e.id, e.[name], e.[text], e.timeedit FROM {site} AS e"
." WHERE e.[act]='1' AND e.trash='0'"
." AND e.date_start<=%d AND (e.date_finish=0 OR e.date_finish>=%d)"
.($this->diafan->configmodules('where_access_element', 'site') ? " AND (e.access='0' OR e.access='1' AND a.role_id=".$this->diafan->_users->role_id.")" : '')
." ORDER BY e.id DESC LIMIT ".$limit, $time, $time, $time);

$last  = '';
$items  = '';

foreach ($rows as $row)
{
	$this->diafan->_site->id = $row["id"]; // little hack for route module
	$link = $this->diafan->_route->link($row["id"]);
	
	if(! $link) continue;
	if (empty($this->diafan->prepare_xml($row['text']))) continue;

	if (empty($last))
	{
		$last = date("D, d F Y H:i:s O", $row['timeedit']);
	}
	$items .= '
	<item turbo="true">
		<title>'.$this->diafan->prepare_xml($row['name']).'</title>'
		.'<link>'.BASE_PATH_HREF.$link.'</link>'
		.'<turbo:content><![CDATA['
		.'<header>'
		.'<h1>'.$this->diafan->prepare_xml($row['name']).'</h1>'
		.'</header>'
		.$this->diafan->_tpl->htmleditor($row['text'])
		//.$row['text']
		.']]></turbo:content>
		<pubDate>'.date("D, d F Y H:i:s O", $row['timeedit']).'</pubDate>'
		.($this->diafan->configmodules("comments", "site", $row["id"]) ? '
		<comments>'.BASE_PATH_HREF.$link.'</comments>' : '').'
	</item>';
}

$xml = '<?xml version="1.0" encoding="UTF-8"?>
<rss xmlns:yandex="http://news.yandex.ru"
     xmlns:media="http://search.yahoo.com/mrss/"
     xmlns:turbo="http://turbo.yandex.ru"
     version="2.0">
	<channel>
		<title>'.$this->diafan->_('Страницы', false).'</title>
		<link>'.BASE_PATH_HREF.'</link>
		<description>'.$this->diafan->_('Страницы сайта', false).' '.BASE_URL.'.</description>
		<language>ru-ru</language>
		<lastBuildDate>'.$last.'</lastBuildDate>
		<generator>DIAFAN.CMS version '.VERSION_CMS.'</generator>
		'.$items.'
	</channel>
</rss>';



header('Content-type: application/xml; charset=utf-8'); 
header('Connection: close');
//header('Content-Length: '. utf::strlen($xml));
header('Date: '.date('r'));
echo $xml;
exit;