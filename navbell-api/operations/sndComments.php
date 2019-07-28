<?php
$data=file_get_contents("php://input");
$data = json_decode($data);

$glob->userid = $data->userid;
$glob->bio = $data->content;
$glob->id = $data->postid;
if ($glob->sndComment() !== flase) {
	$d["reponse"] = 1;
}else{
	$d["reponse"] = 0;
}
echo json_encode($d);
?>