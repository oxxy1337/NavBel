<?php
include('../classes/global.php');
include('../classes/conn.php');
$data = file_get_contents('php://input');
$data = json_decode($data);
$email = $data->email;
$db = $database -> getConnection();



?>