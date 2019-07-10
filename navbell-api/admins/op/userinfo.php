<?php

$ok = $glob->check("users","email",$data->email);

if($ok !== false) {
	$admin->email = $data->email ;
	$d["isSub"] = 1 ;
	$d["data"] = $admin->userInfo();
	$d["data"]["password"] = "";

	

} 
	else $d["isSub"] = 0;
echo json_encode($d);

?>