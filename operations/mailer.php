<?php
/* 
coded by m.slamat
*/
// Import PHPMailer 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if($mailer =="reset") {

$rand = rand(10000,99999);
$subject = "Account details for $name at Nav Bell";
$html = "$name,<br>

Thank you for registering at Nav Bell.<br>
You may now log in by copying and pasting this code : <font color='red'>$rand</font><br>
<br> From $ip <br>
<small> Nav Bell Devlopers Team <br> contact@team7.dz</small> ";
} elseif ($mailer =="alert") {
    $email = "m.slamat@esi-sba.dz";
    $subject = "Security Alert ! ";
    $html = "Our Security System detect bad using of Navbell-API from $ip || $useragent || at $date <br><br> this make your server in danger <br> go check your server ! ";
};

//Load Composer's autoloader
require 'phpmailer/vendor/autoload.php';

$mail = new PHPMailer(true);                              // Passing `true` enables exceptions

    //Server settings
    $mail->SMTPDebug = 0;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'mail.team7.talebweb.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'support@team7.talebweb.com';                 // SMTP username
    $mail->Password = '^nR3MbOJTuDy';                           // SMTP password
    $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 465;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('support@team7.talebweb.com', 'Nav Bell');
    $mail->addAddress($email);     // Add a recipient
    $mail->isHTML(true);  // Set email format to HTML
    $mail->Subject = $subject;
    $mail->Body    = $html;
if($mailer=="reset"){
    if($mail->send()){
        $reponse = array("reponse" => $rand);
    }
     else {
        $reponse = array("reponse" => 0); 
    }
    echo json_encode($reponse);
}
   
