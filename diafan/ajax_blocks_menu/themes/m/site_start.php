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
  <insert name="show_include" file="mheader">

  <div class="wrapper content">
    
  <!--/right-col -->
  <div class="mobile-content" >
  <!-- <div id="center-col"> -->
    <insert name="show_body">

    <div class="for_done clearfix">
        <h2 class="for_h2">Наши предложения</h2>
        <ul class="list_done clearfix">
            <li class="for_low clearfix">
                <img class="animated onhover pulse" src="/userfiles/images/done1.png" alt="" />
                <p class="fo_step">Деньги под залог ПТС</p>
                <ul class="so_list">
                    <li>Ставка от 4,5% в месяц.</li>
                    <li>Вы можете получить до 65% от стоимости <br/>автомобиля.</li>
                    <li>От 30 000 до 3 000 000 рублей.</li>
                    <li>Срок займа от 3-х дней.</li>
                    <li>Оформление и получение денег в течение 30 минут.</li>
                    <li>Автомобиль остается у вас.</li>
                    <li>Неограниченное продление займа.</li>
                    <li>Гибкий график платежей.</li>
                    <li>Досрочное погашение.</li>
                    <li>Никаких комиссий.</li>
                </ul>
                <a class="send_request" href="#send_request">Отправить заявку</a>
                <!--<a class="more_done" href="http://avtolombard-116.ru/dengi-pod-zalog-pts/">Подробнее</a>-->
            </li>
            <li class="for_low clearfix">
                <img class="animated onhover pulse" src="/userfiles/images/done2.png" alt="" />
                <p class="fo_step">Деньги под залог авто</p>
                <ul class="so_list">
                    <li>Ставка от 4,5% в месяц.</li>
                    <li>Вы можете получить до 85% от стоимости <br/>автомобиля.</li>
                    <li>От 20 000 до  5 000 000 рублей.</li>
                    <li>Срок займа от 3-х дней.</li>
                    <li>Оформление и получение денег в течение 30 минут.</li>
                    <li>Автомобиль остается на надежно охраняемой стоянке.</li>
                    <li>Неограниченное продление займа.</li>
                    <li>Гибкий график платежей.</li>
                    <li>Досрочное погашение.</li>
                    <li>Никаких комиссий.</li>
                </ul>
                <a class="send_request" href="#send_request">Отправить заявку</a>
                <!--<a class="more_done" href="http://avtolombard-116.ru/kredit-pod-zalog-avto/">Подробнее</a>-->
            </li>
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

    
	$(document).ready(function(){
		$('.bxslider').bxSlider({
			pager: false,
			responsive: false
		});
	});
    </script>

<script type="text/javascript" src="<insert name="path">js/main.js" charset="UTF-8"></script>

<insert name="show_include" file="counters">

</body>
</html>

