<?php
/**
 * Главная страница сайта
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
	<insert name="show_css" files="main.css, bxslider-theme.css, fix.css">
	<link href="<insert name="custom" absolute="true" path="css/bootstrap.min.css" >" rel="stylesheet" />
	<link href="<insert name="custom" absolute="true" path="css/animate.min.css" >" rel="stylesheet" />
	<meta name='wmail-verification' content='7ca4dcbafd95d5944cf92a2d79872abc' />


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
		<insert name="show_include" file="header">
	  </div><!--header-->
	  
	</div><!--all-->
		
		
	<!--<div class="vitrina vitrina_main">-->
		 <div class="for_same_width">
	  <div class="all">
	    <div class="thing_block">
	  <div class="all">
		  <div class="row">
			  <div class="col-md-8 vitrina__desc">
				  <div class="for_h2">Деньги под залог ПТС</div>
				  
			  </div>
			  <div class="col-md-4">
				<div class="vitrina__form YM_verh_form">
					<insert name="show_form" module="feedback" site_id="37">
				</div>
			  </div>
		  </div>
	  </div>
    </div>
					<!--
	<ul class="bxslider">
		<li>
			<img src="/userfiles/slides/slide01.jpg">
			<!--<div class="slide">-->
				<!--img src="/custom/custom29_08_2016_17_15/img/big.jpg"-->
				
				<!--
				<div class="slide__content">
					<div class="slide__heading">
						Автоломбард
					</div>
					
					<div class="slide__text">
						Деньги под залог  ПТС, авто
					</div>
				</div>
				-->
			<!--</div>
		</li>
		<li>
			<a href="/usloviya-zayma/"><img src="/userfiles/slides/slide02.jpg"></a>
		</li>
		<li>
			<a href="/kredit-pod-zalog-nedvizhimosti/"><img src="/userfiles/slides/slide03.jpg"></a>-->
		</li>
	</ul><!-- bxslider -->
    <div class="all">
	  <div class="content clearfix">
	    <div class="stand_text">
	      
		  <h1 class="for_h1">Автоломбард в Казани – деньги под залог ПТС</h1>
		  <!--<p>Наш автоломбард выдает деньги под залог ПТС, транспортных средств и недвижимости. Мы гарантируем прозрачность сделки и предоставляем самые  выгодные  условия  кредитования  в регионе в сравнении с конкурентами. Минимальный срок  кредитования  от  3 дней.  Подробные условия займа.  После заключения договора и соблюдения всех  необходимых формальностей  вы  можете  ехать  по  своим  делам  автомобиль остается у вас!</p>-->
		  
		  
		  <insert name="show_body">
		  
		  
	    </div><!--stand_text-->
	    <div class="for_done clearfix">
	      <h2 class="for_h2">Наши предложения</h2>
		  <ul class="list_done clearfix">
		    <li class="for_low clearfix">
		      <img class="animated onhover pulse" src="/userfiles/images/done1.png" alt="" />
			  <p class="fo_step">Быстрое оформление</p>
			  <ul class="so_list">
				<li>Оформление и получение денег за 30 минут</li>
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
				<li>Ваш паспорт, свидетельство и ПТС автомобиля</li>
			  </ul>
			  <!--<div class="text-center">
					<!--a class="more_done" href="/kredit-pod-zalog-avto/">Подробнее</a-->
				  <a class="btn btn-primary" href="/kredit-pod-zalog-avto/">Подробнее</a>
			  </div>-->
		    </li>
		    <li class="for_low clearfix marginr">
		      <img class="animated onhover pulse" src="/userfiles/images/done3.png" alt="" />
			  <p class="fo_step">Автомобиль остается у вас</p>
			  <ul class="so_list">
				<li>Пользуйтесь автомобилем, как и раньше</li>
	          </ul><!--so_list-->
			  <!--<div class="text-center">
					<!--a class="more_done" href="/kredit-pod-zalog-nedvizhimosti/">Подробнее</a-->
				  <a class="btn btn-primary" href="/kredit-pod-zalog-nedvizhimosti/">Подробнее</a>
			  </div>-->
		    </li>
		  </ul><!--list_done-->
	    </div><!--for_done-->
				  <div class="for_done_clearfix">
			<h3><p align="center">Вы получаете деньги, при этом автомобиль остается у вас!</p></h3>
			<p>Срочно нужны деньги? – от такого никто не застрахован и причины могут быть разными – от проблем со здоровьем до срочных вложений в бизнес.</p>
			<p>Огромный плюс в получении займа под залог ПТС в Казани это то, что вы продолжаете пользоваться автомобилем, как и раньше – авто остается у вас. При этом вы можете взять нужную сумму в короткое время даже с плохой кредитной историей. Вам не нужны ни посредники, ни знакомые, ни поручители – всю сумму вы получаете напрямую от кредитора.</p>
		</div>
				<div class="view_block_clearfix">
	      <h2 class="for_h2">Условия займа под залог ПТС<br/> в автоломбарде «Ваш финансистъ» в Казани</h2>
		  	<ul class="so_list">
				<div style="float: left; width: 49%;">
			  	<li>Сумма займа от 30 000 до 3 000 000 рублей</li>
				<li>Срок займа от 3-х дней до бесконечности (неограниченное продление займа)</li>
		  		<li>Процентная ставка от 0,15% в день (4,5% в месяц)</li>
				</div>
				<div style="float: right; width: 49%;">
		  		<li>Время на оформление 30 минут</li>
		  		<li>Досрочное погашение без штрафов и комиссии</li>
		  		<li>Вы получаете до 65% от рыночной стоимости автомобиля</li>
				</div><div class="clear">
			 </ul>
			 </div>
			<div class="for_done_clearfix">
			<h3><p align="center">В чем главные отличия банка и автоломбарда в Казани:</p></h3>
			<ul class="so_list">
				<div style="float: left; width: 49%;">
				<li>Оперативность – от подачи заявки до получения денег пройдет не более одного дня</li>
				<li>Доступность – взять заем под залог птс можно без справок и поручителей. С любой кредитной историей.</li>
				</div>
				<div style="float: right; width: 49%;">
				<li>Выгода – проценты начисляются по дням. Вы не переплачиваете за лишнее время.</li>
				<li>В автоломбарде автозайм под залог птс может получить любой собственник машины,<br/> которому есть 18 лет – пенсионер; студент; безработный; человек, имеющий судимость; собственник с испорченной кредитной историей</li>
				</div>
				</ul>
				</div>
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
			  <div class="for_done_clearfix">
				  <p align="center">Автоломбард «Ваш финансистъ» работает в сфере автозаймов уже с 2010 года. За это время довольными клиентами стали более 1000 человек.<p>
					  </div>
	  
	  <div class="for_forms clearfix">
			<h2 id="main-calc" class="for_h2">Расчет и оформление займа</h2>
			<div class="loft_fm clearfix ld">
				<p>Калькулятор займа</p>
				<div id="js-calc-kredit" class="YM_calc"></div>
			</div><!--left_fm-->
			<div class="YM_center_form">
				<insert name="show_form" module="feedback" site_id="37" template="send-request">
			</div>
		</div><!--for_forms-->
		<div class="doveryaut">
			<div class="for_h2">Почему нам доверяют?</div>
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
		<!--<div class="for_forms clearfix">
			<h2 id="main-calc" class="for_h2">Расчет и оформление займа</h2>
			<div class="loft_fm clearfix ld">
				<p>Калькулятор займа</p>
				<div id="js-calc-kredit" class="YM_calc"></div>
			</div><!--left_fm-->
			<div class="YM_center_form">
				<insert name="show_form" module="feedback" site_id="37" template="send-request">
			</div>
		</div><!--for_forms-->
	  </div><!--content-->
    </div><!--all-->
    <div class="for_same_width">
	  <div class="all">
	    <div class="thing_block">
		  <h2 class="for_h2">В качестве залога можно оставить</h2>
		  <ul class="thing_list clearfix">
		    <li>
			  <div class="img_part">
			    <img src="/userfiles/images/thing1.png" alt="" />
			  </div>
			  <p>Автомобили</p>
			  <span>Для оформления ссуды под залог авто не требуется справка о доходах – только паспорт гражданина РФ, ПТС и СТС.</span>
			  <a href="https://avtozalog116.ru/kredit-pod-zalog-avto/">подробнее</a>
			</li>
		    <li>
			  <div class="img_part">
			    <img src="/userfiles/images/thing2.png" alt="" />
			  </div>
			  <p>Мототехника</p>
			  <span>Наш автоломбард выдает деньги под залог мотоциклов, квадроциклов, снегоходов и другой мототехники.</span>
			  <a href="https://avtozalog116.ru/dengi-pod-zalog-mototsikla/">подробнее</a>
			</li>
		    <li>
			  <div class="img_part">
			    <img src="/userfiles/images/thing3.png" alt="" />
			  </div>
			  <p>Спецтехника</p>
			  <span>Деньги под залог спецтехники выдаются на тех же условиях, что и деньги под залог автомобиля.</span>
			  <a href="https://avtozalog116.ru/dengi-pod-zalog-spetstekhniki/">подробнее</a>
			</li>
		    <li class="margin_r">
			  <div class="img_part">
			    <img src="/userfiles/images/thing4.png" alt="" />
			  </div>
			  <p>Недвижимость</p>
			  <span>Можете заложить: гараж, коммерческую недвижимость,   земельный надел.</span>
			  <a href="https://avtozalog116.ru/kredit-pod-zalog-nedvizhimosti/">подробнее</a>
			</li>			
		  </ul><!--thing_list-->
		</div><!--thing_block-->
		-->
		<!--<div class="row twobanners">
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
		</div>-->
	
		<div class="view_block clearfix">
		  <h2 class="for_h2">Наши документы</h2> 
		  <ul class="view_list clearfix">
		    <li>
			  	<p>Лист записи Единого государственного реестра юридических лиц&nbsp;<a href="http://new.avtozalog116.ru/userfiles/images/List_zapisi.pdf">скачать</a></p>
			</li>
		    <li class="margin_r">
			  	<p>Свидетельство о постановке на учет в налоговом органе&nbsp;<a href="http://new.avtozalog116.ru/userfiles/images/svidetelstvo.jpg">скачать</a></p>
			</li>
		    <li>
				<p>Выписка из Единого государственного реестра юридических лиц&nbsp;<a href="http://new.avtozalog116.ru/userfiles/images/Vypiska.pdf">скачать</a></p>
			</li>			
		  </ul><!--view_list-->
		  <!--<a class="for_view_go rd" href="#">все отзывы</a>-->
		</div><!--view_block-->
			  
      </div><!--all-->	  
    </div><!--for_same_width-->
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