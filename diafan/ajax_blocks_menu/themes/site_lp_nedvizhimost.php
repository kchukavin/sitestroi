<?php
/**
 * Посадочная страница "Займ под залог недвижимости"
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
	<insert name="show_css" files="main.css, bxslider_fix.css, fix.css, lp_nedvizhimost.css">
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
    

    <div class="vitrina vitrina_nedvizhimost">
	  <div class="all">
		  <div class="row">
			  <div class="col-md-8 vitrina__desc">
				  <div class="vitrina__txt1">Деньги под залог</div>
				  <div class="vitrina__txt2">недвижимости</div>
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
			
			<h1 class="heading1_topline">Автоломбард в Казани:<br>Деньги под залог недвижимости в Казани.</h1>
			
			<p class="top-text">
Срочно нужны деньги? Выдаем до 20 000 000 наличными за один день. Без подтверждения доходов, с любой кредитной историей. Процентная ставка - всего от 4,5% до 6% в месяц<!--, срок займа - от трех дней-->.</p>
		<div class="for_done clearfix">
	      <h2 class="for_h2">Наши предложения</h2>
		  <ul class="list_done clearfix">
		    <li class="for_low clearfix">
		      <img class="animated onhover pulse" src="/userfiles/images/done1.png" alt="" />
			  <p class="fo_step">Квартира остается в вашем распоряжении</p>
			  <ul class="so_list">
				<li>вы лишь не сможете продать свою<br/> недвижимость на период договора.</li>
			  </ul>
			  <!--<div class="text-center">
				  <!--a class="more_done" href="/dengi-pod-zalog-pts/">Подробнее</a-->
				  <a class="btn btn-primary" href="/dengi-pod-zalog-pts/">Подробнее</a>
			  </div>-->
		    </li>
		    <li class="for_low clearfix">
		      <img class="animated onhover pulse" src="/userfiles/images/done2.png" alt="" />
			  <p class="fo_step">Минимум документов</p>
			  <ul class="so_list">
				<li>Ваш паспорт и документы о праве собственности<br/> на недвижимость</li>
			  </ul>
			  <!--<div class="text-center">
					<!--a class="more_done" href="/kredit-pod-zalog-avto/">Подробнее</a-->
				  <a class="btn btn-primary" href="/kredit-pod-zalog-avto/">Подробнее</a>
			  </div>-->
		    </li>
		    <li class="for_low clearfix marginr">
		      <img class="animated onhover pulse" src="/userfiles/images/done3.png" alt="" />
			  <p class="fo_step">Быстрое оформление</p>
			  <ul class="so_list">
				<li>Оформление и получение денег в течение одного дня</li>
	          </ul><!--so_list-->
			  <!--<div class="text-center">
					<!--a class="more_done" href="/kredit-pod-zalog-nedvizhimosti/">Подробнее</a-->
				  <a class="btn btn-primary" href="/kredit-pod-zalog-nedvizhimosti/">Подробнее</a>
			  </div>-->
		    </li>
		  </ul><!--list_done-->
	    </div><!--for_done-->
			<div class="for_done_clearfix">
				  <h3><p align="center">Мы поможем решить ваши проблемы!</p></h3>
	<p>В отличие от банка, в Автоломбарде “Ваш финансистъ” вам не нужно будет подтверждать свой доход, беспокоиться о чистоте кредитной истории и стоять в долгих и длинных очередях. Мы поможем подготовить вам весь пакет документов. У нас вы встретите одобрение займа под залог недвижимости с вероятностью 99% при этом с выгодными условиями!</p>
	<p>И самое главное. Наш принцип – “все мы люди”. Мы всегда рады пойти навстречу клиенту и поможем найти решение в любых сложных моментах.</p>
			</div>

			<div class="heading2">Условия займа под залог недвижимости в Казани</div>
			
			<div class="row">
				<div class="col-md-offset-2 col-md-4">
					<ul class="lp-ned-oklist">
						<li>От 50 000 до 20 000 000 рублей</li>
						<li>Срок займа от 3-х дней до бесконечности (неограниченное продление займа)</li>
						<li>Процентная ставка от 0,15% в день (4,5% в месяц)</li>
						<li>Время на оформление 30 минут</li>
					</ul>
					
					<!--<div style="font-size: 11px; margin: 10px 24px;">
						В качестве залога принимаем расчет и оформление
					</div>-->
				</div>
				<div class="col-md-4">
					<ul class="lp-ned-oklist">
						<li>Досрочное погашение без штрафов и комиссии</li>
						<li>Неограниченное продление займа.</li>
						<li>Вы получаете до 85% от рыночной стоимости недвижимости</li>
						<li>Недвижимое имущество не должно быть под обременением</li>
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
	<p>Если у вас неидеальная кредитная история, нет официального заработка и возможности подтвердить вашу зарплату справкой из налоговой, то в банке вы точно столкнетесь с отказом.</p>
<p>Помимо того, что ваша заявка в банке будет обрабатываться 2-3 месяца, наличие у вас недвижимости будет лишь подтверждением вашей платежеспособности, а не гарантией получения займа.</p>
	<div class="for_same_width">
	  <div class="all">
	    <div class="thing_block">
		  <h2 class="for_h2">В качестве залога принимаем</h2>
		  <ul class="thing_list clearfix">
		    <li>
			  <div class="img_part">
			    <img src="/userfiles/icons/ned_garazh.png" alt="Гараж" />
			  </div>
			  <p>Гараж</p>
			  <!--<span>Для оформления ссуды под залог авто не требуется справка о доходах – только паспорт гражданина РФ, ПТС и СТС.</span>
			  <a href="#">подробнее</a>-->
			</li>
		    <li>
			  <div class="img_part">
			    <img src="/userfiles/icons/ned_tp.png" alt="Торговую площадь" />
			  </div>
			  <p>Торговую площадь</p>
			  <!--<span>Наш автоломбард выдает деньги под залог ПТС, различных транспортных средств</span>
			  <a href="#">подробнее</a>-->
			</li>
		    <li>
			  <div class="img_part">
			    <img src="/userfiles/icons/ned_sklad.png" alt="Склад" />
			  </div>
			  <p>Склад</p>
			  <!--<span>При оформлении договора необходимо тщательно ознакомиться со всеми документами и условиями выплаты</span>
			  <a href="#">подробнее</a>-->
			</li>
		    <li class="margin_r">
			  <div class="img_part">
			    <img src="/userfiles/icons/ned_uchastok.png" alt="Участок" />
			  </div>
			  <p>Участок</p>
			  <!--<span>Можете заложить: гараж, коммерческую недвижимость, земельный надел.</span>
			  <a href="#">подробнее</a>-->
			</li>
		  </ul><!--thing_list-->
		</div><!--thing_block-->
      </div><!--all-->
			  <div class="for_done_clearfix">
		  <h3><p align="center">В чем главные отличия банка и автоломбарда:</p></h3>
			  <p>Как правило, банки предъявляют строгие требования к заемщику и его квартире, дому и т.д., поэтому лучше сразу обратиться в автоломбард Казани, чтобы сэкономить ваше драгоценное время и нервы</p>
			  <div class="row">
				<div class="col-md-offset-2 col-md-4">
					<ul class="lp-ned-oklist">
						<li>Оперативность – от подачи заявки до получения денег пройдет не более одного дня</li>
						<li>Доступность – взять заем под залог недвижимости можно без справок и поручителей. С любой кредитной историей.</li>
					</ul>
				</div>
				<div class="col-md-4">
					<ul class="lp-ned-oklist">
						<li>Выгода – проценты начисляются по дням. Вы не переплачиваете за лишнее время.</li>
				<li>В автоломбарде автозайм под залог птс может получить любой собственник имущества</li>
					</ul>
				</div>
			</div>
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
		
		
		
		<div class="view_block clearfix">
		  <div class="heading2">Отзывы клиентов</div>
		  <ul class="view_list clearfix">
		    <li>
			  <p>Валентин</p>
			  <span>«Обращался в «Автоломбард «Ваш финансистъ» несколько раз. Очень доволен оперативностью оформления займа. При первом обращении получил деньги на следующий день после подачи заявки, во все последующие - уже в тот же день.»</span>
			</li>
		    <li class="margin_r">
			  <p>Александр</p>
			  <span>«Обращался в «Автоломбард «Ваш финансистъ» несколько недель назад. Понравился короткий срок займа и пересчет по дням. Пользовался деньгами 5 дней - ровно за 5 дней и заплатил проценты.»</span>
			</li>
		    <li>
			  <p>Денис</p>
			  <span>«Иногда бывают ситуации, когда поставщик доставил крупную партию товара, а на оплату не хватает средств. «Автоломбард «Ваш финансистъ» всегда выручает в таких ситуациях. Выгодная процентная ставка позволяет в результате остаться в прибыли.»</span>
			</li>
		    <li class="margin_r">
			  <p>Оксана</p>
			  <span>«Редко пользуюсь займами, но недавно срочно понадобилась довольно крупная сумма. Обратилась в «Автоломбард «Ваш финансистъ». Получила деньги за один день.»</span>
			</li>			
		  </ul><!--view_list-->
		  <!--<a class="for_view_go rd" href="#">все отзывы</a>-->
		</div><!--view_block-->
      </div><!--all-->	  
    </div><!--for_same_width-->

	
	<div class="vitrina vitrina_text-form">
		<div class="all">
			<div class="heading2">
				Взять кредит займ под залог недвижимости у<br>
				ООО "Автоломбард "Ваш финансиситъ" легко.
			</div>
			
			<div class="row">
				<div class="col-md-8 vitrina__maintext">
					<p>
						Займ под залог недвижимости будет интересен в первую очередь тем, кому нужна достаточно крупная сумма на короткий срок. Такой способ кредитования не требует подтверждения доходов, заполнения множества справок и присутствия поручителей. Кредитная история также не имеет значения. Вам нужно только предоставить документы на вашу недвижимость и паспорт, подать заявку, и уже на следующий день вы получите наличные. При этом недвижимое имущество остается в вашем распоряжении, вы можете продолжать пользоваться им в обычном режиме. Чтобы подать заявку на займ, заполните форму справа или звоните по телефону 8 (843) 216 66 86.
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