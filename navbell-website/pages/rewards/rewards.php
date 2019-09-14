<?php
	$op = 'getReward';
	$data = '';
	$result = postapi($url, $op, $data);
	switch($result->reponse) {
		case '-1':
		echo '<script>alert("something went wrong please try again");</script>';
		break;
		case '1':
		$rewards = $result->data;
		if(count($rewards) == 0) {
			echo '<script>alert("sorry! there are no rewards for know");</script>';
		}
		break;

	}

	// echo '<script>alert("'.$result->reponse.'");</script>';
?>