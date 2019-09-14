<?php  
	if(isset($_POST['sendReward'])) {
		// $check points then post to api

		$userPoint = $_SESSION['user_profile_info']->point;
		$rewardPoint = $_POST['rewardPoint'];

		if($userPoint < $rewardPoint) {
			echo '<script>alert("you dont have enough points to get this reward");</script>';
		} else {
			$op = 'sendReward';
			$data = array('id' => $_POST['userId'], 'rewardid' => $_POST['rewardId']);
			$result = postapi($url, $op, $data);
			switch($result->reponse) {
				case '-1':
				echo '<script>alert("something went wrong please try again");</script>';
				break;
				case '1':
				echo '<script>alert("the reward have been sent to you check your Email");</script>';
				break;
			}
		}
	}
?>