<?php

/*if(0) {
	// antihacker(); // for next time 
	die("Permission denied");
}*/

// don't forget filter inputs 

if(isset($_POST["submit"])){
			$op = "check";
			$data = array("email"=>$_POST["email"]); // testing email 
			$result = postapi($url,$op,$data);
            switch($result->reponse){
                case '0' :echo 'you re banned';
                break;
                case '1' : 
                	$email = $_POST["email"];
                	$fname = $_POST["fname"];
                	$lname = $_POST["lname"];
                	$pass = $_POST["sgpassword"];
                	$pass2 = $_POST["confirmSgpassword"];
                	$year = $_POST["year"];
                	$picture = base64_encode(file_get_contents($_FILES["img"]["tmp_name"])); // don't forget img sec kkkkk ? ..... 
                	$op = "signin";
                	$data = array('year'=>$year,'fname' =>$fname ,'lname'=>$lname,'email'=>$email,'password'=>$pass,'picture'=>$picture);
                	$result = postapi($url,$op,$data);
                	switch ($result->reponse) {
                		case '-1':
                			echo "<script> alert('something went wrong');</script>";
                			break;
                		case '1':
                			echo "<script> alert('done !');</script>";
                			break;
                		
                	}

                ;
                break;
                case '2' :die("<script> alert('u re already subscribed');</script>");//dont forget to redirect to login.php

                break;
                case '3' :die('<script> alert("machi mn esi 404 "); </script>');
                break;
                case "-1":die('<script> alert("something went wrong");</script>');
                break;

            }
        }


?>