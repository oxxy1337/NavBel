<?php
$data = file_get_contents("php://input");
$data=json_decode($data);
$admin->email=$data->email;
$admin->password = cryptpwd($data->password,$glob->grab("admins","salt","email",$data->email));

if ($admin->chngPassword()) {
	$d["reponse"] = 1;

}else{
	$d["reponse"] =0;
}
echo json_encode($d);

?>