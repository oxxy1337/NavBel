<?php
/*
coded by m.slamat
*/
include('./functions/functions.php'); // including our function 
include('./classes/global.php'); // including global class
include('./classes/conn.php'); // conection to db 
$data = file_get_contents('php://input'); // import data as json
$data = json_decode($data); // decoding ...
$database = new Database();  // creating Database object for connection 
$db = $database->getConnection();  //checking the connection
$glob = new Globals($db); // creating object 
// variables initialisation
$date = date('Y/m/d H:i:s');
$ip = $_SERVER['HTTP_X_FORWARDED_FOR']; // user ip 
$useragent = $_SERVER['HTTP_USER_AGENT']; // getting useragnet 
$op = $_GET['op']; // operation name 
$tooken = $_GET['tooken']; // secure tooken
/// security mesure (banne the hacker)
/*if(banne($tooken,$op)) {

	$glob->ip = $ip;
	$glob->useragent = $useragent;
	$glob->date=$date;
	$glob->bannethehacker();
 	http_response_code(500);
	exit();

}

// check if the hacker ip in our db (already banned) 
if($glob->check('user-banned-ever','ip',$ip)) exit(json_encode((array("reponse"=>"0"))));
*/

// after hacker is gone now im sure that i can give data to my client app(web-mobile) :)
switch ($op) {
	case 'check':
		include('./operation/check-signin.php');
		break;
	
	case 'signin':
		include('./operations/signin.php');
		break;
}