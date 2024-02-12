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

<h1 class="text-center"><?= $result['name'] ?></h1>

<div class="block-row row mb-40">
    <div class="col-sm-12">
        <div class="br-40 p-40 bg-gray">
            <div class="mb-10"><strong>Имя</strong>: <?= $result['params']['name'] ?></div>
            <div class="mb-10"><strong>Сумма займа</strong>: <?= $result['params']['sum'] ?></div>
            <div class="mb-10"><strong>Город</strong>: <?= $result['params']['city'] ?></div>
            <div class="mb-10"><strong>Марка авто</strong>: <?= $result['params']['auto']['name'] ?></div>
            <div class="mb-10"><strong>Оценочная стоимость авто</strong>: <?= $result['params']['auto']['value'] ?></div>
            <div class="mb-10"><strong>Процентная ставка</strong>: <?= $result['params']['percent'] ?></div>
            <div class="mb-10"><strong>Описание</strong>: Долго искал автоломбард, выбрал «Автозалог 116». Понравилось общаться с менеджером по телефону, затем пригнал свою <?= $result['params']['auto']['name'] ?> и поставил на площадку. Оформили быстро, денег дали все <?= $result['params']['sum'] ?> по телефону. Машину выкупил, ни каких скрытых платежей не было. Остался доволен. Многим советую.</div>
        </div>
    </div>
</div>
