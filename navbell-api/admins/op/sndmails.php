<?php
$data = file_get_contents("php://input");
$data = json_decode($data);


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