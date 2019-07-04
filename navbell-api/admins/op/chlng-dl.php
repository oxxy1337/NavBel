<?php

$admin->id=$data->id;
if ($admin->chlngDl() !== false) {
	$d["reponse"] = 1 ;
}else{
	$d["reponse"] = 0 ;
}
echo json_encode($d);
?>