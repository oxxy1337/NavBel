<?php

$data = file_get_contents("php://input");
$data = json_decode($data);

$admin->id=$data->id;
$admin->opt=$data->opt;


if($admin->addSolution() !== 0){
	$data = array("reponse"=>1);
}else{
	$data = array("reponse"=>0);
}

echo json_encode($data);
?>