<?php
/* 
coded by m.slamat
*/
// Import PHPMailer 


if($mailer =="reset") {

    $rand = rand(10000,99999);
    $subject = "Account details for $fame at Nav Bell";
    $rep=array("reponse"=>1,"code" => $rand);
    $fname2=$glob->grab('allstudents','fname','email',$email);
    $html = "Hi $fname2,
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
              <a href='' style='color: #3087F5;text-decoration: none;'>Unsubscribe</a>
        </div>
    </div>  
";
} elseif ($mailer =="alert") {
    
    $email = SYSADMIN;
    $subject = "Security Alert ! ";
    $html = "Our Security System detect bad using of Navbell-API from $ip || $useragent || at $date <br><br> this make your server in danger <br> go check your server ! ";
}elseif ($mailer=="signin") {
    
    $subject = "[Navbell] Welcome at Navbell ";
    $html = "Check attached file";
    $attached = true;
}elseif($mailer == "sendreward"){
$email = $useremail;
$subject = "[NavBel] Congratulation you get new reward ";
$html = $rewardhtml;

}


;

//Load Composer's autoloader
                              // TCP port to connect to

    //Recipients
    $mail->setFrom('navbel@esi-sba.dz', 'Nav Bell');
    $mail->addAddress($email);     // Add a recipient
    $mail->isHTML(true);  // Set email format to HTML
    $mail->Subject = $subject;
    $mail->Body    = $html;
    //if($attached) $mail->addAttachment('./Navbell.pdf', 'Navbell.pdf'); 
    $mail->send();
    if ($mailer == "reset") echo json_encode($rep);

   
