<?php
	session_start();
    if(isset($_POST['submit'])){
        if($_SESSION['code'] == $_POST['code']){
            //redirect to change-password.php
            // header('location: change-password.php');
            // session_start();
	        $op = 'reset';
	        $data = array("email"=>$_SESSION['email'], "password"=>$_POST['newPassword']);
	        $result = postapi($url, $op, $data);

	        switch($result->reponse){
	            case '-1':
	                echo '<script>alert("some thing went wrong");</script>';
	            break;
	            case '1':
	                echo '<script>alert("your password has been changed");</script>';
	                header('location: changed-password.php');
	            break;
	        }
        } else {
            echo '<script>alert("your code is wrong");</script>';
        }
    }
?>