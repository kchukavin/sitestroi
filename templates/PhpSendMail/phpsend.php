<?php

function post2Msg($post) {
	
	$translate = array(
		'name'		=> 'Имя',
		'phone'		=> 'Телефон',
		'email'		=> 'Email',
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
$sub = $_POST['form_name'] . ' <transport-akbars.ru>'; // Тема письма
$email = 'Заказ <no-reply@nodomain.no>'; // От кого

// А здесь прописывается текст сообщения, \n - перенос строки
$message = post2Msg($_POST);

// А эта функция как раз занимается отправкой письма на указанный вами email
$send = mail ($address,$sub,$message,"Content-type:text/plain; charset = utf-8\r\nFrom:$email");

ini_set('short_open_tag', 'On');
header('Refresh: 3; URL=index.html');

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta http-equiv="refresh" content="3; url=index.html">

<title>С вами свяжутся</title>

<style type="text/css">
body {
   background: #22BFF7;
   color: white;
}
</style>

<script type="text/javascript">
setTimeout('location.replace("/index.html")', 3000);
/*Изменить текущий адрес страницы через 3 секунды (3000 миллисекунд)*/
</script> 
</head>

<body>
	<h1>Спасибо! С вами свяжутся!</h1>
	
	<p>Ваше сообщение:</p>
	<pre>
		<?php echo $message; ?>
	</pre>
</body>
</html>