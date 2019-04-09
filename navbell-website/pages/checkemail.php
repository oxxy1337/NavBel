<?php
$op = "check";

/*if(0) {
	// antihacker(); // for next time 
	die("Permission denied");
}*/

// don't forget filter inputs 

if(isset($_POST["checkemail"])){

			$data = array("email"=>$_POST["email"]); 
			$result = postapi($url,$op,$data);
            switch($result->reponse){
                case '0' :echo 'you re banned';
                break;
                case '1' : include('./pages/html/saveinfo.html');
                break;
                case '2' :die('you re already subscribed');//dont forget to redirect to login.php

                break;
                case '3' :die('<script> alert("machi mn esi "); </script>');
                break;
                case "-1":die('something went wrong');
                break;

            }
        }


?>