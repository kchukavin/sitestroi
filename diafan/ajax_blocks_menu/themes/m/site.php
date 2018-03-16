<?php
/**
 * Шаблон сайта для мобильной версии
 *
 * @package    DIAFAN.CMS
 * @author     diafan.ru
 * @version    6.0
 * @license    http://www.diafan.ru/license.html
 * @copyright  Copyright (c) 2003-2016 OOO «Диафан» (http://www.diafan.ru/)
 */

if(! defined("DIAFAN"))
{
	$path = __FILE__; $i = 0;
	while(! file_exists($path.'/includes/404.php'))
	{
		if($i == 10) exit; $i++;
		$path = dirname($path);
	}
	include $path.'/includes/404.php';
}
?><!DOCTYPE html>
<html lang="ru">
<head>
	<insert name="show_include" file="m_head">
</head>

<body>

<div id="side-menu" class="slide_menu">
	<!-- шаблонный тег вывода первого меню (параметр id=1). Настраивается в файле modules/menu/views/menu.view.show_block_topmenu.php
			  Документация тега http://www.diafan.ru/dokument/full-manual/templates-functions/#show_block_menu -->
	<insert name="show_block" module="menu" id="1" template="topmenu">
</div>

<div class="slide">
	<div class="inner_page">
		<insert name="show_include" file="mheader">
	</div>
	<div id="h">
		<h1 class="for_h1">
			<insert name="show_h1">
		</h1>
	</div>
	<insert name="show_links" module="site">

	<div id="content" class="mobile-content">
		<insert name="show_text">
		<insert name="show_module">
<!--	<insert name="show_block" module="news" count="2">-->
		<div class="for_forms clearfix">
			<h2 class="for_h2">Расчет и оформление займа</h2>
			<div class="loft_fm clearfix ld">
				<p>Калькулятор займа</p>
				<div id="js-calc-kredit"></div>
			</div><!--left_fm-->
			<div id="send_request">
				<insert name="show_form" module="feedback" site_id="37" template="send-mobile-request">
			</div>
		</div>
	</div>
<!-- <insert name="show_block" module="menu"-->
<!--			id="2"-->
<!--			tag_level_start_1="[ul id=`menu`]"-->
<!--			tag_start_1="[li]"-->
<!--			tag_end_1="[/li]"-->
<!--			tag_level_end_1="[/ul]"-->
<!--			tag_level_start_2=""-->
<!--			tag_start_2="[li class='sub']"-->
<!--			tag_end_2="[/li]"-->
<!--			tag_level_end_2=""-->
<!--			>-->
	<div id="footer" class="footer_inside">
		<div class="wrapper">
			<div class="contacts">
				<insert name="show_block" module="site" id="2">
			</div>
			<div id="to_full">
				<a href="<insert name="path">?mobile=no">Полная версия сайта</a>
			</div>
		</div>
	</div>
</div>

<!-- шаблонный тег show_js подключает JS-файлы. Описан в файле themes/functions/show_js.php. -->
<insert name="show_js">

	<!-- bxSlider Javascript file -->
	<script src="<insert name="custom" absolute="true" path="vendor/bxslider/jquery.bxslider.min.js" >"></script>

	<script>
	$('.animated.onhover').mouseover(function() {
		$(this).addClass('infinite');
	});

	$('.animated.onhover').mouseleave(function() {
		$(this).removeClass('infinite');
	});

	
	$(document).ready(function(){
		$('.bxslider').bxSlider({
			pager: false
		});
	});
	</script>

<script type="text/javascript" src="<insert name="path">js/main.js" charset="UTF-8"></script>

<insert name="show_include" file="counters">

</body>
</html>
