<?php
$data = file_get_contents("php://input");
$data=json_decode($data);

if ($glob->check('admins','email',$data->email)) {
	$d["response"] = 0;
}else{
	$admin->email = $data->email;
	$admin->salt = "$".substr(base64_encode(md5(microtime())), 30)."$"; // random salt ;
	$admin->image=upimg($data->image); // get url of img
	$admin->password = cryptpwd($password,$admin->salt);
	$admin->isAdmin = $data->isAdmin;
	$admin->fname= $data->fname;
	$admin->date=$data->date;
	$admin->module=$data->module;
	$d["reponse"] = 1 ;
	$admin->addEmployer();
}

echo json_encode($d);
?>