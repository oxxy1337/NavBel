<?php
	if(isset($_POST['update-profile'])) {
		$postToApi = 0;
		switch($_FILES['img']['error']) {
			case '0':
			$extension = explode('.', $_FILES['img']['name'])[1];
			if($extension == 'jpg') {
				if($_FILES['img']['type'] == 'image/jpeg') {
					$postToApi = 1;
					$picture = base64_encode(file_get_contents($_FILES['img']['tmp_name']));
				} else {
					echo '<script>alert("the picture should be in jpg format");</script>';
				}
			} else {
				echo '<script>alert("the picture extension is not jpg !! ");</script>';
			}
			break;
			case '1':
			case '2':
			echo '<script>alert("image size too big");</script>';
			break;
			case '4':
			$postToApi = 1;
			$picture = base64_encode(file_get_contents($result->picture));// $result of 'settings/get_profile_info.php'
			break;
			default :
			echo '<script>alert("image didn\'n upload try again");</script>';
		}


		if($_POST['password'] === $_POST['confirm-password']) {
			if($postToApi == 1) {
				$op = 'update';
				$data = array(
					"id" =>$_POST['id'],
					"fname" =>$_POST['fname'],
					"lname" =>$_POST['lname'],
					"password" =>$_POST['password'],
					"picture" =>$picture,
					"ispublic" =>$_POST['ispublic']
				);
				$result2 = postapi($url, $op, $data);
				switch ($result2->reponse) {
					case '-1':
						echo '<script>alert("something went wrong please try again");</script>';
						break;
					
					case '1':
						echo '<script>alert("your profile have been updated succesfully");</script>';
						$result->picture = $result2->picture;// keep the user in setting page and change the profile picture of the settings page 
						break;	
					default:
						echo '<script>alert("something went wrong please try again");</script>';
						break;
				}
			}
		} else {
			echo '<script>alert("passwords dont match");</script>';
		}
	}
?>