<?php
switch ($_SESSION["step"] {
	case 'rcode':
		include("./r1.php");
		die();
		break;
	case 'newpwd':
		include("./r2.php");
		break;
}
?>