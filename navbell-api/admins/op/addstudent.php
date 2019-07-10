<?php
$data = file_get_contents("php://input");
$data=json_decode($data);
$admin->email=$data->email;
$admin->year=$data->year;
$admin->fname=$data->fname;
$admin->lname=$data->lname;

if ($admin->addUser()!==0) {
	$d["reponse"] = 1;
}else{
	$d["reponse"] = 0;
}

echo json_encode($d);
?>