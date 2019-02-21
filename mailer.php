<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
$data=file_get_contents('php://input');
//echo $data;
$data = json_decode($data);
$name = $data->name;
$email= $data->email;

$rand = rand(0,100).uniqid().rand(100,200);

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
    //$mail->addAddress('ellen@example.com');               // Name is optional
    //$mail->addReplyTo('info@example.com', 'Information');
    //$mail->addCC('cc@example.com');
    //$mail->addBCC('bcc@example.com');

    //Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = "Account details for $name at Nav Bell";
    $mail->Body    = $html;
    //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    if($mail->send()){
        $reponse = array("reponse" => $rand);
    }
     else {
        $reponse = array("reponse" => 0); 
    }
    echo json_encode($reponse);
   
