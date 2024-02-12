<?php
/**
 * Обработка POST-запросов в административной части модуля
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
 * Pagegen_admin_action
 */
class Pagegen_admin_action extends Action_admin
{
	/**
	 * Вызывает обработку POST-запросов
	 *
	 * @return void
	 */
	public function init()
	{
		if ( ! empty($_POST["action"]))
		{
			$_POST['site_id'] = DB::query_result("SELECT `site_id` FROM {pagegen_category} WHERE id=%d", $_POST['id']);
			
			switch ($_POST["action"])
			{
				case 'generate':
					$this->generate_pages();
                    $this->diafan->_map->index_module('pagegen');
					break;
				case 'clear':
					$this->clearPages();
                    $this->diafan->_map->index_module('pagegen');
					break;
			}
		}
	}

    protected function generate_pages()
    {
        $this->genPages();
    }



    protected function clearPages()
    {
        $ids = DB::query_fetch_value("SELECT `id` FROM {pagegen} WHERE cat_id=%d AND site_id=%d", $_POST['id'], $_POST['site_id'], 'id');
        if (!empty($ids)) {
            DB::query("DELETE FROM {pagegen_category_rel} WHERE element_id IN (". implode(',', $ids) .")");
            DB::query("DELETE FROM {pagegen} WHERE id IN (". implode(',', $ids) .")");
            DB::query("DELETE FROM {rewrite} WHERE module_name='pagegen' AND element_type='element' AND element_id IN (". implode(',', $ids) .")");
        }
    }

    protected function genPages()
    {
        $str = DB::query_result("SELECT `params` FROM {pagegen_category} WHERE id=%d AND site_id=%d", $_POST['id'], $_POST['site_id']);
        $paramValues = json_decode($str, true);

        $variants = $this->getVariants($paramValues);

        foreach ($variants as $variant) {
            $this->createPage($variant);
        }
    }

    protected function getVariants($paramValues)
    {

        $r = [];

        if (is_array($paramValues) and !empty($paramValues)) {
            $key = key($paramValues);
            do {
                $r[] = $this->current($paramValues);
                $key = $this->step($paramValues, $key);
            } while ($key !== false);
        }
        
        return $r;
    }

    protected function current(&$array)
    {
        $r = [];
        foreach ($array as $key => &$item) {
            $r[$key] = current($item);
        }
        return $r;
    }

    protected function step(&$array, $key)
    {
        reset($array);
        while (key($array) !== $key) {
            next($array);
        }
        
        if (next($array[$key]) === false) {
            reset($array[$key]);

            if (next($array) === false) {
                return false;
            }

            if ($this->step($array, key($array)) === false) {
                return false;
            }
        }
        return $key;
    }

    protected function createPage($variant)
    {
		$cat = DB::query_fetch_array("SELECT name_tpl, keywords_tpl, descr_tpl, title_meta_tpl, view_gen FROM {pagegen_category} WHERE id=%d LIMIT 1", $_POST['id']);

        $name = $this->applyTemplate($cat['name_tpl'], $variant);
        $keywords = $this->applyTemplate($cat['keywords_tpl'], $variant);
        $descr = $this->applyTemplate($cat['descr_tpl'], $variant);
        $title_meta = $this->applyTemplate($cat['title_meta_tpl'], $variant);
        
        $result = [];
        $result['name'] = $name;
        $result['params'] = $variant;
        $text = $this->diafan->_tpl->get($cat['view_gen'] ? $cat['view_gen'] : 'id_gen', 'pagegen', $result);

        $paramsStr = serialize($variant);
        
        $elementId = DB::query_result("SELECT `id` FROM {pagegen} WHERE cat_id=%d AND site_id=%d AND params='%s'", $_POST['id'], $_POST['site_id'], $paramsStr);

        if (!$elementId) {
            $elementId = DB::query("INSERT INTO {pagegen} (name, keywords, descr, title_meta, text, [act], cat_id, site_id, params) VALUES ('%s', '%s', '%s', '%s', '%s', '%d', %d, %d, '%s')", $name, $keywords, $descr, $title_meta, $text, 1, $_POST['id'], $_POST['site_id'], $paramsStr);

            DB::query("INSERT INTO {pagegen_category_rel} (element_id, cat_id, trash) VALUES (%d, %d, 0)", $elementId, $_POST['id']);

            // Create route
            $this->diafan->_route->save('', $name, $elementId, 'pagegen', 'element', $_POST['site_id'], $_POST['id']);
        } else {
            DB::query("UPDATE {pagegen} SET name='%s', keywords='%s', descr='%s', title_meta='%s', text='%s', [act]='%d', cat_id='%d', site_id='%d', params='%s' WHERE id='%d'", $name, $keywords, $descr, $title_meta, $text, 1, $_POST['id'], $_POST['site_id'], $paramsStr, $elementId);
        }
    }

    protected function extractParams($key, $param) {
        if (!is_array($param)) return [$key => $param];

        $r = [];

        foreach ($param as $pKey => $pVal) {
            if (is_array($pVal)) {
                $r = array_merge($r, $this->extractParams($key.'.'.$pKey, $pVal));
            } else {
                $r[$key.'.'.$pKey] = $pVal;
            }
        }

        return $r;
    }
    
    protected function applyTemplate($tpl, $params)
    {
        $r = 'Займ под залог ' . $params['auto']['name'] . ' на ' . $params['sum'] . ', ' . $params['city'];
        $r = $tpl;

        foreach ($params as $key => $param) {
            $preparedParams = $this->extractParams($key, $param);
            print_r($preparedParams);

            foreach ($preparedParams as $pKey => $pVal) {
                $r = str_replace('#' . $pKey . '#', $pVal, $r);
            }
        }

        return $r;
    }
}
