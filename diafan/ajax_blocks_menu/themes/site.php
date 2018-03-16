<?php
/**
 * Внутренняя страница
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
		<insert name="show_include" file="header">
	  </div><!--header-->
	  
	</div><!--all-->
	<div class="for_same_width">
	</div>
    <div class="all">
	  <div class="content clearfix">
	    <div class="stand_text">
		
		  <insert name="show_breadcrumb" current="true">
          <div class='ajax-block' data-block-id="link1"></div>

	      <!--
		  <h1 class="for_h1">Автоломбард в Казани</h1>
		  <p>Наш автоломбард выдает деньги под залог ПТС, транспортных средств и недвижимости. Мы гарантируем прозрачность сделки и предоставляем самые  выгодные  условия  кредитования  в регионе в сравнении с конкурентами. Минимальный срок  кредитования  от  3 дней.  Подробные условия займа.  После заключения договора и соблюдения всех  необходимых формальностей  вы  можете  ехать  по  своим  делам  автомобиль остается у вас!</p>
		  -->
		  
		  <h1 class="for_h1"><insert name="show_h1"></h1>
		  
	    </div><!--stand_text-->
	   
		<div class="two_cols clearfix">
			<!-- 
			<div class="two_cols-side">
				<insert name="show_block" module="news" site_id="14">
			</div>
			-->
			<div class="two_cols-main">
				<insert name="show_text"><insert name="show_module">
			</div>
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
	  
<insert name="show_block" module="consultant" system="jivosite">	  
	  
    </body>
</html>