<?php
    //this code should be on profile.php i guess
    //send a request to get challenges
    //recieving challenges from slamat , diplay them to the user
    //dont forget the start button to each challeng

    //supposant that we have the user 'id' and 'year' in a SESSION for example
    //-------------------lets do this for now
    $id = 5;
    $year = 1;
    //-------------------lets do this for now

    
    include 'tooken.php';
    if(isset($_POST['submit'])){
        $url = "http://35.203.0.205:2019/?tooken=tooken()&op=challenges";

        $data = array(
            "id" => $id,
            "year" => $year
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

        //idont know all the reponses yet
        
    }//i was forgeting this that is why it was giving error 'unexpected end of file on </html>'



?>


<!DOCTYPE html>
<html>
<head>
    <title>challenges</title>
</head>
<body>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <button type="submit" name="submit">Send Request</button>
    </form>
        
    <?php if(isset($_POST['submit'])): ?>
        <?php if($result!=null): ?>
            <?php if($result->reponse == '1'): ?>
                <!--display challenges to the user-->
                <?php foreach($result->challenges as $challenge): ?>
                    <?php
                        echo $challenge->id.'<br>';
                        echo $challenge->point.'<br>';
                        echo $challenge->module.'<br>';
                        echo $challenge->story.'<br>';
                        echo $challenge->nbOfQuestions.'<br>';
                        echo $challenge->nbPersonSolved.'<br>';
                        echo $challenge->resource[0]->nom.'<br>';
                        echo $challenge->resource[1]->url.'<br>';

                        //i didn't put the start button yet wich starts the challenge
                    ?>
                <?php endforeach ;?>
            <?php else :?>
                
                <p>some thing went wrong</p>
            <?php endif ; ?>
        <?php endif; ?>
    <?php endif; ?>
    

</body>
</html>