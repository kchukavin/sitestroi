<?php
	//require_once dirname(__FILE__).'/mainsms.class.php';
	//session_start();
	
	$phone = stripslashes(strip_tags(trim($_POST['phone'])));
	
	if ($phone == '') {
		header( 'Location: /', true, 307 );
	}
	else {
		
		$name = stripslashes(strip_tags(trim($_POST['name'])));
		$email = $_POST['email'];
		$comment = $_POST['comment'];
		
		
		$to = "89196343600@mail.ru";
		$subject = "Заявка Светлый дом";
		$headers = "From: Светлый дом <89196343600@mail.ru>\r\nContent-type: text/html; charset=utf8 \r\n";
		$clientphone = preg_replace('~[^0-9]~', '', $phone); //убираем символы из телефона
		$ip = $_SERVER['REMOTE_ADDR'];
		
		
			$message = "Поступила заявка Светлый дом <p><b>Имя:</b> ".$name."</p><p><b>Телефон:</b> ".$phone."</p><p>&nbsp;</p>
			<p><b>Комментарий:</b> ".$comment."</p><p>&nbsp;</p><p style='font-size: 10px;'>ip-адрес: ".$ip."</p>";
		
		
		$sender = mail($to, $subject, $message, $headers); //отправляем письмо
		
		if ($sender) {
			echo $name.", спасибо, Ваша заявка принята! Мы свяжемся с Вами в ближайшее время";
		}

	}

?>
