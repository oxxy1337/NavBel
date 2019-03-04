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
echo $password_from_input;
/// getting auth infos from database
$email_from_db = $glob->grab('users','email','email',$email_from_input);
$password_from_db = $glob->grab('users','password','email',$email_from_input);
/////

/// now it's time compare data from database with data of inputs :) 

if(($email_from_input == $email_from_db) && ($password_from_input == $password_from_db)){
	/// variables initialisisation
	echo"yes";
}else{
	echo"no";
}

?>