<?php
/*
coded by m.slamat
*/
/// getting auth infos from  my clients 
$email_from_input = filter($data->email);
$password_from_input = filter($data->password);
/// crypt password to compare which is existe in db
$salt = $glob->grab('users','salt','email',$email_from_input); // getting salt from db for using as key 

$password_from_input= cryptpwd($password_from_input,$salt);
/// getting auth infos from database
$email_from_db = $glob->grab('users','email','email',$email_from_input);
$password_from_db = $glob->grab('users','password','email',$email_from_input);
/////

/// now it's time compare data from database with data of inputs :) 

if(($email_from_input == $email_from_db) && ($password_from_input == $password_from_db)){
	/// variables initialisisation
	
	$id = 	 $glob->grab('users','id','email',$email_from_input);
	$fname = $glob->grab('users','fname','email',$email_from_input);
	$lname = $glob->grab('users','lname','email',$email_from_input);
	$year =  $glob->grab('users','year','email',$email_from_input);
	$point = $glob->grab('users','point','email',$email_from_input);
	$ranks=  $glob->grab('users','ranks','email',$email_from_input);
	$picture = $glob->grab('users','picture','email',$email_from_input);
	$date = $glob->grab('users','date','email',$email_from_input);
	$nbsolved = $glob->grab('users','nbsolved','email',$email_from_input);
	$currentrank = $glob->grab('users','currentrank','email',$email_from_input);
	$solvedperday = $glob->grab('users','solvedperday','email',$email_from_input);

	$data = array("reponse"=>"1","id"=>$id,"fname"=>$fname,"lname"=>$lname,"year"=>$year,"point"=>$point,"ranks"=>$ranks,"picture"=>$picture,"date"=>$data,"nbsolved"=>$nbsolved,"currentrank"=>$currentrank,
		"solvedperday"=>$solvedperday);
	$data = json_encode($data);
	echo $data ;
}else{

	$data=array("reponse"=>0);
	$data=json_encode($data);
	echo $data;
}

?>