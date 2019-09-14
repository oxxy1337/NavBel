<?php
	if(isset($_GET['y'])) {
		$y = json_decode($_GET['y']);
		// $y = $_GET['y'];
		var_dump($y);
	} else {
		echo 'looser';
	}
?>