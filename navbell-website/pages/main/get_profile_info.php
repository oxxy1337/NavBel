<?php  
	if(isset($_POST['get_profile_info'])) {
		// session_start();
		if(isset($_SESSION['user_signup_info'])) {
			$id = $_SESSION['user_signup_info']->id;
		} else if(isset($_SESSION['user_login_info'])){
			$id = $_SESSION['user_login_info']->id;
		}

		$op = "profile";
		$data = array("id"=>$id);
		$result = postapi($url, $op, $data);
		switch($result->reponse) {
			case "-1" : 
			echo '<script>alert("something went wrong");</script>';
			break;
			case "1" : 
			// session_start();
			$_SESSION['user_profile_info'] = $result;
			header('location: profile.php');
			break;
			default : 
			echo '<script>alert("Switch default");</script>';
		}
	}
?>