<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    
</head>
<body>
    <p>there is your image</p>
    <img src="<?php echo $_SESSION['user_info']->picture; ?>" alt="" height="300" width="300">
</body>
</html>