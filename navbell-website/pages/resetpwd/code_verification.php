<?php
    if(isset($_POST['submit'])){
        session_start();
        if($_SESSION['code'] === $_POST['code']){
            //redirect to change-password.php
            header('location: change-password.php');
        } else {
            echo '<script>alert("your code is wrong");</script>';
        }
    }
?>