<?php
    //what to show-----------------------------------------------------------------
    // session_start();
    // $challenges = '
    //     [
    //         {
    //             "id" : "1",
    //             "point" : "100",
    //             "module" : "OOP",
    //             "story" : "POO exercice",
    //             "nbOfQuestions" : "1",
    //             "nbPersonSolved" : "1",
    //             "resource" : [{"nom" : "wiki", "url" : "fb.com"}, {"nom" : "cours pdf", "url" : "jahob.com"}]
    //         },
    //         {
    //             "id" : "2",
    //             "point" : "150",
    //             "module" : "Mathematics ",
    //             "story" : "Math exercice",
    //             "nbOfQuestions" : "2",
    //             "nbPersonSolved" : "2",
    //             "resource" : [{"nom" : "moussa", "url" : "moussa.com"}]
    //         },
    //         {
    //             "id" : "3",
    //             "point" : "200",
    //             "module" : "Physics",
    //             "story" : "Experemental",
    //             "nbOfQuestions" : "3",
    //             "nbPersonSolved" : "3",
    //             "resource" : [{"nom" : "omar", "url" : "omar.com"}]
    //         },
    //         {
    //             "id" : "3",
    //             "point" : "200",
    //             "module" : "Physics",
    //             "story" : "Experemental",
    //             "nbOfQuestions" : "3",
    //             "nbPersonSolved" : "3",
    //             "resource" : [{"nom" : "omar", "url" : "omar.com"}]
    //         },
    //         {
    //             "id" : "3",
    //             "point" : "200",
    //             "module" : "Physics",
    //             "story" : "Experemental",
    //             "nbOfQuestions" : "3",
    //             "nbPersonSolved" : "3",
    //             "resource" : [{"nom" : "omar", "url" : "omar.com"}]
    //         }

    //     ]
    // ';
    // there is a problem in json notation concerning the resource
    // $challenges = json_decode($challenges);
    
    // session_start();
    

    // i have challenges in a session from index page but when refrehing main i need the challenges to request again if the request didnt work in the switch default keep the challenges obtained from index
    $op = "challenges";
    if(isset($_SESSION['user_signup_info'])) {
        $id = $_SESSION['user_signup_info']->id;
        $year = $_SESSION['user_signup_info']->year;
    } else if(isset($_SESSION['user_login_info'])) {
        $id = $_SESSION['user_login_info']->id;
        $year = $_SESSION['user_login_info']->year;
    }

    $data = array("id"=> $id, "year" => $year);
    $result = postapi($url, $op, $data);
    switch($result->reponse) {
        case "-1" : 
        echo '<script>alert("there are no challenges for you");</script>';
        $challenges = $result->challenges;
        
        break;
        case "1" : 
        // session_start();
        $challenges = $result->challenges;
        break;
        default : 
        $challenges = $_SESSION['challenges'];
    }
    // $challenges = $_SESSION['challenges'];

    
       
?>