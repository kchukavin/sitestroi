<?php

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

class Parseimport_install extends Install
{
    public $title = 'Импорт с сайтов';

    /**
     * @var array записи в таблице {modules}
     */
    public $modules = array(
        array(
            "name" => "parseimport",
            "admin" => true,
            "site" => true,
        ),
    );
}

