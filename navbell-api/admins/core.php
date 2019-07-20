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
	case 'addemp':
		include("./admins/op/addemployer.php");
		break;
	case 'getallstudent':
		include("./admins/op/allstudent.php");
		break;
	case 'killuser':
		include("./admins/op/killuser.php");
		break;
	case 'userinfo':
		include("./admins/op/userinfo.php");
		break;
	case 'addstudent':
		include("./admins/op/addstudent.php");
		break;
	case 'settings':
		include("./admins/op/settings.php");
		break;
	case 'count':
		include("./admins/op/count.php");
		break;
	case 'topusers':
		include("./admins/op/topusers.php");
		break;
	case 'insrReward':
		include("./admins/op/insrreward.php");
		break;
	case 'sndMails':
		include("./admins/op/sndmails.php");
		break;
	case 'rcode':
		include("./admins/op/rcode.php");
		break;
	case 'updatePass':
		include("./admins/op/updatepwd.php");
		break;
	default:

		# code...
		break;
}
?>