<?php
	include('./functions/functions.php');
 	include 'pages/main/challenges.php';// i should include get_challenges not challenges.php this is fake data
 	include('./pages/main/start.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php 
		$i = 0;
		$found = false;
		while($i < count($challenges) && !$found) {
			if($challenges[$i]->id == $_POST['id']) {
				$found = true;
			} else {
				$i++;
			}

		}
	?>
	<p>points <?php echo $challenges[$i]->point; ?></p>
	<p>module <?php echo $challenges[$i]->module; ?></p>
	<p>story	<?php echo $challenges[$i]->story; ?></p>
	<p>number of questions <?php echo $challenges[$i]->nbOfQuestions; ?></p>
	<p>solved times <?php $challenges[$i]->nbPersonSolved; ?></p>
	resources 
	<ul>
		<?php for($j = 0; $j < count($challenges[$i]->resource); $j++) : ?>
			<li><a href="<?php echo $challenges[$i]->resource[$j]->nom; ?>"><?php echo $challenges[$i]->resource[$j]->nom; ?></a></li>
		<?php endfor; ?>
	</ul>
	<div>
		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
			<input type="hidden" name="id" value="<?php echo $_POST['id']; ?>">
			<button type="submit" name="start">Start</button>
		</form>
	</div>
</body>
</html>