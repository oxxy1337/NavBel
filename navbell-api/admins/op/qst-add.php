<?php
$data = file_get_contents("php://input");
$data = json_decode($data);

$admin->id=$data->id;
$admin->question=$data->question;
$admin->time=$data->time;
$admin->point=$data->point;

if($admin->addQuestion() !== 0){
	$data = array("id"=>$admin->addQuestion(),"reponse"=>1);
}else{
	$data = array("reponse"=>0);
}

echo json_encode($data);
?>