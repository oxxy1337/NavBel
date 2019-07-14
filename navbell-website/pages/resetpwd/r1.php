<?php 

    if(isset($_POST['reset-password'])){

        $op = "rcode";
        $data = array("email"=>$_POST["email"]);
        $result = postapi($url,$op,$data);

        switch($result->reponse){
            case '-1':
                echo '<script>alert("something went wrong");</script>';
            break;
            case '3':
                echo '<script>alert("you are not from ESI");</script>';
            break;
            case '1':
            echo '<script>alert("good");</script>';
                session_start();
                $_SESSION['code'] = $result->code;
                $_SESSION['email'] = $_POST['email'];
                header('location: code_verification.php');
            break;
            default : 
                echo '<script>alert("not good");</script>';
        }
        
    }
?>