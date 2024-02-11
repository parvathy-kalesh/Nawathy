<?php
include("../Connection/Connection.php");

//=======================================================================================

session_start();
ob_start();

/*$name=$_SESSION['name'];*/
$mailid='geenapgeorge2001@gmail.com';
echo $mailid;
$name="";

//$mailid="anu99918@gmail.com";
//$pass="aannuu";


/*$uname=$_REQUEST['name'];
$pass=$_REQUEST['passwd'];
$name=$_REQUEST['name'];
$email=$_REQUEST['email'];

*/
	
require("class.phpmailer.php");

$mail = new PHPMailer();

$mail->IsSMTP(); // set mailer to use SMTP
$mail->SMTPAuth = true;     // turn on SMTP authentication
$mail->SMTPSecure = "tls";
$mail->Host = "smtp.gmail.com";  // specify main and backup server
$mail->Port = 587;
$mail->Username = 'inferno.malayalam@gmail.com';  // SMTP username
$mail->Password = 'Mymother@2000'; // SMTP password

$mail->From = "inferno.malayalam@gmail.com";
$mail->FromName = "ADMIN";
$mail->AddAddress($mailid);


$mail->WordWrap = 50;// set word wrap to 50 characters
$mail->IsHTML(true);// set email format to HTML

$mail->Subject = "";
$mail->Body    = "Hello how are you";
$mail->AltBody = "This is the body in plain text for non-HTML mail clients";
//echo $mail;
//if(!$mail->Send())
//{
//   echo "Message could not be sent. <p>";
//   echo "Mailer Error: " . $mail->ErrorInfo;
//   exit;
//}
//else
if(!$mail->Send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
 } else {
    echo "Message has been sent";
 }

//================================================================================	

	?>