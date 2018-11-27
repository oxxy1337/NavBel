<?php 
include(".//api/functions.php");
$op = $_GET['operation'];
$token = $_GET['skey'];
if (tooken($token)) {
die("nqmq ya akrem raw ymchi");
/*// signin section a bb  
switch ($op) {
	case 'signin':
		include("./operations/signin.php");
		break;
 	
	default:
		die("Opration Not found");
		break;

}

*/ } else { die("Secure key Error nqmq");}

?>