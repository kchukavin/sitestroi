<?php
/**
 * Посадочная страница "Деньги под залог <...>"
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
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<insert name="show_head">

	<!--
	<link href="<insert name="custom" absolute="true" path="vendor/bxslider/jquery.bxslider.css" >" rel="stylesheet" />
	<insert name="show_css" files="main.css, bxslider_fix.css, fix.css, lp_common.css">
	<link href="<insert name="custom" absolute="true" path="css/bootstrap.min.css" >" rel="stylesheet" />
	<link href="<insert name="custom" absolute="true" path="css/animate.min.css" >" rel="stylesheet" />
	-->

    <insert name="show_include" file="styles_lp">

		<!--    <!--[if IE]>-->
		<!--    <script type="text/javascript" src="<insert name="custom" path="scripts/html5.js" absolute="true">"></script>-->
		<!--    <link rel="stylesheet" type="text/css" href="<insert name="custom" path="styles/ie.css" absolute="true">" media="screen" />-->
		<!--    <![endif]-->

		<!--	<script src="<insert name="custom" path="js/jquery.selectbox.min.js" absolute="true">"></script>
            <script src="<insert name="custom" path="js/select.js" absolute="true">"></script>
            <script type="text/javascript" src="<insert name="custom" path="js/customInput.jquery.js" absolute="true">"></script>
            <script type="text/javascript">
            $(function(){
                $('input').customInput();
            });
            </script>-->
  </head>
  <body>
  
	<insert name="show_include" file="header">

    <div class="vitrina" style="background-image: url(/userfiles/images/lp_pts_bg.jpg)">
	  <div class="all container">
		  <div class="row">
			  <div class="col-md-8 vitrina__desc">
				  <h1 class="vitrina__txt1">Деньги под залог <span class="vitrina__txt2"><insert name="show_custom_string" key="automodel" /></span></h1>
				  
			  </div>
			  <div class="col-md-4">
				<div class="vitrina__form YM_verh_form">
					<insert name="show_form" module="feedback" site_id="37">
				</div>
			  </div>
		  </div>
	  </div>
    </div><!--for_width-->
	
	
	

    <div class="all container">
	  <div class="content clearfix">
	    <div class="stand_text">
		
			<insert name="show_body">
			
			<h2 class="heading1_topline">Деньги под залог <insert name="show_custom_string" key="automodel" />.</h2>
			
			<p class="top-text">
				Выдаем <a href="/">займы под залог <insert name="show_custom_string" key="automodel" /> в Набережных Челнах</a> до 3 000 000 за 30 минут. Авто остается у Вас. Срок - от 3 дней, ставка - от 2% в месяц. Самый простой и выгодный способ получить деньги, не расставаясь с имуществом!
			</p>

			<h2 class="for_h2">Условия займа</h2>
			
			<div class="row">
				<div class="col-md-offset-2 col-md-4">
					<ul class="lp-ned-oklist">
						<li>Ставка от 2% в месяц.</li>
						<li>Вы можете получить до 65% от рыночной стоимости автомобиля.</li>
						<li>От 30 000 до 3 000 000 рублей.</li>
						<li>Срок займа от 3-х дней.</li>
					</ul>
					
					<!--<div style="font-size: 11px; margin: 10px 24px;">
						В качестве залога принимаем расчет и оформление
					</div>-->
				</div>
				<div class="col-md-4">
					<ul class="lp-ned-oklist">
						<li>Неограниченное продление займа.</li>
						<li>Оформление и получение денег за полчаса.</li>
						<li>Гибкий график платежей.</li>
						<li>Досрочное погашение.</li>
						<li>Никаких комиссий.</li>
					</ul>
				</div>
			</div>
			
			<!--<div class="text-center">
				<a class="btn btn-primary" href="#">Подробнее</a>
			</div>-->
			
		  <!--insert name="show_body"-->
		  
		  
	    </div><!--stand_text-->
		

	  </div><!--content-->
    </div><!--all-->
    
	<div class="for_same_width">
	  <div class="all">
	    <div class="thing_block">
		  <h2 class="for_h2">Как мы работаем</h2>
		  <ul class="thing_list clearfix">
		    <li>
			  <div class="img_part">
			    <img src="/userfiles/icons/pts_zayavka.png" alt="Шаг 1" />
			  </div>
			  <p>Оставляете заявку</p>
			  <!--<span>Для оформления ссуды под залог авто не требуется справка о доходах – только паспорт гражданина РФ, ПТС и СТС.</span>
			  <a href="#">подробнее</a>-->
			</li>
		    <li>
			  <div class="img_part">
			    <img src="/userfiles/icons/pts_rassch.png" alt="Шаг 2" />
			  </div>
			  <p>Рассчитываем сумму <br>и процентную ставку</p>
			  <!--<span>Наш автоломбард выдает деньги под залог <insert name="show_custom_string" key="automodel" />, различных транспортных средств</span>
			  <a href="#">подробнее</a>-->
			</li>
		    <li>
			  <div class="img_part">
			    <img src="/userfiles/icons/pts_dogovor.png" alt="Шаг 3" />
			  </div>
			  <p>Заключаем договор, получаете деньги</p>
			  <!--<span>При оформлении договора необходимо тщательно ознакомиться со всеми документами и условиями выплаты</span>
			  <a href="#">подробнее</a>-->
			</li>
		    <li class="margin_r">
			  <div class="img_part">
			    <img src="/userfiles/icons/pts_dengi.png" alt="Шаг 4" />
			  </div>
			  <p>Уезжаете на своем автомобиле</p>
			  <!--<span>Можете заложить: гараж, коммерческую недвижимость, земельный надел.</span>
			  <a href="#">подробнее</a>-->
			</li>
		  </ul><!--thing_list-->
		</div><!--thing_block-->
      </div><!--all-->
	  
	  <div class="all container">
		<insert name="show_include" file="calc-and-order-form">
		
		<div class="view_block clearfix">
		  <h2 class="for_h2">Отзывы клиентов</h2>
		  <div class="row view_list">
		    <div class="col-md-6">
			  <p>Руслан</p>
			  <span>«Нужно было взять в долг 50 000 на несколько дней. Обратился в «Автозалог 116». Быстро получил нужную сумму, уладил свои дела. Вернул займ через 4 дня, переплатил совсем немного. Будет необходимость - обращусь снова.»</span>
			</div>
		    <div class="col-md-6">
			  <p>Ирина</p>
			  <span>«Нужна была достаточно крупная сумма, у знакомых столько не займешь. В других компаниях предлагали слишком мало. «Автозалог 116» выдал столько, сколько нужно. И переплата минимальна. Спасибо.»</span>
			</div>
		    <div class="col-md-6">
			  <p>Ильгиз</p>
			  <span>«Всегда с недоверием относился к таким организациям, но ситуация вынудила срочно искать деньги в долг. Позвонил в «Автозалог 116». Подробно объяснили все условия займа, развеяли мои опасения о высоких процентах. Также понравилось то, что проценты рассчитываются по дням.»</span>
			</div>
		    <div class="col-md-6">
			  <p>Ренат</p>
			  <span>«Выбирал компанию автозалога из нескольких вариантов. Позвонил в шесть организаций, они рассчитали мне максимальную сумму и проценты. «Автозалог 116» предложил самый выгодный для меня вариант. Если придется, обращусь к вам снова.»</span>
			</div>			
		  </div><!--view_list-->

		  <!--<a class="for_view_go rd" href="#">все отзывы</a>-->
		</div><!--view_block-->
      </div><!--all-->	  
    </div><!--for_same_width-->

    <insert name="show_include" file="footer">
  
  </body>
</html>
