<?php
/*
coded by m.slamat
*/
// checking for who have the right to signin in navbell 


$email = $data->email;
// is banned by his ip  (hack attemps) then i return reponse 0 to my client ? 
//if($glob->check('user-banned-ever','ip',$ip)) die(json_encode((array("reponse"=>"0"))));  TODO IF NOT 1 
// is already subscribed ? then i return 2  
if($glob->check('users','email',$email) !== false) die(json_encode(array("reponse"=>"2")));
// is not from ESI students ? then i return 3
if($glob->check('allstudents','email',$email) == false) die(json_encode(array("reponse"=>"3")));
// Finally !!! now he can enter the game :) (return reponse 1 with his data first name , last name , year ) 
if($glob->check('allstudents','email',$email)) {
	$year =  $glob->grab('allstudents','year','email',$email);
	$fname = $glob->grab('allstudents','fname','email',$email);
	$lname = $glob->grab('allstudents','lname','email',$email);
	$data = array("reponse"=>"1","fname"=>$fname,"lname"=>$lname,"year"=>$year);
	$data = json_encode($data);
	echo $data;

}







?>