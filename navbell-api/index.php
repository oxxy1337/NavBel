<?php
/*
coded by m.slamat
*/
error_reporting(0); // i hate errors <3 
/****************************************************/
/* 					WEB HEADER
/****************************************************/ 
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Access-Control-Max-Age ,Access-Control-Allow-Methods");
/*******************************************************/
/* 			INCLUDING NECCISSAIRE FILES
/*******************************************************/
include('./config.php'); // including the config file
include('./functions/functions.php'); // including our function
include('./classes/global.php'); // including global class
include('./classes/conn.php'); // conection to db 

/********************************************************/
/* 			CREATING INSTANCE & INIT VARS
/********************************************************/
$data = file_get_contents('php://input'); // import data as json
$data = json_decode($data); // geting data object
 // creating Database object for connection
$database = new Database(MySQL_HOST,MySQL_USER,MySQL_PASS,MySQL_PORT,MySQL_DBNAME); 
$db = $database->getConnection();  //checking the connection
$glob = new Globals($db); // creating object 
include('./functions/vars.php'); // variables initialisation
// Import PHPMailer  
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
//Load Composer's autoloader
require 'phpmailer/vendor/autoload.php';

	$mail = new PHPMailer(true);  // Passing `true` enables exceptions

    //Server settings
    $mail->SMTPDebug = 0;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = SMTP_HOST ;  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = SMTP_USER;                 // SMTP username
    $mail->Password = SMTP_PASS;                           // SMTP password
    $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 465;                                    // TCP port to connect to

//security mesure (banne the hacker)
/*********************************************************/
/*  	 STARTING SECURITY SYSTEM & ANTI CHEAT
/*********************************************************/

/*if(banne($tooken,$_GET,$_POST) !==false ){
	$why = "//{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";
	$glob->why = $why;
	$glob->ip = $ip;
	$glob->useragent = $useragent;
	$glob->date=$date;
	$glob->bannethehacker();
	$mailer="alert";
	include("./operations/mailer.php");

 }/**/
 if(bf($flag) !== false){

	$glob->why = $data->why;
	$glob->ip = $ip;
	$glob->useragent = $useragent;
	$glob->date=$date;
	$glob->bannethehacker();

 }
/*
// check if the hacker ip in our db (already banned) 
if($glob->check('userbannedever','ip',$ip)!==false) 
	exit(json_encode((array("reponse"=>-1337))));
// check if the user is a cheater :/ 
if($glob->check('userbannedtmp','userid',$glob->grab('users','id','email',$data->email))) exit(json_encode((array("reponse"=>-2))));



// after hacker and cheater  is gone now im sure that i can give data to my client app(web-mobile) :)
*/
/****************************************************/
/* 				STARTING DATA SELECTOR 
/****************************************************/
switch ($op) {
	case 'check':
		include("./operations/check-signin.php");
		break;
	
	case 'signin':
		$mailer = "signin";
		include('./operations/signin.php');
		
		break;
	case 'rcode':
		$mailer = "reset";
		include("./operations/mailer.php");
		break;
	case 'login':
		include("./operations/login.php");
		break;
	case 'reset':
		include("./operations/reset.php");
		break;
	case 'challenges':
		include("./operations/challenges.php");
		break;
	case 'questions':
		include("./operations/questions.php");
		break;
	case 'nbsolved':
		include("./operations/nbsolved.php");
		break;
	case 'trychallenge':
		include("./operations/trychallenge.php");
		break;
	case 'solve':
		include("./operations/solveqst.php");
		break;
	case 'profile':
		include("./operations/profile.php");
		break;
	case 'update':
		include("./operations/update.php");
		break;
	case 'getReward':
		include("./operations/reward.php");
		break;
	case 'sendReward':
		include('./operations/sendreward.php');
		break;
	case 'solvedChallenge':
		include('./operations/solvedchallenge.php');
		break;
	case 'getPosts':
		include('./operations/getposts.php');
		break;
	case 'sndPost':
		include('./operations/sendposts.php');
		break;
	case 'admins':
		include("./admins/core.php");
		break;

	default:
		include("./default.php");
		break;

	

}