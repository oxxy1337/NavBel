<?php
$data = file_get_contents("php://input");
$data = json_decode($data);
$admin->id =$data->id;
$admin->email = $data->email;
$admin->fname = $data->fname;
$admin->module = $data->module;
$salt = $glob->grab("admins","salt","id",$data->id);
$admin->password = cryptpwd($data->password,$salt);
$admin->image = upimg($data->image);
if ($admin->updateProfile() !== 0) {
	$d["reponse"] = 1 ;
}else{
	$d["reponse"] = 0 ;
}

echo json_encode($d);
?>