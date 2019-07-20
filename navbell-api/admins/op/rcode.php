<?php
$data = file_get_contents("php://input");
$data = json_decode($data);

if ($glob->check("admins","email",$data->email) !==false) {
	$rand = substr(base64_encode(md5(microtime().uniqid())),0,15);
	$subject = "Account details for at Nav Bell";
	$html = " <div class='email-background' style='background: #eee;padding: 10px;'>

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
    </div>  ";
	$mail->setFrom('navbel@esi-sba.dz', 'Nav Bell');
    $mail->addAddress($data->email);     // Add a recipient
    $mail->isHTML(true);  // Set email format to HTML
    $mail->Subject = $subject;
    $mail->Body    = $html;
    $mail->send();
    $d["reponse"] = 1;
    $d["code"] = $rand;
}else{
	$d["reponse"] = -1;
}
echo json_encode($d);
?>