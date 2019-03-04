<?php
// Import PHPMailer 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$email = $data->email;
$rand = substr(sha1(time()), 0, 5);

$html = "$name,<br>

Thank you for registering at Nav Bell.<br>
You may now log in by copying and pasting this code : <font color='red'>$rand</font><br>

<small> Nav Bell Devlopers Team <br> contact@team7.dz</small>";
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
    $mail->Subject = "Account details for $name at Nav Bell";
    $mail->Body    = $html;

    if($mail->send()){
        $reponse = array("reponse" => $rand);
    }
     else {
        $reponse = array("reponse" => 0); 
    }
    echo json_encode($reponse);
   
