<?php

// propreites & parametres  initialisation 

$glob->fname = $fname;
$glob->lname = $lname;
$glob->email = $email;
$glob->salt = "$".substr(base64_encode(md5(microtime())), 30)."$"; // random salt 
$glob->date = $date;
$glob->year = $year;
$glob->ispublic=True;
$glob->point=0;
$glob->currentrank=0;
$glob->solvedperday=0;
$glob->ranks=[];
$glob->nbsolved=0;
$glob->bio = "Etudiant".$year." year";

// crypting user password 
$glob->password = cryptpwd($password,$glob->salt);
// storing user picture data in our server (return url) 
$glob->picture = upimg($picture);

// save all user profile infos in db 
if($glob->signin()) {
	$data = array("reponse"=>"1","fname"=>$glob->fname,"lname"=>$glob->lname,"email"=>$glob->email,"picture"=>$glob->picture,"date"=>$glob->date,"id"=>$glob->grab('users','id','email',$glob->email),"year"=>$glob->year,"ispublic"=>$glob->ispublic,
		"bio"=>$glob->bio);
	$data = json_encode($data);
	echo $data;
	include("./operations/mailer.php");
} else{
	$data=array("reponse"=>"-1");
	$data=json_encode($data);
	echo $data;
}


?>