<?php
	if(isset($_GET['answersStringToPost'])) {
		include '../../functions/functions.php';

		$op = 'solve';
		$data = json_decode($_GET['answersStringToPost'], true);
		$result = postapi($url, $op, $data);
		switch($result->reponse) {
			case '-1' : 
			echo 'something went wrong';
			break;
			case '1' : 
			echo $result->totalwin;

		}

	}
?>