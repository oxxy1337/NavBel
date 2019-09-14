<?php

/*if(0) {
	// antihacker(); // for next time 
	die("Permission denied");
}*/

// don't forget filter inputs 

if(isset($_POST["submit"])){ // empty .... 
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
                	$pass2 = $_POST["confirmSgpassword"];// i dont need this
                	$year = $_POST["year"];
                	
                	$op = "signin";
					$data = array('year'=>$year,'fname' =>$fname ,'lname'=>$lname,'email'=>$email,'password'=>$pass);
					
					switch($_FILES['img']['error']){
						case 0:
							if($_FILES['img']['type'] == 'image/jpeg'){
								$data['picture'] = base64_encode(file_get_contents($_FILES['img']['tmp_name']));
							} else {
								//should i use die() to not run postapi()
								echo '<script>alert("your image should be in jpeg format");</script>';
								goto x;
							}
						break;
						case 1:
						case 2:
							echo '<script>alert("image size too big");</script>';
							//should i use die()
							goto x;
						break;
						case 4:
							//user didn't choose image so im posting a default image
							$data['picture'] = base64_encode(file_get_contents('./img/profile.jpg'));
						break;
						default: 
							echo '<script>alert("the image didn\'t upload");</script>';  
							goto x;

					}
                	$result = postapi($url,$op,$data);
                	switch ($result->reponse) {
                		case '-1':
                			echo "<script> alert('something went wrong');</script>";
                			break;
						case '1':
							session_start();
							$_SESSION['user_signup_info'] = $result;


							$op = 'challenges';
							$data = array("id" => $result->id, "year" => $result->year);
							$challenges_result = postapi($url, $op, $data);
							switch($challenges_result->reponse) {
								case "-1" :
								echo '<script>alert("some thing went wrong");</script>';
								break;
								case "1" :
								$_SESSION['challenges'] = $challenges_result->challenges;
								echo  '<script>alert("raw ymchi go session part");</script>';
								header('location: main.php');
								break;
								default : 
								echo '<script>alert("the switch default");</script>';
							}
                			break;
                		
                	}

                ;
                break;
				case '2' :
					echo("<script> alert('u re already subscribed');</script>");//dont forget to redirect to login.php
                break;
                case '3' :echo('<script> alert("machi mn esi 404 "); </script>');
                break;
                case "-1":echo('<script> alert("something went wrong");</script>');
                break;

			}
			x:
        }


?>