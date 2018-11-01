<?php
include("config/config.php");
include("lib/base.php");

$route = isset($_GET['route_link']) ? $_GET['route_link'] : 'index.php';

// Мета-теги по умолчанию
$metaTitle = "Wallspace";
$metaKeywords = "Wallspace";
$metaDescription = "Wallspace";

ob_start();
{
    include($config['base_dir'] . '/views/' . $route);
    $pageContent = ob_get_contents();
}
ob_end_clean();

$metaTitle = htmlspecialchars($metaTitle);
$metaKeywords = htmlspecialchars($metaKeywords);
$metaDescription = htmlspecialchars($metaDescription);

include($config['base_dir'] . "/includes/_head.php");
echo $pageContent;
include($config['base_dir'] . "/includes/_foot.php");
?>


