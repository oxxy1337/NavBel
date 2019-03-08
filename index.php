<?php
/*
coded by m.slamat
*/
/// web header part 
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Access-Control-Max-Age ,Access-Control-Allow-Methods");
/// end header
include('./functions/functions.php'); // including our function
include('./classes/global.php'); // including global class
include('./classes/conn.php'); // conection to db 
$data = file_get_contents('php://input'); // import data as json
$data = json_decode($data); // decoding ...
$database = new Database();  // creating Database object for connection 
$db = $database->getConnection();  //checking the connection
$glob = new Globals($db); // creating object 
include('./functions/vars.php'); // variables initialisation
//security mesure (banne the hacker)
/*
if(banne($tooken,$op) !==false ){
	$why = "//{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";
	$glob->why = $why;
	$glob->ip = $ip;
	$glob->useragent = $useragent;
	$glob->date=$date;
	$glob->bannethehacker();
	$mailer="alert";
	include("./operations/mailer.php");
 }
 if(bf($flag) !== false){

	$glob->why = $data->why;
	$glob->ip = $ip;
	$glob->useragent = $useragent;
	$glob->date=$date;
	$glob->bannethehacker();

 }

// check if the hacker ip in our db (already banned) 
if($glob->check('userbannedever','ip',$ip)) exit(json_encode((array("reponse"=>"0"))));
*/
// is not from ESI students ? then i return 3
if($glob->check('allstudents','email',$email) == false) die(json_encode(array("reponse"=>"3")));

// after hacker is gone now im sure that i can give data to my client app(web-mobile) :)
switch ($op) {
	case 'check':
		include('./operations/check-signin.php');
		break;
	
	case 'signin':
		include('./operations/signin.php');
		break;
	case 'rcode':
		$mailer = "reset";
		include("./operations/mailer.php");
		break;
	case 'login':
		include('./operations/login.php');
		break;
	case 'reset':
		include("./operations/reset.php");
		break;
}