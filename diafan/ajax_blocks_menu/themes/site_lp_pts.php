<?php
/**
 * Посадочная страница "Деньги под залог ПТС"
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

	<link href="<insert name="custom" absolute="true" path="vendor/bxslider/jquery.bxslider.css" >" rel="stylesheet" />
	<insert name="show_css" files="main.css, bxslider_fix.css, fix.css, lp_pts.css">
	<link href="<insert name="custom" absolute="true" path="css/bootstrap.min.css" >" rel="stylesheet" />
	<link href="<insert name="custom" absolute="true" path="css/animate.min.css" >" rel="stylesheet" />

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
  
  <insert name="show_include" file="ym_init">
  
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
    

    <div class="for_same_width"><!--"vitrina vitrina_pts"-->
	  <div class="all">
		  <div class="row">
			  <div class="col-md-8 vitrina__desc">
				  <div class="vitrina__txt1">Деньги под залог <span class="vitrina__txt2">ПТС</span></div>
				  
			  </div>
			  <div class="col-md-4">
				<div class="vitrina__form YM_verh_form">
					<insert name="show_form" module="feedback" site_id="37">
				</div>
			  </div>
		  </div>
	  </div>
    </div><!--for_width-->
	
	
	

    <div class="all">
	  <div class="content clearfix">
	    <div class="stand_text">
		
			<insert name="show_body">
			
			<h1 class="heading1_topline">Автоломбард "Ваш финансистъ":<br>деньги под залог ПТС автомобиля в Казани.</h1>
			
			<p class="top-text">
				Выдаем до 3 000 000 за 30 минут. Авто остается у Вас. <!--Срок - от 3 дней,-->Cтавка - от 4,5% до 6% в месяц. Самый простой и выгодный способ получить деньги, не расставаясь с имуществом!
			</p>

			<div class="heading2">Условия займа</div>
			
			<div class="row">
				<div class="col-md-offset-2 col-md-4">
					<ul class="lp-ned-oklist">
						<li>Ставка от 4,5% до 6% в месяц.</li>
						<li>Вы можете получить до 65% от рыночной стоимости автомобиля.</li>
						<li>От 30 000 до 3 000 000 рублей.</li>
						<li>Срок займа от 61-го дня до 10 лет.</li>
						<!--
						<li>Срок займа от 3-х дней.</li>
						-->
					</ul>
					
					<!--<div style="font-size: 11px; margin: 10px 24px;">
						В качестве залога принимаем расчет и оформление
					</div>-->
				</div>
				<div class="col-md-4">
					<ul class="lp-ned-oklist">
						<!--
						<li>Неограниченное продление займа.</li>
						-->
						<li>Оформление и получение денег за полчаса.</li>
						<li>Гибкий график платежей.</li>
						<li>Досрочное погашение.</li>
						<li>Никаких комиссий.</li>
						<li>Первые 30 дней просрочки без пени и штрафов <br/>по истечении 30-ти дней начисляется пени 0,1% в день</li>
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
			  <!--<span>Наш автоломбард выдает деньги под залог ПТС, различных транспортных средств</span>
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
	  
	  <div class="all">
		<div class="for_forms clearfix">
			<div id="main-calc" class="heading2">Расчет и оформление займа</div>
			<div class="loft_fm clearfix ld">
				<p>Калькулятор займа</p>
				<div id="js-calc-kredit" class="YM_calc"></div>
			</div><!--left_fm-->
			<div class="YM_center_form">
				<insert name="show_form" module="feedback" site_id="37" template="send-request">
			</div>
		</div><!--for_forms-->
		
		
		
		<div class="doveryaut">
			<div class="heading2">Почему нам доверяют?</div>
			<div class="row">
				<div class="col-md-4">
					<div class="text-center">
						<img src="/userfiles/icons/dover_1.png" alt="Надёжность">
					</div>
					
					<div class="heading3">Надёжность</div>
					<p>
						Работаем с 2010 года. За это время нашими довольными клиентами стали более 1000 человек.
					</p>
				</div>
				<div class="col-md-4">
					<div class="text-center">
						<img src="/userfiles/icons/dover_2.png" alt="Полная прозрачность">
					</div>

					<div class="heading3">Полная прозрачность</div>
					<p>
						Подробно консультируем по всем вопросам, условия договора прозрачны и понятны.
					</p>
				</div>
				<div class="col-md-4">
					<div class="text-center">
						<img src="/userfiles/icons/dover_3.png" alt="Выгода">
					</div>

					<div class="heading3">Выгода</div>
					<p>
						Проценты начисляются по дням. Вы не переплачиваете за лишнее время.
					</p>
				</div>
				<div class="col-md-4">
					<div class="text-center">
						<img src="/userfiles/icons/dover_4.png" alt="Доступность">
					</div>

					<div class="heading3">Доступность</div>
					<p>
						Взять деньги под залог недвижимости можно без справок и поручителей. С любой кредитной историей.
					</p>
				</div>
				<div class="col-md-4">
					<div class="text-center">
						<img src="/userfiles/icons/dover_5.png" alt="Высокая оценка">
					</div>

					<div class="heading3">Высокая оценка</div>
					<p>
						Вы получаете в кредит наличными под залог недвижимости до 85% стоимости залога.
					</p>
				</div>
				<div class="col-md-4">
					<div class="text-center">
						<img src="/userfiles/icons/dover_6.png" alt="Оперативность">
					</div>

					<div class="heading3">Оперативность</div>
					<p>
					От подачи заявки до получения денег пройдет не более одного дня.
				</div>
			</div>

		
		</div>
		
		<div class="row twobanners">
			<div class="col-md-6">
				<a class="twobanners__banner" target="_blank" href="http://www.gibdd.ru/check/auto/">
					<img src="/userfiles/icons/car_icon1.png">
					<h3>Проверка в ГИБДД</h3>
					<p>
						Проверь свой автомобиль на официальном сайте
					</p>
				</a>
			</div>
			<div class="col-md-6">
				<a class="twobanners__banner" target="_blank" href="https://reestr-zalogov.ru/#/">
					<img src="/userfiles/icons/car_icon2.png">
					<h3>Проверка в банках</h3>
					<p>
						Проверь свой автомобиль в банках партнёрах по VIN коду
					</p>
				</a>
			</div>
		</div>
		
		<div class="view_block clearfix">
		  <div class="heading2">Отзывы клиентов</div>
		  <ul class="view_list clearfix">
		    <li>
			  <p>Руслан</p>
			  <span>«Нужно было взять в долг 50 000 на несколько дней. Обратился в «Автоломбард «Ваш финансистъ». Быстро получил нужную сумму, уладил свои дела. Вернул займ через 4 дня, переплатил совсем немного. Будет необходимость - обращусь снова.»</span>
			</li>
		    <li class="margin_r">
			  <p>Ирина</p>
			  <span>Нужна была достаточно крупная сумма, у знакомых столько не займешь. В других автоломбардах предлагали слишком мало. «Ваш финансистъ» выдал столько, сколько нужно. И переплата минимальна. Спасибо.»</span>
			</li>
		    <li>
			  <p>Ильгиз</p>
			  <span>«Всегда с недоверием относился к ломбардам, но ситуация вынудила срочно искать деньги в долг. Позвонил в «Ваш финансистъ». Подробно объяснили все условия займа, развеяли мои опасения о высоких процентах. Также понравилось то, что проценты рассчитываются по дням.»</span>
			</li>
		    <li class="margin_r">
			  <p>Ренат</p>
			  <span>«Выбирал автоломбард из нескольких вариантов. Позвонил в шесть организаций, они рассчитали мне максимальную сумму и проценты. «Ваш финансистъ» предложил самый выгодный для меня вариант. Если придется, обращусь к вам снова.»</span>
			</li>			
		  </ul><!--view_list-->
		  <!--<a class="for_view_go rd" href="#">все отзывы</a>-->
		</div><!--view_block-->
      </div><!--all-->	  
    </div><!--for_same_width-->

	
	<div class="vitrina vitrina_text-form">
		<div class="all">
			<div class="heading2">
				Взять займ под залог ПТС у<br>
				ООО «Автоломбард «Ваш финансистъ» легко.
			</div>
			
			<div class="row">
				<div class="col-md-8 vitrina__maintext">
					<p>
						Если вы хотите получить некоторую сумму денег, но не готовы временно расстаться со своим автомобилем, займ под залог ПТС - лучший вариант для вас. Вам не придется собирать большой пакет документов, достаточно паспорта, свидетельства о регистрации авто и собственно ПТС. Также не нужны поручители и подтверждение доходов. Не имеет значения и кредитная история. Если ваш автомобиль исправен, растаможен и не находится в залоге - одобряем 100%. Отправьте заявку через форму справа или звоните по телефону 8 (843) 216 66 86.
						
					</p>
					<p>
						<br>
					</p>
					<!--<p class="small">
						Ваша недвижимость, наши деньги!
					</p>-->
				</div>
				<div class="col-md-4">
					<div class="vitrina__form YM_niz_form">
						<insert name="show_form" module="feedback" site_id="37">
					</div>
				</div>
			</div>
			
		</div>
	</div>

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