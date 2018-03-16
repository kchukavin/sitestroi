<?php
/**
 * Деньги под залог недвижимости
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
    <meta name="viewport" content="target-densitydpi=device-dpi, width=device-width, initial-scale=0.7, user-scalable=yes" />
    <link rel="shortcut icon" href="<insert name="path">favicon.ico" type="image/x-icon">
    
	<insert name="show_head">

    <!-- link href="<insert name="path">css/default.css" rel="stylesheet" type="text/css" -->
    <link href="<insert name="custom" absolute="true" path="css/bootstrap.css" >" rel="stylesheet" type="text/css">
    <!--link href="<insert name="path">css/style.css" rel="stylesheet" type="text/css"-->
    <!--link href="<insert name="path">css/m/style.css" rel="stylesheet" type="text/css"-->
    <link href="<insert name="custom" absolute="true" path="vendor/bxslider/jquery.bxslider.css" >" rel="stylesheet" />
    <link href="<insert name="custom" absolute="true" path="css/bxslider_fix.css" >" rel="stylesheet" type="text/css">
	
	<insert name="show_css" files="default.css, m/style.css">
	
</head>

<body>

<div id="side-menu" class="slide_menu">
      <!-- шаблонный тег вывода первого меню (параметр id=1). Настраивается в файле modules/menu/views/menu.view.show_block_topmenu.php 
                  Документация тега http://www.diafan.ru/dokument/full-manual/templates-functions/#show_block_menu -->
      <insert name="show_block" module="menu" id="1" template="topmenu">
</div>

<div class="slide">
  <insert name="show_include" file="mheader">

  <div class="wrapper content">
    
  <!--/right-col -->
  <div class="mobile-content" >
  <!-- <div id="center-col"> -->
<h1 class="for_h1">Деньги под залог недвижимости в Казани</h1>
<p>Срочно нужны деньги? Нецелевой кредит под залог недвижимости - быстрый и выгодный способ получить необходимую сумму. ООО "Автоломбард "Ваш финансистъ" выдает займы под залог недвижимости без подтверждения доходов за один день на выгодных условиях.</p>
    <div class="for_done clearfix">
        <ul class="list_done clearfix">

            <li class="for_low clearfix marginr">
                <img class="animated onhover pulse" src="/userfiles/images/done3.png" alt="" />
                <p class="fo_step">Деньги под залог недвижимости</p>
                <ul class="so_list">
                    <li>Ставка от 4,5% в месяц.</li>
                    <li>Вы можете получить до 85% от стоимости <br/>недвижимости.</li>
                    <li>От 50 000 до 20 000 000 рублей.</li>
                    <li>Срок займа от 3-х дней.</li>
                    <li>Оформление и получение денег за один день. Сегодня пришли - завтра получили деньги.</li>
                    <li>Неограниченное продление займа.</li>
                    <li>Гибкий график платежей.</li>
                    <li>Досрочное погашение.</li>
                    <li>Никаких комиссий.</li>
                </ul><!--so_list-->
                <a class="send_request" href="#send_request">Отправить заявку</a>
                <!--<a class="more_done" href="http://avtolombard-116.ru/kredit-pod-zalog-nedvizhimosti/">Подробнее</a>-->
            </li>
        </ul><!--list_done-->
    </div><!--for_done-->

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

    <!-- шаблонный тег вывода блока некоторых товаров из магазина. Вид блока товаров редактируется в файле modules/shop/views/shop.view.show_block.php. -->
    <insert name="show_block" module="shop" count="2" images="1" sort="rand">
   
    <!-- шаблонный тег вывода блока вопросов и ответов сайта. Вид блока редактируется в файле modules/faq/views/faq.view.show_block.php. -->    
    <insert name="show_block" module="faq" count="2" often="0">
    
    <!-- шаблонный тег вывода блока новостей. Вид блока файлов редактируется в файле modules/news/views/news.view.show_block.php. -->
<!--    <insert name="show_block" module="news" count="2" images="1">-->
       
  </div>
  <div class="clear">
    &nbsp;
  </div>
  </div>
  <!-- шаблонный тег вывода формы для подписчиков. Вид блока редактируется в файле modules/subscribtion/views/subscribtion.view.form.php.  -->
  <!--insert name="show_form" module="subscribtion"-->
  <div id="footer">
  <div class="wrapper">
    <div class="contacts">
		<insert name="show_block" module="site" id="2">
    </div>
    <div id="to_full">
        <a href="<insert name="path">?mobile=no">Полная версия сайта</a>
    </div>
    <!-- шаблонный тег вывода кнопок социальных сетей. Правится в файле themes/functions/show_social_links_main.php -->
    <!--insert name="show_social_links_main"-->

<!--    <div class="footer-menu">-->
<!--		<h3><insert value="О магазине"></h3>-->
		<!-- шаблонный тег вывода первого меню (параметр id=1). Настраивается в файле modules/menu/views/menu.view.show_menu.php, так как параметр template не был передан. Тогда в оформлении используются параметры tag
								Документация тега http://www.diafan.ru/dokument/full-manual/templates-functions/#show_block_menu -->
<!--		<insert name="show_block" module="menu" -->
<!--			id="1" -->
<!--      count_level="1"-->
<!--			tag_level_start_1="[ul]"-->
<!--			tag_start_1="[li]" -->
<!--			tag_end_1="[/li]" -->
<!--			tag_level_end_1="[/ul]"-->
<!--			tag_level_start_2=""-->
<!--			tag_start_2="[li class='podmenu']" -->
<!--			tag_end_2="[/li]"-->
<!--			tag_level_end_2=""-->
<!--			>    -->
<!--    </div>-->
<!--    <div class="copyright">-->
<!--      	<h3>&copy; <insert name="show_year"> <insert name="title"></h3>-->
<!--	    <div class="notes">	    -->
<!--	        <span class="note sitemap">-->
		        <!-- шаблонный тег show_href выведет ссылку на карту сайта <a href="/map/"><img src="/img/map.png"></a>, на странице карты сайта тег выведет активную иконку -->
<!--	        	<insert name="show_href" rewrite="map" alt="Карта сайта">-->
<!--	        </span>        		        -->
<!--			<span class="note siteinfo">-->
				<!-- шаблонный тег вывода количества пользователей on-line. Вид блока редактируется в файле modules/users/views/users.view.show_block.php. -->
<!--				<insert name="show_block" module="users">-->
<!--			</span>                -->
<!--	    </div>-->
<!--    </div>-->
  </div>
  </div>
<!--  <div class="to_full">-->
<!--    <br>-->
<!---->
<!--    &copy; <insert name="show_year"> <insert name="title">-->
<!--  </div>-->
  <!--/footer -->


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

    $('.bxslider').bxSlider({
        pager: false
    });
    </script>

<script type="text/javascript" src="<insert name="path">js/main.js" charset="UTF-8"></script>

<insert name="show_include" file="counters">

</body>
</html>
