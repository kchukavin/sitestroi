<?php
/**
 * Шаблонный тег: выводит основной контент страницы: заголовка (если не запрещен его вывод в настройке странице «Не показывать заголовок»), текста страницы и прикрепленного модуля. Заменяет три тега: show_h1, show_text, show_module.
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

$dataUrl = $this->diafan->_site->rewrite . '_data';
$text = DB::query_result("SELECT s.[text] FROM {rewrite} as r, {site} as s WHERE r.rewrite = '%s' and r.module_name = 'site' and r.element_id = s.id", $dataUrl);

if($text)
{
    $text = $this->diafan->_route->replace_id_to_link($text);
    if(strpos($text, '<!--контент 2-го блока-->'))
    {
        $text  = explode('<!--контент 2-го блока-->', $text);
        echo $text[0];
        $this->functions('show_module');
        echo $text[1];
    }
    else
    {
        echo $text;
        $this->functions('show_module');
    }

}
else
{
    ob_start();
    $this->functions('show_h1');
    $title = ob_get_contents();
    ob_end_clean();
    if ($title)
    {
        echo '<h1>'.$title.'</h1>';
    }

    $this->functions('show_text');

    $this->functions('show_module');
}