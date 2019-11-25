<?php

// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';


include('phpsend_config.php');

$redirectPath = $_SERVER['HTTP_REFERER'];

if (!isset($_POST['form_name'])) $_POST['form_name'] = 'Заявка с сайта';

function post2Msg($post) {
	/* POST sample:
	array (
	  'form_name' => 'Получить полный прайс',
	  'Name' => 'test',
	  'Phone' => '9999999',
	  'Email' => 'test@test.test',
	  'form-spec-comments' => '',
	  'tildaspec-cookie' => '_ym_uid=1527145878310231917; _ga=GA1.2.1702309007.1531988709; _ym_d=1548917633; _gid=GA1.2.488988536.1549264871; _ym_isad=1',
	  'tildaspec-referer' => 'http://opt.narod-mebel.ru/',
	  'tildaspec-formid' => 'form82190018',
	  'tildaspec-formskey' => '8edcfaa0349aef4bce8e6b0faa99e91a',
	  'tildaspec-version-lib' => '01.001',
	  'tildaspec-pageid' => '4492563',
	  'tildaspec-projectid' => '1045324',
	)
	*/
	
	unset($post['tildaspec-cookie']);
	unset($post['tildaspec-referer']);
	unset($post['tildaspec-formid']);
	unset($post['tildaspec-formskey']);
	unset($post['tildaspec-version-lib']);
	unset($post['tildaspec-pageid']);
	unset($post['tildaspec-projectid']);
    
    $translate = array(
        'Name'      => 'Имя',
        'Phone'     => 'Телефон',
        'Email'     => 'Email',
        'phone_email'       => 'Тел. или email',
        'message'   => 'Сообщение',
        'date'      => 'Дата',
        'kolichestvo'   => 'Количество людей',
        'from'      => 'Откуда',
        'to'        => 'Куда',
        'direction' => 'Направление',
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
    $telegram_bot_token = $_config['telegram_bot_token'];
    $telegram_chat_id = $_config['telegram_chat_id'];
    
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


$address = $_config['emails'];
$sub = $_POST['form_name'] . ' <'.$_SERVER['SERVER_NAME'].'>'; // Тема письма
$email = 'Заказ <no-reply@nodomain.no>'; // От кого

// А здесь прописывается текст сообщения, \n - перенос строки
$message = post2Msg($_POST);

// Отправка в Telegram
if ($_config['telegram']) {
    telegramSend($message);
}

$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try {
    //Server settings
    //$mail->SMTPDebug = 2;                                 // Enable verbose debug output
    $mail->SMTPDebug = 0;                                 // Enable verbose debug output
    $mail->CharSet = "UTF-8";
    if ($_config['smtp']) {
		$mail->isSMTP();                                      // Set mailer to use SMTP
		$mail->Host = $_config['smtp_host']; //'smtp1.example.com;smtp2.example.com';  // Specify main and backup SMTP servers
		$mail->SMTPAuth = true;                               // Enable SMTP authentication
		$mail->Username = $_config['smtp_username'];          // SMTP username
		$mail->Password = $_config['smtp_password'];          // SMTP password
		$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
		$mail->Port = $_config['smtp_port'];                  // TCP port to connect to
	}

    //Recipients
    $mail->setFrom($_config['smtp_from'], $_config['smtp_from_name']);
	
	foreach ($_config['emails'] as $email) {
		$mail->addAddress($email);               // Name is optional
	}
    //$mail->addAddress('joe@example.net', 'Joe User');     // Add a recipient
    //$mail->addReplyTo($_config['smtp_from'], $_config['smtp_from_name']);
    //$mail->addCC('cc@example.com');
    //$mail->addBCC('bcc@example.com');

    //Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    //Content
    $mail->isHTML(false);                                  // Set email format to HTML
    $mail->Subject = $sub;
    $mail->Body    = $message;
    //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    //echo 'Message has been sent';
	$send = true;
} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
	$send = false;
}

if ($send) {
	$r = json_encode(array(
		"message" => "OK",
		"results" => array($_POST['tildaspec-projectid'] . ':145497492'),
	));
} else {
	$r = json_encode(array(
		"error" => "Ошибка отправки сообщения",
		"results" => array($_POST['tildaspec-projectid'] . ':145497492'),
	));
}

echo $r;
?>