<?php
?>
<center>
	<br><br><br><br><br><br><br><br>
	<form action="" method="post" class="form-horizontal">
<div class="col-lg-6">
<div class="card">
<div class="card-header">
<strong>Add Students </strong>
</div>

  
<div class="row form-group"> 
<div class="col col-md-3">
<label for="textarea-input" class=" form-control-label">Students List :</label>
</div>
<div class="col-12 col-md-9">
<textarea name="all" id="textarea-input" rows="9" placeholder="email lastname firstname year" class="form-control"></textarea>
</div>
</div>

</div>
<div class="card-footer">
<input name="submt" value=" Submit" type="submit" class="btn btn-primary btn-sm">
</form>
</button>
<button type="reset" class="btn btn-danger btn-sm">
<i class="fa fa-ban"></i> Reset
</button>
</div>
</div>
</div>
</center>
<?php
$data = $_POST["all"];
if (isset($_POST["submt"])) {
		
	$tab_new_line=explode(PHP_EOL, $data);
	if (sizeof($tab_new_line) > 100 ) { 
		die("<script>alert('Student List are too big ! ');</script>"); // i wont to burn my server xD 
	}else{
		foreach ($tab_new_line as $line) {
			$i+=1;
			$user = preg_split('/[\s]+/', $line); // get user info  y exploding space
			if (sizeof($user) > 5) die("<script>alert('Respect format ! : email lastname firstname year');</script>");
			$data = array(
					"email"=>$user[0],
					"lname"=>$user[1],
					"fname"=>$user[2],
					"year" =>$user[3]
				);
		$ok = post("addstudent",$data,"");
		if($ok->reponse == 0 ) die(print("<script>alert('".$user[0]." Etudiant add ERROR');</script>"));

		}
		echo "<script>alert('".$i." Etudiant added to Esi NavBel System');</script>";
	}
}

?>