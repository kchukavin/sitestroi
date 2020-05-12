<?php
/**
 * Модель модуля «Калькулятор»
 *
 * @package    DIAFAN.CMS
 * @author     diafan.ru
 * @version    6.0
 * @license    http://www.diafan.ru/license.html
 * @copyright  Copyright (c) 2003-2018 OOO «Диафан» (http://www.diafan.ru/)
 */
if ( ! defined('DIAFAN'))
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
 * Calc_model
 */
class Calc_model extends Model
{


	protected function getElements($siteId)
	{
		$row = DB::query_fetch_all("SELECT g.id, g.[name], p.price, p.old_price FROM {shop} AS g"
			." LEFT JOIN {shop_price} AS p ON g.id = p.good_id"
			." WHERE g.trash='0' AND p.discount_id=0 AND site_id=%d"
			.(! $this->is_admin() ? " AND [act]='1'" : '')
			." ORDER BY g.sort ASC, g.id ASC", $siteId);

		return $row;
	}

	protected function getCategories($siteId)
	{
		$row = DB::query_fetch_all("SELECT id, [name], [anons], [anons_plus], timeedit, [descr], [keywords], [canonical], sort, parent_id, [title_meta], access, theme, view, view_rows, [act], noindex FROM {shop_category}"
			." WHERE trash='0' AND site_id=%d"
			.(! $this->is_admin() ? " AND [act]='1'" : '')
			." ORDER BY sort ASC, id ASC", $siteId);

		return $row;
	}

	public function show_block($siteId)
	{
		$courses = $this->getElements($siteId);

		$this->result = array(
			'courses' => $courses,
		);
	}

}
