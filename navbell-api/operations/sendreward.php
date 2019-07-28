<?php
$data = file_get_contents("php://input");
$data = json_decode($data);

$glob->id = $data->id;
$glob->rewardid= $data->rewardid;

$useremail = $glob->grab("users","email","id",$data->id);

$userpoint = $glob->grab("users","point","id",$data->id);
$rewardpoint = $glob->grab("rewards","point","id",$data->rewardid);
$rewardhtml = decryptdata($glob->grab("rewards","html","id",$data->rewardid),"flym1nd");

$newpts = ($userpoint - $rewardpoint);
$glob->point = $newpts;
if ($glob->chngPoint()) {
	$glob->takenBy();
	$mailer = "sendreward";
	include('./operations/mailer.php');
	$arr["reponse"] = 1;
}else{
	$arr["reponse"] = 0;
}

echo json_encode($arr);

?>