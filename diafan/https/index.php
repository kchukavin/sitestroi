<?php
// Для старых версий Diafan
define('BASE_PATH', "http".(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? "s" : '')."://".getenv("HTTP_HOST")."/".(REVATIVE_PATH ? REVATIVE_PATH.'/' : ''));

?>
