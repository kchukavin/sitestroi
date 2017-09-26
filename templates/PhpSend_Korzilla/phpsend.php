<?php

$address = "konst.site@gmail.com"; // Сюда впишите свою эл. почту
$sub = 'Сообщение с сайта <'.$_SERVER['HTTP_REFERER'].'>'; // Тема письма
$email = 'Заказ <no-reply@nodomain.no>'; // От кого

$msgArray = json_decode(file_get_contents("php://input"), true);

$msg = '';

foreach ($msgArray['fields'] as $field) {
	$msg .= $field['name'] . ": " . $field['value'] . "\n";
}

//file_put_contents('email.log', "\n" . time() . "\n" . $msg, FILE_APPEND);


$message = "Сообщение с сайта\n" . $msgArray['form']['name'] . "\n" . $msg;

// А эта функция как раз занимается отправкой письма на указанный вами email
$send = mail ($address,$sub,$message,"Content-type:text/plain; charset = utf-8\r\nFrom:$email");







$res = array(
	'result'	=> 1,
	'time'		=> time(),
	//'msg'		=> $msgArray['form']['msg'],
	'msg'		=> 'ok',
);


/*
{"result":1,"time":1491372569,"msg":"\u0421\u043f\u0430\u0441\u0438\u0431\u043e! \u0412\u0430\u0448\u0430 \u0437\u0430\u044f\u0432\u043a\u0430 \u043e\u0442\u043f\u0440\u0430\u0432\u043b\u0435\u043d\u0430. \u0412 \u0431\u043b\u0438\u0436\u0430\u0439\u0448\u0435\u0435 \u0432\u0440\u0435\u043c\u044f \u043c\u044b \u0441 \u0412\u0430\u043c\u0438 \u0441\u0432\u044f\u0436\u0435\u043c\u0441\u044f!"};
*/
echo json_encode($res);


header("Content-type: application/javascript");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, GET");
?>