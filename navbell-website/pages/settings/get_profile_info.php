<?php
	$op = 'profile';

	if(isset($_SESSION['user_signup_info'])) {
		$id = $_SESSION['user_signup_info']->id;
	} else if(isset($_SESSION['user_login_info'])) {
		$id = $_SESSION['user_login_info']->id;
	}

	$data = array('id' => $id);
	$result = postapi($url, $op, $data);
	switch($result->reponse) {
		case '-1':
		// because i need profile info , i wont let the page appear untill i have it
		die("<script>alert('some thing went wrong, please try again');</script>");
		break;
	}
?>