<?php
/**
 * Контроллер
 *
 * @package    DIAFAN.CMS
 * @author     diafan.ru
 * @version    6.0
 * @license    http://www.diafan.ru/license.html
 * @copyright  Copyright (c) 2003-2020 OOO «Диафан» (http://www.diafan.ru/)
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
 * Pagegen
 */
class Pagegen extends Controller
{
	/**
	 * @var array переменные, передаваемые в URL страницы
	 */
	public $rewrite_variable_names = array('show');

	/**
	 * Инициализация модуля
	 *
	 * @return void
	 */
	public function init()
	{
		if ($this->diafan->_route->show)
		{
            if($this->diafan->_route->page || $this->diafan->_route->param || $this->diafan->_route->sort || $this->diafan->_route->brand)
			{
				Custom::inc('includes/404.php');
			}
			$this->model->id();
		}
	}

}
