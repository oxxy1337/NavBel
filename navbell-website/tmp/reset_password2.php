<?php
    include 'tooken.php';
    if(isset($_POST['submit'])){
        $email = $_POST['email'];
        $password = $_POST['password'];

        //$url = "http://35.203.11.145/navbell-api/?tooken=tooken()&op=reset";
        $url = "http://35.203.0.205:2019/?tooken=tooken()&op=reset";


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

        //then what to do? redirect to login.php i guess

        if($result != null){
            switch($result->reponse){
                case "0": echo 'you are banned';
                break;
                case "1": //password successfuly reseted , redirect to login.php
                    header('location: login.php');
                break;
                case "3": echo 'you are not from esi';
                break;
                case "-1": echo 'something went wrong';
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
    
</head>
<body>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <input type="text" name="email" placeholder="enter email"><br>
        <input type="password" name="password" placeholder="enter new password"><br>
        <input type="submit" name="submit" value="sreset password">
    </form>
</body>
</html>