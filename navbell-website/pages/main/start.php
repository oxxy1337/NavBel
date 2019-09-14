<?php
    // what i need in the next page (startQuiz)
    // challenge id 
    // user id
    // questions 
    // correctAnswers
    // refresh counter to prevent the refreshing of the strat Quiz page (anti cheat)
    if(isset($_POST['start'])){
        $op = "questions";
        $data = array("id"=>$_POST['id']);
        $result = postapi($url, $op, $data);
        switch($result->reponse){
            case "-1":
                echo '<script>alert("some thing went wrong questions request");</script>';
            break;
            case "1":   
                // session_start();
                $_SESSION['challenge_id'] = $_POST['id'];// done
                $_SESSION['questions'] = $result->questions;// done

                $op = 'trychallenge';
                if(isset($_SESSION['user_signup_info'])) {
                    $id = $_SESSION['user_signup_info']->id;
                } else if(isset($_SESSION['user_login_info'])){
                    $id = $_SESSION['user_login_info']->id;
                }
                $_SESSION['user_id'] = $id;// done
                $data = array('id' => $id, 'challengeid' => $_POST['id']);
                $result = postapi($url, $op, $data);
                switch($result->reponse) {
                    case "-1":
                    echo '<script>alert("some thing went wrong try challenge request");</script>';
                    break;
                    case "1" : 
                    $_SESSION ['refreshCount'] = 0;// done
                    $_SESSION['correctAnswers'] = $result->data;// done




                    header('location: startQuiz.php');
                    break;
                }

                // header('location: startQuiz.php');//i dont know the name of the page yet
                
            break;
        }


       
    }
?>