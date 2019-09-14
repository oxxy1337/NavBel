<?php
	session_start();
	$challenges = $_SESSION['challenges'];
	// $op = "challenges";

	// // get the user id and year from login or signup $result which are stored in a SESSION 
	// if(isset($_SESSION["user_login_info"])) {
	// 	$data = array("id" => $_SESSION["user_login_info"]->id, "year" => $_SESSION["user_login_info"]->year);
	// } else if(isset($_SESSION["user_signuo_info"])) {
	// 	$data = array("id" => $_SESSION["user_signup_info"]->id, "year" => $_SESSION["user_signup_info"]->year);
	// }

	// $result = postapi($url, $op, $data);
	// switch($result->reponse) {
	// 	case "-1" :
	// 	echo '<script>alert("some thing went wrong");</script>';
	// 	break;
	// 	case "1" :
	// 	$challenges = $result->challenges;
	// 	break;
	// 	default : 
	// 	echo '<script>alert("the switch default");</script>';
	// }
?>