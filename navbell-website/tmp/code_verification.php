<?php
    //we dont need tooken we are not posting any thing
    if(isset($_POST['submit'])){
        session_start();

        $code = $_POST['code'];

        if($code === $_SESSION['code']){
            //redirect to reset_password2.php
            header('location: reset_password2.php');
        }
    }
?>

<!DOCTYPE html>
<html>
<head>
    
</head>
<body>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <input type="text" name='code' placeholder="enter verification code"><br>
        <input type="submit" name="submit" value="verify code">
    </form>
</body>
</html>