<?php
/**
 * Посадочная страница "Деньги под залог авто"
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
	<insert name="show_css" files="main.css, bxslider_fix.css, fix.css, lp_avto.css">
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
    

    <div class="vitrina vitrina_avto">
	  <div class="all">
		  <div class="row">
			  <div class="col-md-8 vitrina__desc">
				  <!--div class="vitrina__txt1">ПТС</div-->
				  <div class="vitrina__txt1">Деньги под залог <span class="vitrina__txt2">авто</span></div>
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
			
			<h1 class="heading1_topline">Автоломбард в Казани:<br>кредит под залог авто.</h1>
			
			<p class="top-text">
				Займ под залог авто от 4,5% до 6% в месяц<!--, от 3 дней-->. Выдаем деньги за 30 минут. До 5 000 000 рублей наличными без подтверждения доходов. Самый простой и быстрый способ получить нужную сумму!
			</p>
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
			  <p class="fo_step">Хранение автомобиля на охраняемой стоянке</p>
			  <ul class="so_list">
				<li>Ваш авто будет в безопасности</li>
	          </ul><!--so_list-->
			  <!--<div class="text-center">
					<!--a class="more_done" href="/kredit-pod-zalog-nedvizhimosti/">Подробнее</a-->
				  <a class="btn btn-primary" href="/kredit-pod-zalog-nedvizhimosti/">Подробнее</a>
			  </div>-->
		    </li>
		  </ul><!--list_done-->
	    </div><!--for_done-->
				  <div class="for_done_clearfix"
				  <h3><p align="center">Хотите получить до 85% от рыночной стоимости автомобиля?</p></h3>
<p>Каждый в жизни сталкивался со срочной необходимостью в финансах – проблемы в семье, траты на лечение, помощь своему бизнесу.</p>
<p>Ваша выгода в получении кредита под залог авто в Казани это то, что вам не придется переживать о состоянии и безопасности машины – она будет стоять на охраняемой стоянке. В отличие от банка, мы не откажем вам в краткосрочном займе, даже если у вас плохая кредитная история.</p>
</div>
			<div class="view_block_clearfix">
	      <h2 class="for_h2">Условия займа под залог авто<br/> в автоломбарде «Ваш финансистъ» в Казани</h2>
		  	<ul class="so_list">
				<div style="float: left; width: 49%;">
			  	<li>Сумма займа от 20 000 до 5 000 000 рублей</li>
				<li>Срок займа от 3-х дней до бесконечности (неограниченное продление займа)</li>
		  		<li>Процентная ставка от 0,15% в день (4,5% в месяц)</li>
				</div>
				<div style="float: right; width: 49%;">
		  		<li>Время на оформление 30 минут</li>
		  		<li>Досрочное погашение без штрафов и комиссии</li>
		  		<li>Вы получаете до 85% от рыночной стоимости автомобиля</li>
				</div><div class="clear">
			 </ul>
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
			  <p>Заключаем договор</p>
			  <!--<span>При оформлении договора необходимо тщательно ознакомиться со всеми документами и условиями выплаты</span>
			  <a href="#">подробнее</a>-->
			</li>
		    <li class="margin_r">
			  <div class="img_part">
			    <img src="/userfiles/icons/pts_dengi.png" alt="Шаг 4" />
			  </div>
			  <p>Получаете деньги</p>
			  <!--<span>Можете заложить: гараж, коммерческую недвижимость, земельный надел.</span>
			  <a href="#">подробнее</a>-->
			</li>
		  </ul><!--thing_list-->
		</div><!--thing_block-->
      </div><!--all-->
	  <div class="for_done_clearfix">
		  <h3><p align="center">В чем главные отличия банка и автоломбарда:</p></h3>
			  <p>Как правило, банки предъявляют строгие требования к заемщику и его транспортному средству, поэтому лучше сразу обратиться в автоломбард Казани, чтобы сэкономить ваше драгоценное время и нервы</p>
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
		
		<div class="for_done_clearfix">
				  <p align="center">Автоломбард «Ваш финансистъ» работает в сфере автозаймов уже с 2010 года. За это время довольными клиентами стали более 1000 человек.<p>
					  </div>
		
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
						Взять деньги под залог автомобиля можно без справок и поручителей. С любой кредитной историей.
					</p>
				</div>
				<div class="col-md-4">
					<div class="text-center">
						<img src="/userfiles/icons/dover_5.png" alt="Высокая оценка">
					</div>

					<div class="heading3">Высокая оценка</div>
					<p>
						Вы получаете в кредит наличными под залог авто до 85% стоимости залога.
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
		<br   >
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
			  <p>Константин</p>
			  <span>«Спасибо «Автоломбарду «Ваш финансистъ» за помощь в трудной ситуации. Сочно нужны были наличные, в других компаниях за мой автомобиль предлагали недостаточную сумму. Здесь же получил столько, сколько требовалось.»</span>
			</li>
		    <li class="margin_r">
			  <p>Рамис</p>
			  <span>Никогда раньше не брал займы под залог автомобиля. Опасался «подводных камней» и скрытых комиссий. Специалист автоломбарда «Ваш финансистъ» развеял все мои сомнения своей подробной консультацией. Получил нужную сумму, оставил авто на стоянке, а через две недели забрал свою ласточку в целости и сохранности.»</span>
			</li>
		    <li>
			  <p>Фанис</p>
			  <span>«Я не сторонник займов под залог авто, но обстоятельства вынудили искать деньги срочно. Из все вариантов выбрал «Ваш финансистъ» и не пожалел. Переплата в итоге оказалась небольшой, и никаких комиссий.»</span>
			</li>
		    <li class="margin_r">
			  <p>Алена</p>
			  <span>«Обращаюсь в «Ваш финансистъ» не первый раз. Раньше пользовалась только займом под залог ПТС, но сейчас понадобилась сумма крупнее. Оформили так же быстро, как всегда, процентную ставку назначили даже ниже обычного.»</span>
			</li>			
		  </ul><!--view_list-->
		  <!--<a class="for_view_go rd" href="#">все отзывы</a>-->
		</div><!--view_block-->
      </div><!--all-->	  
    </div><!--for_same_width-->

	
	<div class="vitrina vitrina_text-form">
		<div class="all">
			<div class="heading2">
				Взять деньги под залог автомобиля у<br>
				ООО «Автоломбард «Ваш финансистъ» легко.
			</div>
			
			<div class="row">
				<div class="col-md-8 vitrina__maintext">
					<p>
						Если вы хотите получить некоторую сумму денег, а под залог ПТС предлагают слишком мало, кредит под залог автомобиля - оптимальный вариант для вас. Вам не придется собирать большой пакет документов, достаточно паспорта, свидетельства о регистрации авто и ПТС. Также не нужны поручители и подтверждение доходов. Не имеет значения и кредитная история. Все время, пока вы пользуетесь займом, автомобиль находится на надежно охраняемой стоянке. Если ваш автомобиль исправен, растаможен и не находится в залоге - одобряем 100%. Отправьте заявку через форму справа или звоните по телефону 8 (843) 216 66 86.
						
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