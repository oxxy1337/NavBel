<?php
$admin->email = $data->email;
$salt = $glob->grab('admins','salt','email',$data->email); 
$admin->password = cryptpwd($data->password,$salt);
$rezult = $admin->Login();
if($rezult != null) {
	$rezult["reponse"] = 1;
	
 }else{
 	$rezult["reponse"] = 0;
	
 }
 echo json_encode($rezult);

?>