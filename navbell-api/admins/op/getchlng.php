<?php
$result = $admin->getChallenges();


if ($result != null) {
	$result["reponse"] =  1 ; 
}else{
	$result["reponse"] =  0 ; 
}
echo json_encode($result);
?>