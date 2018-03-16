<?php
/**
 * Файл-блок шаблона
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
?>
<!--<div id="top-line">-->
<!--    <div class="wrapper">       -->
<!--      <div class="top-phone">      -->
<!--        <insert name="show_block" module="site" id="1">-->
<!--      </div> -->
<!--      <div class="top-line-right">-->
	  <!-- шаблонный тег вывода количества отложенных товаров. Вид формы редактируется в файле modules/wishlist/views/wishlist.view.show_block.php. -->
      <!--insert name="show_block" module="wishlist"-->

      <!-- шаблонный тег вывода формы корзины. Вид формы редактируется в файле modules/cart/views/cart.view.show_block.php. -->
      <!--insert name="show_block" module="cart"-->
<!--	  </div>-->

<!--    </div>-->
<!--  </div>-->
<div id="top-menuline">  
    <div class="wrapper">
      <div class="slide_button"><img src="<insert name="path">img/menu_m_black.png"></div>
      <div id="logo">
  		<insert name="show_href" rewrite="" img="img/logo_mobile.png">
      </div>
	  <div class="contacts_button"><a href="/m/kontakty/"><img src="<insert name="custom" path="img/contacts_icon.png" absolute="true">"></a></div>
    </div>
</div>
<ul class="bxslider">
	<li>
		<a href="/m"><img src="/userfiles/slides/slide01.jpg"></a>
	</li>
	<li>
		<a href="/m/zaym/"><img src="/userfiles/slides/slide02.jpg"></a>
	</li>
	<li>
		<a href="/m/kredit-pod-zalog-nedvizhimosti/"><img src="/userfiles/slides/slide03.jpg"></a>
	</li>
</ul>