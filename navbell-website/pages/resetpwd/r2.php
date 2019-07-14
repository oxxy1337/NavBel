<?php
    if(isset($_POST['submit'])){
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
    } 
?>