<?php
/*
coded by m.slamat
*/

include('../functions/functions.php'); // including our function 
include('../classes/global.php'); // including global class
include('../classes/conn.php'); // conection to db 
$data = file_get_contents('php://input'); // import data as json
$data = json_decode($data); // decoding ...
$database = new Database();  // creating Database object for connection 
$db = $database->getConnection();  //checking the connection
$glob = new Globals($db); // creating object 

// propreites & parametre  initialisation 

$glob->fname = $data->fname;
$glob->lname = $data->lname;
$glob->email = $data->email;
$glob->password = $data->password;
$glob->salt = md5(microtime()); // random salt 
$glob->date = $data->date;
$glob->nbsolved = $data->nbsolved;
$glob->point = $data->point;
$glob->currentrank = $data->currentrank;
$glob->solvedperday = $data->solvedperday;
$glob->ranks = $data->ranks;
$glob->year = $data->year;

// crypting user password 
$glob->password = cryptpwd($password,$salt);
// storing user picture data in our server (return url) 
$glob->picture = upimg($data->picture);

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