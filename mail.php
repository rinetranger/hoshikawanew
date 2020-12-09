<?php
mb_internal_encoding('UTF-8');
require 'vendor/autoload.php';

//PHPMailer Object
$mail = new PHPMailer\PHPMailer\PHPMailer();


//Enable SMTP debugging. 
// $mail->SMTPDebug = 2;   
//Set PHPMailer to use SMTP.
$mail->isSMTP();            
//Set SMTP host name                          
$mail->Host = "rinkishi.sakura.ne.jp";
//Set this to true if SMTP host requires authentication to send email
$mail->SMTPAuth = true;                          
//Provide username and password     
$mail->Username = "hosikawa@rinkishi.sakura.ne.jp";                 
$mail->Password = "admin1234";                           
//If SMTP requires TLS encryption then set it
$mail->SMTPSecure = "tls";                           
//Set TCP port to connect to 
$mail->Port = 587;                           

//From email address and name
$mail->From = "hosikawa@rinkishi.sakura.ne.jp";
$mail->FromName = "hosikawa";

//To address and name
$mail->addAddress("hosiken@coral.ocn.ne.jp", "星川建設");


//Send HTML or Plain Text email
$mail->isHTML(true);

$mail->Subject = "from hosikawa";
$mail->CharSet = 'UTF-8';
$mail->Body = "<i><p>inquiry from {$_POST['name-2']}</p> <p>phone number:{$_POST['Phone']}</p> <p>email: {$_POST['email-2']}</p><pre>{$_POST['field-2']}<pre></i>";

// $mail->AltBody = "This is the plain text version of the email content";

$mail->AuthType = 'LOGIN';


if(!$mail->send()) 
{
    echo("Mailer Error: " . $mail->ErrorInfo);
} 
else 
{
    echo("<span>メールを送信しました</span>");
    echo('<a href="/">戻る</a>');
    echo(date("Y/m/d H:i:s"));
}

?>
