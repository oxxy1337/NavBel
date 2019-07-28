<?php
$data = file_get_contents("php://input");
$data = json_decode($data);

$glob->id = $data->userid;
$glob->image = upimg($data->postimg);
$glob->bio=$data->description;

if ($glob->sndPosts() !== false) {
	$d["reponse"] = 1;
}else{
	$d["reponse"] = 0;
}
echo json_encode($d);
?>