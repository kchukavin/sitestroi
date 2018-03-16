<?php
/**
 * Внутренняя страница (на всю ширину)
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
	<insert name="show_head">
	<insert name="show_css" files="main.css, fix.css">
	<link href="<insert name="custom" absolute="true" path="css/bootstrap.min.css" >" rel="stylesheet" />
	<link href="<insert name="custom" absolute="true" path="css/animate.min.css" >" rel="stylesheet" />

		<!--    <!--[if IE]>-->
		<!--    <script type="text/javascript" src="<insert name="custom" path="scripts/html5.js" absolute="true">"></script>-->
		<!--    <link rel="stylesheet" type="text/css" href="<insert name="custom" path="styles/ie.css" absolute="true">" media="screen" />-->
		<!--    <![endif]-->

		<!--    <script type="text/javascript" src="<insert name="custom" path="js/jquery.js" absolute="true">"></script>
			<script src="<insert name="custom" path="js/jquery.selectbox.min.js" absolute="true">"></script>
			<script src="<insert name="custom" path="js/select.js" absolute="true">"></script>
			<script type="text/javascript" src="<insert name="custom" path="js/customInput.jquery.js" absolute="true">"></script>
			<script type="text/javascript">
			$(function(){
				$('input').customInput();
			});
			</script>-->
  </head>
  <body>
  
  <insert name="show_include" file="counters">
  
  <div class="mini">
    <div class="all">
	  <div class="header clearfix">
        <div class="header_top clearfix">
		  <a class="logo ld animated slideInLeft" href="<insert name="path">"></a>
		  <div class="right_header rd animated slideInRight">
			<p class="phone"><insert name="show_block" module="site" id="1"></p>
			<span class="call"><a href="" class="main-link" data-target="#call" data-toggle="modal">Заказать звонок</a></span>
		  </div><!--right_header-->
		</div><!--header_top-->
		
		<!--ul class="menu_header clearfix">
		  <li><a href="#">Главная</a></li>
		  <li><a href="#">О нас</a></li>
		  <li><a href="#">Услуги</a></li>
		  <li><a href="#">Документы</a></li>
		  <li><a href="#">Условия займа</a></li>
		  <li class="margin_r"><a href="#">Контакты</a></li>
		</ul--><!--menu_header-->
		
		<!--insert name="show_block" module="menu" id="1"
			tag_level_start_1="[ul class='menu_header clearfix']"
			tag_start_1="[li]"
			tag_end_1="[/li]"
			tag_active_start_1="[li class='active']"
			tag_level_end_1="[/ul]"
		-->
		<insert name="show_block" module="menu" id="1" template="topmenu">
		
	  </div><!--header-->
	</div><!--all-->
	<div class="for_same_width">
	</div>
    <div class="all">
	  <div class="content clearfix">
	    <div class="stand_text">
		
		  <insert name="show_breadcrumb" current="true">
		  
		  <h1 class="for_h1"><insert name="show_h1"></h1>
		  
	    </div><!--stand_text-->
	    
		<div class="clearfix">
			<insert name="show_text">
			<insert name="show_module">
		</div>
		
        <div class="for_forms clearfix">
		  <h2 class="for_h2">Расчет и оформление займа</h2>
		  <div class="loft_fm clearfix ld">
		    <p>Кредитный калькулятор</p>
			  <div id="js-calc-kredit"></div>
		  </div><!--left_fm-->
				<insert name="show_form" module="feedback" site_id="37" template="send-request">
			</div>
		  </div><!--left_fm-->
        </div><!--for_forms-->
		
	  </div><!--content-->
    </div><!--all-->
    <div class="footer"> 
      <div class="footer_in clearfix all">
	    <insert name="show_block" module="site" id="2"> <!-- Футер -->
		
		<insert name="show_block" module="menu" id="2"
			tag_level_start_1="[ul class='list_menu_footer rd']"
			tag_start_1="[li]"
			tag_end_1="[/li]"
			tag_active_start_1="[li class='active']"
			tag_level_end_1="[/ul]"
		>
		
      </div><!--footer_in-->	  
	</div><!--footer-->	
  </div>
  
  <!-- Modal call-->
  <div class="modal fade bs-example-modal-sm" id="call" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog modal-sm" role="document">
		  <div class="modal-content">
			  <div class="modal-header">
				  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				  <h4 class="modal-title" id="myModalLabel">Заказать звонок</h4>
			  </div>
			  <div class="modal-body">
				  <insert name="show_form" module="feedback" site_id="38" template="call">
			  </div>
		  </div>
	  </div>
  </div>
  
  
  <insert name="show_include" file="scripts">
  
  <insert name="show_include" file="counters">
  
  </body>
</html>