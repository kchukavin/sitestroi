<?php
/**
 * @package    DIAFAN.CMS
 *
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

/**
 * Theme_admin
 *
 * Представление в административной части
 */
class Theme_admin extends Diafan
{

	/**
	 * Формирует часть HTML-шапки
	 *
	 * @return void
	 */
	replace public function show_head()
	{
		$files = array(
			'css/jquery.imgareaselect/imgareaselect-default.css',
			'css/jquery.imgareaselect/imgareaselect-animated.css',
			'css/jquery.imgareaselect/imgareaselect-deprecated.css',
			'css/custom-theme/jquery-ui-1.8.18.custom.css',
			Custom::path('css/jquery-ui.css'),
			Custom::path('css/jquery.formstyler.css'),
			Custom::path('adm/css/main.css'),
            Custom::path('adm/css/rel2.css'),
		);
		$compress_files = File::compress($files, 'css');
		if(is_array($compress_files))
		{
			foreach($compress_files as $file)
			{
				echo '<link href="'.BASE_PATH.$file.'" rel="stylesheet" type="text/css" media="all">';
			}
		}
		else
		{
			echo '<link href="'.BASE_PATH.$compress_files.'" rel="stylesheet" type="text/css" media="all">';
		}
		if ($this->diafan->is_action("edit"))
		{
			echo '<link rel="stylesheet" href="'.BASE_PATH.File::compress(Custom::path('css/prettyPhoto.css'), 'css')
			.'" type="text/css" media="screen"'.' title="prettyPhoto main stylesheet" charset="utf-8" />';
		}
	}


}