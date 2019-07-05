<?php
/************************************/
/* We Decide to enough of supposing ....  
*************************************/
include("./classes/global_admin.php");


$admin = new Dashboard($db);

$op2 = $_GET["op2"];

switch ($op2) {
	case 'login':
		include("./admins/op/login.php");
		break;
	case 'getchlng':
		include("./admins/op/getchlng.php");
		break;
	case 'chlng-dl':
		include("./admins/op/chlng-dl.php");
		break;
	case 'chlng-ap':
		include("./admins/op/chlng-ap.php");
		break;
	case 'chlng-add':
		include("./admins/op/chlng-add.php");
		break;
	case 'qstadd':
		include("./admins/op/qst-add.php");
		break;
	case 'optadd':
		include("./admins/op/opt-add.php");
		break;
	case 'soluadd':
		include("./admins/op/solu-add.php");
		break;
	default:
		# code...
		break;
}
?>