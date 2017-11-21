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


function telegramSend($msg) {
	$telegram_bot_token = '123456789:AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA';
	$telegram_chat_id = -123456789;
	
	$query = array(
		'chat_id' => $telegram_chat_id,//id чата
		'parse_mode' => 'Markdown',
		//'parse_mode' => 'HTML',
		'text' => $msg
	);
	
	file_get_contents(sprintf(
		'https://api.telegram.org/bot%s/sendMessage?%s', 
		$telegram_bot_token, http_build_query($query)
	));
	
}


$address = "konst.site@gmail.com"; // Сюда впишите свою эл. почту
$sub = $_POST['form_name'] . ' <'.$_SERVER['HTTP_REFERER'].'>'; // Тема письма
$email = 'Заказ <no-reply@nodomain.no>'; // От кого

// А здесь прописывается текст сообщения, \n - перенос строки
$message = post2Msg($_POST);

// Отправка в Telegram
telegramSend($message);
// А эта функция как раз занимается отправкой письма на указанный вами email
$send = mail ($address,$sub,$message,"Content-type:text/plain; charset = utf-8\r\nFrom:$email");

//ini_set('short_open_tag', 'On');
header('Refresh: 3; URL='.$redirectPath);
include('phpsend_view.php');
?>