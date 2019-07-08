<?php 



$admin->email = $data->email;

if($admin->killUser() !== 0 )
	$d["reponse"] = 1;
	else
		$d["reponse"] = 0;

echo json_encode($d);
?>