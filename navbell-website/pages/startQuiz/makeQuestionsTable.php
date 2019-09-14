<?php
	// session_start();
	// there is 
	// $_SESSION['user_id']
	// $_SESSION['challenge_id']
	// $_SESSION['questions']
	// $_SESSION['correctAnswers']


	echo '<script>let answersStringToPost =\'{"challengeid" : "'.$_SESSION['challenge_id'].'", "id" : "'.$_SESSION['user_id'].'", "challenges" : [\' ;</script>';
	
	echo '<script>let questions = '.json_encode($_SESSION['questions']).';</script>';
	echo '<script>let correctAnswers = '.json_encode($_SESSION['correctAnswers']).';</script>';

?>

<script type="text/javascript">
	for(let i = 0; i < questions.length; i++) {
		questions[i].correct = "";
		for(let j = 0; j < questions[i].options.length; j++) {
			if(correctAnswers[i].opt == questions[i].options[j].id) {
				questions[i].correct = questions[i].options[j].trueoption;
			}
		}
	}

</script>