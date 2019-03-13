<?php
/* 
coded by m.slamat
*/
// Import PHPMailer 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if($mailer =="reset") {
$fname=$glob->grab('users','fname','email',$email);
$rand = rand(10000,99999);
$reponse = array("reponse" => $rand);
$subject = "Account details for $fname at Nav Bell";
$html = "$fname,<br>

Thank you for registering at Nav Bell.<br>
You may now log in by copying and pasting this code : <font color='red'>$rand</font><br>
<br> From $ip <br>
<small> Nav Bell Devlopers Team <br> contact@team7.dz</small> ";
} elseif ($mailer =="alert") {
    $email = "m.slamat@esi-sba.dz";
    $subject = "Security Alert ! ";
    $reponse = array("reponse" => "!");
    $html = "Our Security System detect bad using of Navbell-API from $ip || $useragent || at $date <br><br> this make your server in danger <br> go check your server ! ";
} elseif ($mailer=="signin") {
    $fname=$glob->grab('users','fname','email',$email);
    $subject = "[Navbell] Welcome To Navbell !";
    $attached =true;
    $html = "Hi $fname

Thank you for registering with Navbell .<br> Please find attached ";
    

//Load Composer's autoloader
require 'phpmailer/vendor/autoload.php';

$mail = new PHPMailer(true);                              // Passing `true` enables exceptions

    //Server settings
   /* $mail->SMTPDebug = 0;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'mail.team7.talebweb.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'support@team7.talebweb.com';                 // SMTP username
    $mail->Password = '^nR3MbOJTuDy';                           // SMTP password
    $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 465;                                    // TCP port to connect to
*/
    //Recipients
    $mail->setFrom('support@team7.talebweb.com', 'Nav Bell');
    $mail->addAddress($email);     // Add a recipient
    $mail->isHTML(true);  // Set email format to HTML
    $mail->Subject = $subject;
    $mail->Body    = $html;
    if($attached ) $mail->addAttachment('./Navbell.pdf', 'Navbell.pdf'); 
};

    if($mail->send()){
       echo $reponse;
    }
     else {
        $reponse = array("reponse" => 0); 
    };
    echo json_encode($reponse);

   
