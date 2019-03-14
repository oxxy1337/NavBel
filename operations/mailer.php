<?php
/* 
coded by m.slamat
*/
// Import PHPMailer 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if($mailer =="reset") {

    $rand = rand(10000,99999);
    $subject = "Account details for $fame at Nav Bell";
    $rep=array("reponse"=>1,"code" => $rand);
    $html = "$fname,
    <div class='email-background' style='background: #eee;padding: 10px;'>

        <div class='pre-header' style='background: #eee;color: #eee;font-size: 5px;'>
            Almost done! You've one last step to confirm your account. 
        </div>

        <div class='email-container' style='max-width: 500px;background: white;font-family: sans-serif;margin: 0 auto;overflow: hidden;border-radius: 5px;text-align: center;'>


            <img src='logo.jpg' style='max-width: 100%;'>
            <h1> Hello there! </h1> 
            <p style='margin: 20px;font-size: 18px;font-weight: 300;color: #666;line-height: 1.5;'> Thank you for registering at NavBel. <br>
                You may now log in by copying and pasting the code bellow:
             </p>

            <div class='cta' style='text-decoration: none;display: inline-block;background: #3087F5;color: white;padding: 10px 20px;border-radius: 5px;margin: 20px;'>
                $rand
            </div>  
        </div>  
        <div class='footer-junk' style='max-width: 500px;background: none;font-family: sans-serif;margin: 0 auto;overflow: hidden;border-radius: 5px;text-align: center;padding: 20px;font-size: 12px;'>
            contact@team7.dz | <a href='' style='color: #3087F5;text-decoration: none;'>Unsubscribe</a>
        </div>
    </div>  
";
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

   
