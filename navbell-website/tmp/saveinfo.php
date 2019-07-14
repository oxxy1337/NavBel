<?php
    session_start();
    if($_SESSION['test'] == 'ok'){//anti hack
        include 'saveinfo2.php';
    } else {
        echo 'you re not allowed in this page';
    }
?>