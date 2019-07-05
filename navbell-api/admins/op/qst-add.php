<?php
$data = file_get_contents("php://input");
$data = json_decode($data);

$admin->id=$data->id;
$admin->question=$data->question;
$admin->time=$data->time;
$admin->point=$data->point;
$ok=$admin->addQuestion() ;
if($ok!== 0){
	$data = array("id"=>$ok,"reponse"=>1);
}else{
	$data = array("reponse"=>0);
}

echo json_encode($data);
?>