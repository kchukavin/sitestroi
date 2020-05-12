<?php
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

class Shop_model extends Model
{
    
   
    
    new public function show_block_rel2($count, $images, $images_variation)
	{
		$time = mktime(23, 59, 0, date("m"), date("d"), date("Y"));

		//кеширование
		$cache_meta = array(
			"name" => "block_rel2",
			"count" => $count,
			"lang_id" => _LANG,
			"good_id" => $this->diafan->_route->show,
			"images" => $images,
			"images_variation" => $images_variation,
			"role_id" => $this->diafan->_users->role_id ? $this->diafan->_users->role_id : 0,
			"discounts" => $this->person_discount_ids,
			"time" => $time
		);

		if (! $this->result = $this->diafan->_cache->get($cache_meta, "shop"))
		{
			$this->result["rows"] = DB::query_range_fetch_all(
			"SELECT e.id, e.[name], e.[anons], e.timeedit, e.site_id, e.brand_id, e.no_buy, e.article,"
			." e.hit, e.new, e.action, e.is_file FROM {shop} AS e"
			. " INNER JOIN {shop_rel2} AS r ON e.id=r.rel2_element_id AND r.element_id=%d"
			.($this->diafan->configmodules("rel2_two_sided") ? " OR e.id=r.element_id AND r.rel2_element_id=".$this->diafan->_route->show : '')
            . ($this->diafan->_users->role_id ? " LEFT JOIN {access} AS a ON a.element_id=e.id AND a.module_name='shop' AND a.element_type='element'" : "")
			. " WHERE e.[act]='1' AND e.trash='0'"
			." AND e.date_start<=%d AND (e.date_finish=0 OR e.date_finish>=%d)"
			. " AND (e.access='0'"
			. ($this->diafan->_users->role_id ? " OR e.access='1' AND a.role_id=".$this->diafan->_users->role_id : '')
			. ")"
			. " GROUP BY e.id"
			. ' ORDER BY e.id DESC',
			$this->diafan->_route->show, $time, $time, 0, $count
			);
			$this->elements($this->result["rows"], 'block', array("count" => $images, "variation" => $images_variation));
			$this->diafan->_cache->save($this->result, $cache_meta, "shop");
		}
		foreach ($this->result["rows"] as &$row)
		{
			$this->prepare_data_element($row);
		}
		foreach ($this->result["rows"] as &$row)
		{
			$this->format_data_element($row);
		}
	}
	
	/**
	 * Формирует данные о вложенных категориях
	 *
	 * @param integer $parent_id номер категории-родителя
	 * @param integer $time текущее время, округленное до минут, в формате UNIX
	 * @return array
	 */
	replace private function get_children_category($parent_id, $time)
	{
		$children = DB::query_fetch_all(
		"SELECT c.id, c.[name], c.[anons], c.site_id FROM {shop_category} AS c"
		.($this->diafan->configmodules('where_access_cat') ? " LEFT JOIN {access} AS a ON a.element_id=c.id AND a.module_name='shop' AND a.element_type='cat'" : "")
		." WHERE c.[act]='1' AND c.parent_id=%d AND c.trash='0' AND c.site_id=%d"
		.($this->diafan->configmodules('where_access_cat') ? " AND (c.access='0' OR c.access='1' AND a.role_id=".$this->diafan->_users->role_id.")" : '')
		." GROUP BY c.id ORDER BY c.sort ASC, c.id ASC", $parent_id, $this->diafan->_site->id
		);

		foreach ($children as &$child)
		{
			if ($this->diafan->configmodules("images_cat") && $this->diafan->configmodules("list_img_cat"))
			{
				$this->diafan->_images->prepare($child["id"], 'shop', 'cat');
			}
			$this->diafan->_route->prepare($child["site_id"], $child["id"], "shop", "cat");
		}

		foreach ($children as &$child)
		{
			$child["link"] = $this->diafan->_route->link($child["site_id"], $child["id"], 'shop', 'cat');
			if ($this->diafan->configmodules("images_cat") && $this->diafan->configmodules("list_img_cat"))
			{
				$child["img"] = $this->diafan->_images->get(
					'medium', $child["id"], $this->diafan->_site->module, 'cat', $child["site_id"],
					$child["name"], 0, $this->diafan->configmodules("list_img_cat") == 1 ? 1 : 0,
					$child["link"]);
			}
			$child["rows"] = array();
			$chn = $this->diafan->get_children($child["id"], "shop_category");
			$chn[] = $child["id"];
			if ($this->diafan->configmodules("children_elements"))
			{
				$cat_ids = $chn;
			}
			else
			{
				$cat_ids = array($child["id"]);
			}
			if($this->diafan->configmodules("count_child_list"))
			{
				$child["rows"] = array_merge(
					$this->get_children_category_elements_query($time, $cat_ids, 1),
					$this->get_children_category_elements_query($time, $cat_ids)
				);
			}
			$child["count"] = $this->get_count_in_cat($chn, $time);
			unset($child["site_id"]);
		}
		return $children;
	}
	
	/**
	 * Получает из базы данных элементы вложенных категорий
	 * 
	 * @param integer $time текущее время, округленное до минут, в формате UNIX
	 * @param array $cat_ids номера категорий, элементы из которых выбираются
	 * @return array
	 */
	replace private function get_children_category_elements_query($time, $cat_ids, $order = null)
	{
		if ($order === null) $order = $this->diafan->configmodules("sort");
		
		switch($order)
		{
			case 1:
				$order = 'e.id DESC';
				break;
			case 2:
				$order = 'e.id ASC';
				break;
			case 3:
				$order = 'e.name'._LANG.' ASC';
				break;
			default:
				$order = 'e.sort DESC';
		}
		$rows = DB::query_range_fetch_all(
		"SELECT e.id, e.[name], e.timeedit, e.[anons], e.site_id, e.brand_id, e.no_buy, e.article, e.hit, e.[measure_unit],"
		." e.new, e.action, e.is_file FROM {shop} AS e"
		." INNER JOIN {shop_category_rel} AS r ON e.id=r.element_id"
		.($this->diafan->configmodules('where_access_element') ? " LEFT JOIN {access} AS a ON a.element_id=e.id AND a.module_name='shop' AND a.element_type='element'" : "")
		.($this->diafan->configmodules('hide_missing_goods') && $this->diafan->configmodules('use_count_goods') ? " INNER JOIN {shop_price} AS prh ON prh.good_id=e.id AND prh.count_goods>0" : "")
		." WHERE r.cat_id IN (%s) AND e.[act]='1' AND e.trash='0'"
		.($this->diafan->configmodules('where_period_element') ? " AND e.date_start<=".$time." AND (e.date_finish=0 OR e.date_finish>=".$time.")" : '')
		.($this->diafan->configmodules('where_access_element') ? " AND (e.access='0' OR e.access='1' AND a.role_id=".$this->diafan->_users->role_id.")" : '')
		.($this->diafan->configmodules('hide_missing_goods') ? " AND e.no_buy='0'" : "")
		." GROUP BY e.id ORDER BY ".$order,
		implode(',', $cat_ids),
		0, $this->diafan->configmodules("count_child_list")
		);
		$this->elements($rows);
		return $rows;
	}

	
}