
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Dashboard | Update Password</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="images/2.png" alt="IMG">
				</div>

				<form method="post" action="#" class="login100-form validate-form">
					<span class="login100-form-title">
						UPDATE PASSWORD
					</span>
					<div class="wrap-input100 validate-input" data-validate = "Valid code is required: ABC******">
						<input class="input100" type="text" name="code" placeholder="Confirmation code">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							
						</span>
					</div>


					<div class="wrap-input100 validate-input" data-validate = "Valid password is required: **********">
						<input class="input100" type="password" name="password1" placeholder="New Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
					<div class="wrap-input100 validate-input" data-validate = "Valid password is required: **********">
						<input class="input100" type="password" name="password2" placeholder="Confirme New Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>

					
					
					<div class="container-login100-form-btn">
						<input name="submit" value="CHANGE MY PASSWORD" type="submit" class="login100-form-btn">
							
						</input>
					</div>

					

					
				</form>
			</div>
		</div>
	</div>
	
	

	
<!--===============================================================================================-->	
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>
<?php

$pwd1 = $_POST["password1"];
$pwd2 = $_POST["password2"];
$code = $_POST["code"];
$email = $_SESSION["email"];
if((isset($_POST["submit"])) && (!empty($code)) && (!empty($pwd1)) &&(!empty($pwd2)))
	{
	if ($code == $_SESSION["rcode"]) {
		if ($pwd1 !== $pwd2) echo "<script>alert('password misspatch');</script>"; 
		if (strlen($pwd1)<8) echo "<script>alert('Weak password ! ');</script>"; 
		$data = array("email"=>"$email","password"=>"$pwd1");
		//die(print_r($data));
		$ok=post("updatePass","admins",$data,tooken());
		if ($ok->reponse == 1) {
			echo "<script>alert('Password changed');</script>
			<script>window.location.replace('./dashboard');</script>";

		}else{
			echo "<script>alert('Connection error');</script>";
		}
	}else{
		echo "<script>alert('Confirmation code missmatch');</script>";
		}
	}



?> 