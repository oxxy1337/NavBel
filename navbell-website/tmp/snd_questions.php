<?php
    //supposons qu'on a the challenge id
    $id = 7;
    //----------------------------------


    include 'tooken.php';
    if(isset($_POST['submit'])){
        $url = "http://35.203.0.205:2019/?tooken=tooken()&op=questions";

        $data = array(
            "id" => $id
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

        echo ($result != null) ? $result->reponse : '$result = null';//just for testing
    }
?>


<!DOCTYPE html>
<html>
<head>
    
</head>
<body>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <button type="submit" name="submit">snd questions</button>
    </form>    
</body>
</html>