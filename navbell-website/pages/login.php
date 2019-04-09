<?php

if(isset($_POST["submit"])){
	$op = "login";
	$data = array("email"=>$_POST["login"],"password"=>$_POST["password"]);
	$result = postapi($url,$op,$data);
	switch ($result->reponse) {
		case '-1':
			die('<script>alert("error in pwd or email ");</script>');
			break;
		
		case '1':
			die('<script>alert("raw ymchi go session part");</script>');
			break;
	}
}
?>