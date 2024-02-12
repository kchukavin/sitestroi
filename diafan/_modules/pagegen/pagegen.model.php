<?php
/**
 * Модель
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
 * Pagegen_model
 */
class Pagegen_model extends Model
{
	/**
	 * Генерирует данные для страницы
	 *
	 * @return void
	 */
	public function id()
	{
        $time = mktime(23, 59, 0, date("m"), date("d"), date("Y"));
        
        $row = $this->id_query();

        $row['theme'] = '';
        $row['view'] = 'id';

        $cat = DB::query_fetch_array("SELECT view, theme FROM {pagegen_category} WHERE id=%d AND [act]='1' AND trash='0'", $row['cat_id']);
        if($cat)
        {
            if ($cat["theme"]) $row["theme"] = $cat["theme"];
            if ($cat["view"]) $row["view"] = $cat["view"];
        }

        $row['params'] = unserialize($row['params']);

        $this->result = $row;

        $this->theme_view_element($row);
    }

	/**
	 * Получает из базы данных данные о текущем элементе для страницы элемента
	 *
	 * @return array
	 */
	private function id_query()
	{
		$fields = '';
		foreach ($this->diafan->_languages->all as $l)
		{
			$fields .= ', act'.$l["id"];
		}
		$row = DB::query_fetch_array(
            "SELECT id, name, keywords, descr, title_meta, text, params, [act], cat_id, site_id, trash FROM {pagegen}"
            ." WHERE id=%d AND trash='0' AND site_id=%d"
            .(! $this->is_admin() ? " AND [act]='1'" : "")
            ." LIMIT 1",
            $this->diafan->_route->show, $this->diafan->_site->id
		);
		return $row;
	}


}
