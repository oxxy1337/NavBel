<?php

if(isset($_POST["signin"])){
	$op = "login";
	$data = array("email"=>$_POST["login"],"password"=>$_POST["password"]);
	$result = postapi($url,$op,$data);
	switch ($result->reponse) {
		case '-1':
			echo("<script>alert('error in pwd or email');</script>");
			break;
		
		case '1':
			session_start();
			$_SESSION['user_login_info'] = $result;

			
			$op = 'challenges';
			$data = array("id" => $result->id, "year" => $result->year);
			$challenges_result = postapi($url, $op, $data);
			switch($challenges_result->reponse) {
				case "-1" :
				echo '<script>alert("some thing went wrong or there is no challenges for you");</script>';
				break;
				case "1" :
				$_SESSION['challenges'] = $challenges_result->challenges;
				echo  '<script>alert("raw ymchi go session part");</script>';
				header('location: main.php');
				break;
				default : 
				echo '<script>alert("the switch default");</script>';
			}
			break;
	}
}
?>