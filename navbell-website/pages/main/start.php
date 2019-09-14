<?php
    if(isset($_POST['start'])){
        $op = "questions";
        $data = array("id"=>$_POST['id']);
        $result = postapi($url, $op, $data);
        switch($result->reponse){
            case "-1":
                echo '<script>alert("some thing went wrong");</script>';
            break;
            case "1":
                //put $result in the session and redirect to start challenge page
                //dont forget that in start_challenge.php page you need to post the challenge id and the user id 
                //the user id i think its already in a $_SESSION['id'] or $_SESSION['user_info'] or $_SESSION['user_signup_info']   DONT OVERIDE IT WITH ANOTHER SESSION
                session_start();
                $_SESSION['challenge_id'] = $_POST['id'];
                $_SESSION['questions'] = $result;
                header('location: start_challenge.php');//i dont know the name of the page yet
                
            break;
        }
    }
?>