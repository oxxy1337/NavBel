<?php
/*
coded by m.slamat
*/
$glob->id=$id;
$mouh=$glob->userdata()[0];
if (!empty($mouh)){
	
	unset($mouh["salt"]); // kill this data 
	unset($mouh["password"]); //  kill this data 
	$mouh["reponse"]=1;
	echo  json_encode($mouh);


}else {
	$mouh["reponse"]=-1;
	die(json_encode($mouh));	
};
?>