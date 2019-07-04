<?php
$data = file_get_contents("php://input");
$data= json_decode($data);
 /// we call image composer (bs64 to img) from global api :D
echo $admin->point=$data->point;
echo $admin->module=$data->module;
echo $admin->nbOfQuestions=$data->nbOfQuestions;
echo $admin->createdby=$data->createdby;
echo $admin->year=$data->year;
echo $admin->image=upimg($data->image);
echo $admin->isAproved = $data->isAproved;
echo $admin->story=$data->story;
echo $admin->resource=json_encode($data->resource);
echo $admin->date=$data->date;
if($admin->addChallenge() !== 0){
	$data = array("id"=>$admin->addChallenge(),"reponse"=>1);
}else{
	$data = array("reponse"=>0);
}

echo json_encode($data);


?>