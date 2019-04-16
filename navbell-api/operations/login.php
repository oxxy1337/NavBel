<?php
/*
coded by m.slamat
*/

/// crypt password to compare which is existe in db
$salt = $glob->grab('users','salt','email',$email); // getting salt from db for using as key 

$password= cryptpwd($password,$salt);
/// getting auth infos from database
$email_from_db = $glob->grab('users','email','email',$email);
$password_from_db = $glob->grab('users','password','email',$email);
/////

/// now it's time compare data from database with data of inputs :) 

if(($email == $email_from_db) && ($password == $password_from_db)){
	/// variables initialisisation
	
	$id = 	 $glob->grab('users','id','email',$email);
	$fname = $glob->grab('users','fname','email',$email);
	$lname = $glob->grab('users','lname','email',$email);
	$year =  $glob->grab('users','year','email',$email);
	$point = $glob->grab('users','point','email',$email);
	$ranks=  $glob->grab('users','ranks','email',$email);
	$picture = $glob->grab('users','picture','email',$email);
	$date = $glob->grab('users','date','email',$email);
	$nbsolved = $glob->grab('users','nbsolved','email',$email);
	$currentrank = $glob->grab('users','currentrank','email',$email);
	$solvedperday = $glob->grab('users','solvedperday','email',$email);

	$data = array("reponse"=>"1","id"=>$id,"fname"=>$fname,"lname"=>$lname,"year"=>$year,"point"=>$point,"ranks"=>$ranks,"picture"=>$picture,"date"=>$date,"nbsolved"=>$nbsolved,"currentrank"=>$currentrank);
	$data = json_encode($data);
	echo $data ;
}else{

	$data=array("reponse"=>"-1");
	$data=json_encode($data);
	echo $data;
}

?>