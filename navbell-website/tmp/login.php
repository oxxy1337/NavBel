<?php
   include 'tooken.php';
   if(isset($_POST['submit'])){
      $email = $_POST['email'];
      $password = $_POST['password'];

      //$url = "http://35.203.11.145/navbell-api/?tooken=tooken()&op=login";
      $url = "http://35.203.0.205:2019/?tooken=tooken()&op=login";


      $data = array(
          'email' => $email,
          'password' => $password  
         );
      $data = json_encode($data);

      $opt = array(
        'http' => array(
            'method' => 'POST',
            'header' => 'Content-type: application/x-www-form-urlencoded',
            'content' => $data
            )
        );
        $context = stream_context_create($opt);
        $result = file_get_contents($url, false, $context);
        $result = json_decode($result);
        
        //echo $result->reponse.'<br>';

        if($result != null){
            switch($result->reponse){
                case "0": echo 'you are banned';
                break;
                case "1":
                    //save reponses from slamat and redirect to prifile.php
                    //why all this , JUST DO $_SESSION['result'] = $result
                    session_start();
                    $_SESSION['id'] = $result->id;
                    $_SESSION['fname'] = $result->fname;
                    $_SESSION['lname'] = $result->lname;
                    $_SESSION['year'] = $result->year;
                    $_SESSION['point'] = $result->point;
                    $_SESSION['ranks'] = $result->ranks;
                    $_SESSION['picture'] = $result->picture;
                    $_SESSION['date'] = $result->date;
                    $_SESSION['nbsolved'] = $result->nbsolved;
                    $_SESSION['currentrank'] = $result->currentrank; 

                    header('location: profile.php');
                break;
                case "-1": echo 'some thing went wrong';
                break;
            }
        } else {
            echo '$result = null';
        }
   }
?>

<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="loginbox">
		<img src="avatar.png" class="avatar">
		<h1>Login</h1>
		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
			<p>Email</p>
			<input type="text" name="email" placeholder="Email">
			<p>Password</p>
			<input type="Password" name="password" placeholder="Password">
			<input type="submit" name="submit" value="Login">
			<a href="reset_password1.php">Forgot your password?</a><br>
			<a href="sign_up.php">Don't have an account?</a>

		</form>
	</div>

</body>
</html>