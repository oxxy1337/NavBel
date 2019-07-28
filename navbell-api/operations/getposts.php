<?php

$data = array();
$posts = $glob->getPosts();
$output = array();
if ($posts !== Null) {
	foreach($posts as $post) {

		
		$post["useryear"]=$glob->grab("users","year","id",$post["userid"]);
		$post["userpicture"]=$glob->grab("users","picture","id",$post["userid"]);
		$post["username"]=$glob->grab("users","fname","id",$post["userid"]). 
								" ".$glob->grab("users","lname","id",$post["userid"]);
		
		array_push($output,$post);
		
	}
	$data["reponse"] = 1;
	$data["data"] = $output;
}else{
	$data["reponse"] = 0;
}
echo json_encode($data);
?>