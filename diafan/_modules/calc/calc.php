<?php
/**
 * Контроллер модуля «Калькулятор»
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
 * Calc
 */
class Calc extends Controller
{
	/**
	 * @var array переменные, передаваемые в URL страницы
	 */
	public $rewrite_variable_names = array('page', 'show', 'param', 'sort', 'brand');

	/**
	 * Инициализация модуля
	 *
	 * @return void
	 */
	public function init()
	{
		if($this->diafan->configmodules("cat"))
		{
			$this->rewrite_variable_names[] = 'cat';
		}
		if ($this->diafan->_route->show)
		{
			if($this->diafan->_route->page || $this->diafan->_route->param || $this->diafan->_route->sort || $this->diafan->_route->brand)
			{
				Custom::inc('includes/404.php');
			}
			$this->model->id();
		}
		elseif ($this->diafan->_route->param)
		{
			$this->model->list_param();
		}
		elseif(isset($_GET["action"]) && $_GET["action"] === 'search')
		{
			$this->model->list_search();
		}
		elseif(isset($_GET["action"]) && $_GET["action"] === 'compare' && ! $this->diafan->configmodules('hide_compare', "shop"))
		{
			$this->model->compare();
		}
		elseif(isset($_GET["action"]) && $_GET["action"] === 'file' && isset($_GET["code"]))
		{
			$this->model->file_get();
		}
		elseif(! $this->diafan->configmodules("cat") || $this->diafan->configmodules("first_page_list") || $this->diafan->_route->cat || $this->diafan->_route->brand)
		{
			$this->model->list_();
		}
		else
		{
			$this->model->first_page();
		}
		$this->model->result();
	}

	/**
	 * Обрабатывает полученные данные из формы
	 *
	 * @return void
	 */
	public function action()
	{
		if(! empty($_POST["action"]))
		{
			switch($_POST["action"])
			{
				case 'buy':
					return $this->action->buy();

				case 'check':
					return $this->action->check();

				case 'wish':
					return $this->action->wish();

				case 'wait':
					return $this->action->wait();

				case 'add_coupon':
					return $this->action->add_coupon();

				case 'compare_goods':
					return $this->action->compare_goods();

				case 'compare_delete_goods':
					return $this->action->compare_delete_goods();

				case 'search':
					$this->action->search();
					break;
			}
		}
	}

 	public function show_block($attributes)
	{
		$this->diafan->attributes($attributes, 'template');
		
		$this->model->show_block(195);
		$this->model->result["attributes"] = $attributes;

		echo $this->diafan->_tpl->get('show_block', 'calc', $this->model->result, $attributes["template"]);
	}

}
