<?php
$data = file_get_contents("php://input");
$data = json_decode($data);
// Import PHPMailer 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$subject = $data->subject;
$emailfrom = $data->email;
$emailname = $data->name;
$html = $data->html;
switch ($data->to) {
	case '1':
		$maillist = $admin->getUsersEmail();
		
		break;
	case '2':
		$maillist = $admin->getAdmEmail();
		break;

}

require 'phpmailer/vendor/autoload.php';

$mail = new PHPMailer(true);                              // Passing `true` enables exceptions

    //Server settings
    $mail->SMTPDebug = 0;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'mail.cjairport-gy.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'info@cjairport-gy.com';                 // SMTP username
    $mail->Password = '0dayismine';                           // SMTP password
    $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 465;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom($emailfrom, $emailname);
	foreach ($maillist as $email) {
			$i+=1;
        	$mail->addAddress($email['email']); 
        	// Add a recipients
        } 
    $mail->isHTML(true);  // Set email format to HTML
    $mail->Subject = $subject;
    $mail->Body    = $html;
   
    if ($mail->send()) {
    	$d["n"]= $i;
    	$d["reponse"]=1;
    }else{
    	$d["reponse"]=0;
    }
    echo json_encode($d);
?>