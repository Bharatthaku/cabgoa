<?php
include('smtp/PHPMailerAutoload.php');
$name = $_POST['name'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];


// preparing mail content

$html = "Name : ". $name . "<br>E-Mail : " . $email . "<br>Subject : " . $subject. "<br>Message : " . $message;

//$html='Hii  Have a Good Day';
echo smtp_mailer('ashu987300@gmail.com','subject',$html);
function smtp_mailer($to,$subject, $msg){
	$mail = new PHPMailer(); 
	// $mail->SMTPDebug  = 3;
	$mail->IsSMTP(); 
	$mail->SMTPAuth = true; 
	$mail->SMTPSecure = 'tls'; 
	$mail->Host = "smtp.gmail.com";
	$mail->Port = 587; 
	$mail->IsHTML(true);
	$mail->CharSet = 'UTF-8';
	$mail->Username = "ashu987300@gmail.com";
	$mail->Password = "simran@9873";
	$mail->SetFrom("ashu987300@gmail.com");
	$mail->Subject = 'New Message Arrived';
	$mail->Body =$msg;
	$mail->AddAddress($to);
	$mail->SMTPOptions=array('ssl'=>array(
		'verify_peer'=>false,
		'verify_peer_name'=>false,
		'allow_self_signed'=>false
	));
	if(!$mail->Send()){
		echo $mail->ErrorInfo;
	}else{
		echo "OK";
		
	}
}
?>