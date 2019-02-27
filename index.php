<?php 
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include(".//api/functions.php");
$op = $_GET['op'];
$token = $_GET['skey'];


if((tooken($token)) && (!empty($op))) {

switch ($op) {
	case 'signin':
		include("./operations/signin.php");
		break;
 	case 'check':
 		include("./operations/check.php");
 		break;
 	case 'login':
 		include("./operations/login.php");
 		break;
 		case 'update':
 		include("./operations/update.php");
 			break;
 		case 'tests':
 		include("./operations/tests.php");	
 			break;
 		case 'qst':
 		include("./operations/qst.php");
 			 break;
 		case 'img':
 		include("./operations/img.php");
 			break;
	default:
		die("Opration Not found");
		break;

}

 } else { die("Secure key Error ");}

?>