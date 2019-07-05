<?php
$data = file_get_contents("php://input");
$data= json_decode($data);
 /// we call image composer (bs64 to img) from global api :D
$admin->point=$data->point;
$admin->module=$data->module;
$admin->nbOfQuestions=$data->nbOfQuestions;
$admin->createdby=$data->createdby;
$admin->year=$data->year;
$admin->image=upimg($data->image);
$admin->isAproved = $data->isAproved;
$admin->story=$data->story;
$admin->resource=json_encode($data->resource);
$admin->date=$data->date;
$ok=$admin->addChallenge();
if($ok !== 0){
	$data = array("id"=>$ok,"reponse"=>1);
}else{
	$data = array("reponse"=>0);
}

echo json_encode($data);


?>