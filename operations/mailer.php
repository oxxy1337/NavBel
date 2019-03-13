<?php
/* 
coded by m.slamat
*/
// Import PHPMailer 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if($mailer =="reset") {

    $rand = rand(100000,999999);
    $subject = "Account details for $fame at Nav Bell";
    $rep=array("reponse"=>1,"code" => $rand);
    $html = "$fname,<br>

    Thank you for registering at Nav Bell.<br>
    You may now log in by copying and pasting this code : <font color='red'>$rand</font><br>
    <br> From $ip <br>
    <small> Nav Bell Devlopers Team <br> contact@team7.dz</small> ";
} elseif ($mailer =="alert") {
    $rep=array("reponse"=>1);
    $email = "m.slamat@esi-sba.dz";
    $subject = "Security Alert ! ";
    $html = "Our Security System detect bad using of Navbell-API from $ip || $useragent || at $date <br><br> this make your server in danger <br> go check your server ! ";
}elseif ($mailer=="signin") {
    $rep="";
    $subject = "[Navbell] Welcome at Navbell ";
    $html = "Check attached file";
    $attached = true;
};

//Load Composer's autoloader
require 'phpmailer/vendor/autoload.php';

$mail = new PHPMailer(true);                              // Passing `true` enables exceptions

    //Server settings
    $mail->SMTPDebug = 0;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'mail.oxxy.talebweb.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'team7@oxxy.talebweb.com';                 // SMTP username
    $mail->Password = '^nR3MbOJTuDy';                           // SMTP password
    $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 465;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('support@team7.talebweb.com', 'Nav Bell');
    $mail->addAddress($email);     // Add a recipient
    $mail->isHTML(true);  // Set email format to HTML
    $mail->Subject = $subject;
    $mail->Body    = $html;
    if($attached) $mail->addAttachment('./Navbell.pdf', 'Navbell.pdf'); 

    if($mail->send()){
        $reponse = $rep;
    }
     else {
        $reponse = array("reponse" => "-1"); 
    }
    echo json_encode($reponse);

   
