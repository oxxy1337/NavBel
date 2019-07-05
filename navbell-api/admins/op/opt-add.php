<?php
$data = file_get_contents("php://input");
$data = json_decode($data);

$admin->id=$data->questionid;
$admin->trueoption=$data->trueoption;
$admin->true=$data->true;
$ok =$admin->addOption();
if ($ok !== 0) {
	$d = array("reponse"=>1,"TrueOptionId"=>$ok);
}else{
	$d["reponse"]=0;
}

echo json_encode($d);
?>