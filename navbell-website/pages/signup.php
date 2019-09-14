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
                	$year = $result->year;//$_POST["year"]; get it from the API not the user input

                	if($pass === $pass2) {

	                	$op = "signin";
						$data = array('year'=>$year,'fname' =>$fname ,'lname'=>$lname,'email'=>$email,'password'=>$pass, 'ispublic'=>1);
						
						switch($_FILES['img']['error']){
							case 0:

								$extension = explode('.', $_FILES['img']['name'])[1];//extension check
								if($extension == 'jpg') {

									if($_FILES['img']['type'] == 'image/jpeg'){//mime type check
										$data['picture'] = base64_encode(file_get_contents($_FILES['img']['tmp_name']));
										$result = postapi($url,$op,$data);
		                				switch ($result->reponse) {
			                				case '-1':
			                					echo "<script> alert('something went wrong');</script>";
			                				break;
											case '1':
												session_start();
												$_SESSION['user_signup_info'] = $result;

												$op = 'challenges';
												$data = array("id" => $result->id, "year" => $year);// not $result->year cause api doesnt return year 
												$challenges_result = postapi($url, $op, $data);
												switch($challenges_result->reponse) {
													case "-1" :
													echo '<script>alert("there are no challenges for you");</script>';
													$_SESSION['challenges'] = $challenges_result->challenges;
													header('location: main.php');
													break;
													case "1" :
													$_SESSION['challenges'] = $challenges_result->challenges;
													
													header('location: main.php');
													break;
													default : 
													echo '<script>alert("the switch default");</script>';
												}
				                			break;
		                		
		                				}
									} else {
										echo '<script>alert("your image should be in jpeg format");</script>';
									}

								} else {
									echo '<script>alert("your image should be in jpeg format");</script>';
								}
							break;
							case 1:
							case 2:
								echo '<script>alert("image size too big");</script>';
							break;
							case 4:
								//user didn't choose image so im posting a default image
								$data['picture'] = base64_encode(file_get_contents('./img/profile.jpg'));
								$result = postapi($url,$op,$data);
	                			switch ($result->reponse) {
		                			case '-1':
		                				echo "<script> alert('something went wrong');</script>";
		                			break;
									case '1':
										session_start();
										$_SESSION['user_signup_info'] = $result;

										$op = 'challenges';
										$data = array("id" => $result->id, "year" => $year);// not $result->year cause api doesnt return year 
										$challenges_result = postapi($url, $op, $data);
										switch($challenges_result->reponse) {
											case "-1" :
											echo '<script>alert("there are no challenges for you");</script>';
											$_SESSION['challenges'] = $challenges_result->challenges;
											header('location: main.php');
											break;
											case "1" :
											$_SESSION['challenges'] = $challenges_result->challenges;
											header('location: main.php');
											break;
											default : 
											echo '<script>alert("the switch default");</script>';
										}
		                			break;
	                		
	                			}
							break;
							default: 
								echo '<script>alert("the image didn\'t upload");</script>';  

						}

					} else {
						echo ("<script> alert('the passwords don't match);</script>"); 
					}
                	

                
                break;
				case '2' :
					echo("<script> alert('you are already subscribed');</script>");
                break;
                case '3' :echo('<script> alert("you are not from esi "); </script>');
                break;
                case "-1":echo('<script> alert("something went wrong");</script>');
                break;
                


			}
        }


?>