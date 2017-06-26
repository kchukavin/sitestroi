<?php

$redirectPath = $_SERVER['HTTP_REFERER'];

function post2Msg($post) {
	
	$translate = array(
		'name'		=> 'Имя',
		'phone'		=> 'Телефон',
		'email'		=> 'Email',
		'phone_email'		=> 'Тел. или email',
		'message'	=> 'Сообщение',
		'date'		=> 'Дата',
		'kolichestvo'	=> 'Количество людей',
		'from'		=> 'Откуда',
		'to'		=> 'Куда',
		'direction'	=> 'Направление',
	);

	$msg = $post['form_name'] . "\n\n";
	unset($post['form_name']);
	
	foreach ($post as $key => $val) {
		$name = $key;
		if (array_key_exists($key, $translate)) $name = $translate[$key];
		
		$msg .= "$name: $val\n";
	}


	return $msg;
}

$address = "konst.site@gmail.com"; // Сюда впишите свою эл. почту
$sub = $_POST['form_name'] . ' <'.$_SERVER['HTTP_REFERER'].'>'; // Тема письма
$email = 'Заказ <no-reply@nodomain.no>'; // От кого

// А здесь прописывается текст сообщения, \n - перенос строки
$message = post2Msg($_POST);

// А эта функция как раз занимается отправкой письма на указанный вами email
$send = mail ($address,$sub,$message,"Content-type:text/plain; charset = utf-8\r\nFrom:$email");

//ini_set('short_open_tag', 'On');
header('Refresh: 3; URL='.$redirectPath);
include('phpsend_view.php');
?>