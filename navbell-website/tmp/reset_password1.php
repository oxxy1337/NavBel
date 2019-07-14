<?php
    include 'tooken.php';
    if(isset($_POST['submit'])){
        $email = $_POST['email'];
        $fname = $_POST['fname'];

        //$url = "http://35.203.11.145/navbell-api/?tooken=tooken()&op=rcode";
        $url = "http://35.203.0.205:2019/?tooken=tooken()&op=rcode";


        $data = array(
            'email' => $email,
            'fname' => $fname
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

        if($result != null){
            switch($result->reponse){
                case "0": echo 'you are banned';
                break;
                case "1"://the code has been sent to user,  redirect to code_verification.php
                    session_start();
                    $_SESSION['code'] = $result->code;
                    header('location: code_verification.php');

                break;
                case "3": echo 'you are not from esi';
                break;
                case "-1": echo 'some thing went wrong';
                break;
            }
        }
        
        //if email sent successfully then save the code in $_SESSION['code'] and redirect to  code_verification.php

    }
?>

<!DOCTYPE html>
<html>
<head>
    
</head>
<body>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>"method="post">
        <input type="text" name="email" placeholder="enter email of esi"><br>
        <input type="text" name="fname" placeholder="enter first name you signed in with"><br>
        <input type="submit" name="submit" value="send verification code">
    </form>
</body>
</html>