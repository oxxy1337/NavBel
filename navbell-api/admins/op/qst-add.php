<?php
$data = file_get_contents("php://input");
$data = json_decode($data);

echo $admin->id=$data->id;
echo $admin->question=$data->question;
echo $admin->time=$data->time;
echo $admin->point=$data->point;

if($admin->addQuestion() !== 0){
	$data = array("id"=>$admin->addQuestion(),"reponse"=>1);
}else{
	$data = array("reponse"=>0);
}

echo json_encode($data);
?>