<?php
/**
 * Шаблон вкладок для вставки в контент для CMS «DIAFAN»
 * @version 0.1
 * @copyright  Copyright (c) 2013-2016 Веб-студия «Сайт-строй» (http://www.sitestroi.net/)
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

$attributes = $this->get_attributes($attributes, 'func', 'id', 'active', 'tabs_links', 'tabs_names');
$func = $attributes["func"];
$id = $attributes["id"];
$active = $attributes["active"];
$string_tabs_links = $attributes["tabs_links"];
$string_tabs_names = $attributes["tabs_names"];
$tabs_links = explode(';', $string_tabs_links);
$tabs_names = explode(';', $string_tabs_names);
$active_tab_content = '<div role="tabpanel" class="tab-pane active" id=';
$tab_content = '<div role="tabpanel" class="tab-pane" id=';
$active_tab = '<li role="presentation" class="active">';
$inactive_tab = '<li role="presentation">';

switch ($func) {
    case "begin":
        echo '<ul class="nav nav-tabs" role="tablist">'.$active_tab;
        for ($tab_number=0; $tab_number < count($tabs_links) || $tab_number < count($tabs_names); $tab_number++){
            $tab = '<a href="#'.$tabs_links[$tab_number].'" aria-controls="home" role="tab" data-toggle="tab"><h2>'.$tabs_names[$tab_number].'</h2></a></li>';
            switch ($tab_number) {
                case 0:
                    echo $active_tab.$tab;
                    break;
                default:
                    echo $inactive_tab.$tab;
                    break;
            }
        }
        echo '</ul>
        <div class="tab-content">';
        break;
    case "tab-end":
    case "end":
        echo '</div>';
        break;
    case "tab":
        echo (bool)$active ? $active_tab_content : $tab_content;
        echo '"'.$id.'">';
        break;
    default:
        throw new InvalidArgumentException('Неправильное оформление генератора вкладок, проверьте правильность написание атрибута "func" у "insert" в контенте к этой странице. Ожидаются следующие значения: begin, tab, tab-end, end');
}