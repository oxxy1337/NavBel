<?php
/************************************/
/* We Decide now we enough for supposing ....  
*/
include("./classes/global_admin.php");


$admin = new Dashboard($db);

$op2 = $_GET["op2"];

switch ($op2) {
	case 'login':
		include("./admins/op/login.php");
		break;
	
	default:
		# code...
		break;
}
?>