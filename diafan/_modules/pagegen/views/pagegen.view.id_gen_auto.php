<?php

/**
 * Шаблон страницы
 * 
 * @package    DIAFAN.CMS
 * @author     diafan.ru
 * @version    6.0
 * @license    http://www.diafan.ru/license.html
 * @copyright  Copyright (c) 2003-2018 OOO «Диафан» (http://www.diafan.ru/)
 */

if (!defined('DIAFAN')) {
    $path = __FILE__;
    while (!file_exists($path . '/includes/404.php')) {
        $parent = dirname($path);
        if ($parent == $path) exit;
        $path = $parent;
    }
    include $path . '/includes/404.php';
}

?>
    <div class="slider2">
        <div class="-owl-carousel">
            <div class="item" >
                <span class="inner" style="background-image: url(/userfls/bs/top-image_4.jpg)">
                    <span class="text">
                        <span class="name"><?= $result['name'] ?></span>
                        <span class="desc pos-a left-0 right-0 bottom-0 text-center mh-a mb-25"><a href="#calculator" class="btn white">Расчитать сумму займа бесплатно</a></span>
                    </span>
                </span>
            </div>
        </div>
    </div>
    <div class="container hidden-xs">
        <insert name="show_block" module="site" id="4" />
    </div>
    <div class="container visible-xs">
        <insert name="show_block" module="bs" cat_id="3" count="all" template="list" />
    </div>


    <div id="body_text" class="top-line">
        <div class="container">
                <div class="row block mb-75">
                    <div class="col-lg-5 col-md-6 col-sm-12">
                        <h2>История нашего автоломбарда</h2>
<p>Круглосуточный автоломбард в <?= $result['params']['city']['v'] ?> :) выдает деньги без выходных автовладельцам с любой кредитной историей сразу в день обращения. Мы работаем без справок, поручителей, долгих и нудных согласований в офисах. Чтобы получить наличные деньги под залог автомобиля от Вас требуется предоставление всего трех необходимых документов: розовой ламинированной карточки регистрации транспортного средства (СТС), зеленой книжки с записями данных о автомобиле и текущем владельце (<?= $result['params']['auto']['name'] ?>), обычного паспорта гражданина Российской Федерации.</p>
<p>Взять деньги без справок и поручителей, без посещения офиса ломбарда, Вы сможете прямо сейчас.</p>
                    </div>
                    <div class="col-md-6 col-lg-offset-1 col-sm-12">
                        <div class="photo_main_images slide-one owl-carousel"><a href="/userfls/photo/large/31_avtozalog.jpg" data-fancybox="galleryphoto" class="photo_image" style="background-image: url(/userfls/photo/medium/31_avtozalog.jpg)"></a></div>
                    </div>
                </div>

                <div class="block block_bg mb-75">
                    <insert name="show_include" file="calc2" />
                </div>

                <div class="block mb-75">
                    <h2>Мы выдаем займы под залог</h2>

                    <div class="row">
                        <div class="col-md-4 text-center">
                            <img src="/userfls/images/types/type_01.png" alt="" />
                            <h3>Автомобиль</h3>
                            <div class="text-left">
                                <p>Автомобиль. Залогом может служить как легковая, так и грузовая машина. Для оформления ссуды под залог автомобиля нужен паспорт РФ, ПТС, СТС.</p>
                                <a href="#">Подробнее</a>
                            </div>
                        </div>
                        <div class="col-md-4 text-center">
                            <img src="/userfls/images/types/type_02.png" alt="" />
                            <h3>Мототехника</h3>
                            <div class="text-left">
                                <p>Мы выдаем деньги под залог мотоциклов, квадроциклов, снегоходов и другой мототехники.</p>
                                <a href="#">Подробнее</a>
                            </div>
                        </div>
                        <div class="col-md-4 text-center">
                            <img src="/userfls/images/types/type_03.png" alt="" />
                            <h3>Спецтехника</h3>
                            <div class="text-left">
                                <p>Деньги под залог спецтехники выдаются на тех же условиях, что и деньги под залог автомобиля.
                                </p>
                                <a href="#">Подробнее</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="block block_bg mb-75">
                    <h2>Отзывы об автоломбарде</h2>

                    <insert name="show_block" module="reviews" template="mobile-slider" count="8" />
                </div>

                <div class="block mb-75">
                    <h2>Преимущества получения кредита под залог<?= $result['params']['type'] ?> <?= $result['params']['auto']['name'] ?> в <?= $result['params']['city']['v'] ?></h2>
                    <div class="subtitle text-center mb-15">Мы создали самые выгодные условия для наших клиентов</div>

                    <insert name="show_block" module="bs" cat_id="4" count="all" template="icons2" />
                </div>

                <div class="block block_bg mb-75">
                    <h2>Требования для займа</h2>

                    <div class="row">
                        <div class="col-sm-6">
                            <h4>Для автовладельца</h4>

                            <div class="desc-line">
                                <span>Возраст</span><span>От 18 до 80 лет</span>
                            </div>
                            <div class="desc-line">
                                <span>Гражданство</span><span>Российская Федерация</span>
                            </div>
                            <div class="desc-line">
                                <span>Официальное трудоустройство</span><span>Справки не нужны</span>
                            </div>
                            <div class="desc-line">
                                <span>Кредитная история</span><span>Рассматриваем всех</span>
                            </div>
                            <div class="desc-line">
                                <span>Справки о доходах</span><span>Не нужны</span>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <h4>Для автомобиля</h4>

                            <div class="desc-line">
                                <span>В собственности</span><span>У вас или по доверенности</span>
                            </div>
                            <div class="desc-line">
                                <span>Регистрация в ГИБДД</span><span>Обязательно</span>
                            </div>
                            <div class="desc-line">
                                <span>Не в залоге</span><span>Обязательно</span>
                            </div>
                            <div class="desc-line">
                                <span>Возраст авто</span><span>До 15 лет</span>
                            </div>
                            <div class="desc-line">
                                <span>Возможность продать заложенный автомобиль</span><span>Нет</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="block mb-75">
                    <h2>Займ по 2 документам</h2>

                    <div class="row">
                        <div class="col-xs-6 text-center">
                            <div class="thumbnail">
                                <img class="mw-full" src="/userfls/images/documents/pts.png" alt="">
                                <h4>ПТС</h4>
                                <div>(паспорт транспортного средства)</div>
                            </div>
                        </div>
                        <div class="col-xs-6 text-center">
                            <div class="thumbnail">
                                <img class="mw-full" src="/userfls/images/documents/passport.png" alt="">
                                <h4>Паспорт гражданина<br/>Российской Федерации</h4>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="block block_bg mb-75">
                    <insert name="show_block" module="faq" sort="rand" template="mobile-slider" count="10" />
                </div>

                <div class="block mb-75">
                    <insert name="show_block" module="site" id="13" />
                </div>
                
                <div class="block mb-75">
                    <insert name="show_block" module="site" id="11" /> <!-- Форма -->
                </div>


                <div class="block">
                    <h2>Автоломбард в <?= $result['params']['city']['v'] ?> - Наш офисы</h2>
                    <script type="text/javascript" charset="utf-8" async="" src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3A1e1fb7ef9982dbc74c74473da1cf6814e870596c54b16d7f06012677d262e4e7&amp;width=100%25&amp;height=687&amp;lang=ru_RU&amp;scroll=true"></script>
                </div>
        </div>
    </div>

<insert name="tpl_footer" />

<script>
$(document).ready(function() {
    $('input[name=p90]').attr('placeholder', 'Пример: ' + '<?= $result['params']['auto']['name'] ?>');
});
</script>
