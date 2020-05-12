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


class Shop extends Controller
{

    new public function show_block_rel2($attributes)
	{
		if ($this->diafan->_site->module != "shop" || ! $this->diafan->_route->show)
			return false;

		$attributes = $this->get_attributes($attributes, 'count', 'images', 'images_variation', 'template');

		$count   = $attributes["count"] ? intval($attributes["count"]) : 3;
		$images  = intval($attributes["images"]);
		$images_variation = $attributes["images_variation"] ? strval($attributes["images_variation"]) : 'medium';

		$this->model->show_block_rel2($count, $images, $images_variation);
		$this->model->result();

		echo $this->diafan->_tpl->get('show_block_rel2', 'shop', $this->model->result, $attributes["template"]);
	}
}