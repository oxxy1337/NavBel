<?php
    include 'tooken.php';
    if(isset($_POST["submit"])){
        $email = $_POST["email"];

        //$url = "http://35.203.11.145/navbell-api/?tooken=tooken()&op=check";
        $url = "http://35.203.71.98:2019/?tooken=tooken()&op=check";


        $data = array("email" => $email);
        $data = json_encode($data);

        $opt = array(
            'http' => array(
                'method' => 'POST',
                'header' => 'Content-type: application/x-www-form-urlencoded',
                'content' => $data
            )
        );
        $context = stream_context_create($opt);
        $result = file_get_contents($url, false, $context);//its returning null ???!!! solved i ve forgot &op in $url

        $result = json_decode($result);//object
        //$result->reponse = 0;
        //echo $result->reponse;
        
        if($result != null){
            switch($result->reponse){
                case '0' :echo 'you re banned';
                break;
                case '1' :
                    start_session();
                    $_SESSION['email'] = $email;
                    $_SESSION['test'] = 'ok';//anti hack
                    header('location: saveinfo.php');//redirect to saveinfo.php
                    die();//slamat told me to
                break;
                case '2' :echo 'you re already subscribed';//dont forget to redirect to login.php
                break;
                case '3' :echo 'you re not from ESI you can not sign in';
                break;
                case "-1":echo 'something went wrong';
                break;

            }
        } else {
            echo 'there was an error';
        }
    }

?>

<!DOCTYPE html>
<html>
<head>
	<title>Sign Up</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="loginbox1">
		<img src="avatar.png" class="avatar">
		<h1>Sign In</h1>
		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
			<p>Email</p>
			<input type="text" name="email" placeholder="Email">
			<input type="submit" name="submit" value="Sign In">
			
		</form>
	</div>

</body>
</html>