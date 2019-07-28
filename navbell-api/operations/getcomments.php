<?php
$data = file_get_contents("php://input");
$data = json_decode($data);

$glob->id=$data->postid;
$output = array();
$comments = $glob->getComments();
if($comments !== []) {
	foreach($comments as $comment) {

		
		$comment["useryear"]=$glob->grab("users","year","id",$comment["userid"]);
		$comment["userpicture"]=$glob->grab("users","picture","id",$comment["userid"]);
		$comment["username"]=$glob->grab("users","fname","id",$comment["userid"]). 
								" ".$glob->grab("users","lname","id",$comment["userid"]);
		
		array_push($output,$comment);
		
	}
	$d["data"]=$output;
	$d["reponse"] = 1;
}else{
	$d["data"] = [];
	
}

echo json_encode($d);
?>