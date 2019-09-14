<?php
	include './../../functions/functions.php';

	$op = "questions";
	$data = array("id" => $_GET['id']);
	$result = postapi($url, $op, $data);
	switch($result->reponse) {
		case "-1" : 
		echo '<script>alert("something went wrong");</script>';
		var_dump($result);
		break;
		case "1" : 
		echo json_encode($result->resource);
		break;
		default : 
		echo '<script>alert("Switch default");</script>';
	}
?>