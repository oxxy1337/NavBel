<?php

// propreites & parametres  initialisation 

$glob->fname = filter($data->fname);
$glob->lname = filter($data->lname);
$glob->email = filter($data->email);
$glob->password = filter($data->password);
$glob->salt = md5(microtime()); // random salt 
$glob->date = $date;
$glob->nbsolved = filter($data->nbsolved);
$glob->point = filter($data->point);
$glob->currentrank = filter($data->currentrank);
$glob->solvedperday = filter($data->solvedperday);
$glob->ranks = filter($data->ranks);
$glob->year = filter($data->year);

// crypting user password 
$glob->password = cryptpwd($password,$salt);
// storing user picture data in our server (return url) 
$glob->picture = upimg(filter($data->picture));

// save all user profile infos in db 
if($glob->signin()) {
	$data = array("fname"=>$glob->fname,"lname"=>$glob->lname,"email"=>$glob->email,"picture"=>$glob->picture);//,"picture"=>$glob->picture); 
	$data = json_encode($data);
	echo $data;
} else{
	$data=array("reponse"=>"0");
	$data=json_encode($data);
	echo $data;
}


?>