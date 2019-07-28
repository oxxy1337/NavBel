<?php
/*
coded by m.slamat
*/
// checking for who have the right to signin in navbell 


// is already subscribed ? then i return 2  
$id = $glob->grab('allstudents','id','email',$email);
if($glob->check('users','email',$email) !== false) die(json_encode(array("reponse"=>"2")));
// is not from ESI students ? then i return 3
if($glob->check('allstudents','id',$id) == false) die(json_encode(array("reponse"=>"3")));
// Finally !!! now he can enter the game :) (return reponse 1 with his data first name , last name , year ) 
if($glob->check('allstudents','id',$id)) {
	$year =  $glob->grab('allstudents','year','id',$id);
	$fname = $glob->grab('allstudents','fname','id',$id);
	$lname = $glob->grab('allstudents','lname','id',$id);
	$data = array("reponse"=>"1","fname"=>$fname,"lname"=>$lname,"year"=>$year);
	$data = json_encode($data);
	echo $data;

}







?>