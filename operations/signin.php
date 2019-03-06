<?php

// propreites & parametres  initialisation 

$glob->fname = filter($data->fname);
$glob->lname = filter($data->lname);
$glob->email = filter($data->email);
$glob->salt = md5(microtime()); // random salt 
$glob->date = $date;
$glob->year = filter($data->year);

// crypting user password 
$glob->password = cryptpwd(filter($data->password),$glob->salt);
// storing user picture data in our server (return url) 
$glob->picture = upimg(filter($data->picture));

// save all user profile infos in db 
if($glob->signin()) {
	$data = array("reponse"=>"1","fname"=>$glob->fname,"lname"=>$glob->lname,"email"=>$glob->email,"picture"=>$glob->picture,"date"=>$glob->date),"id"=>$glob->grab('user','id','email',$glob->email);
	$data = json_encode($data);
	echo $data;
} else{
	$data=array("reponse"=>"0");
	$data=json_encode($data);
	echo $data;
}


?>