<?php

$admin->id=$data->id;


if ($admin->chlngAp() !== false) {
	$d["reponse"] = 1 ;
	$d["data"] = $admin->getOneChnlng()[0];
}else{
	$d["reponse"] = 0 ;
}
echo json_encode($d);
?>