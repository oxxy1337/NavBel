<?php
if ($_SESSION["prof_data"]->isAdmin == false) die(print("<script>alert('Onley Administrator have right to');</script>"));
?>

<br><br><br><br><br>
<center>
<div class="col-lg-6">
<div class="card">
<div class="card-header">Add Employer</div>
<div class="card-body card-block">
<form action="" method="post" class="">
<div class="form-group">
<div class="input-group">
<div class="input-group-addon">
<i class="fa fa-user"></i>
</div>
<input id="username" name="fname" placeholder="Full Name" class="form-control" type="text">
</div>
</div>

<div class="form-group">
<div class="input-group">
<div class="input-group-addon">
<i class="fa fa-envelope"></i>
</div>
<input id="email" name="email" placeholder="Email" class="form-control" type="email">
</div>
</div>
<div class="form-group">
<div class="input-group">
<div class="input-group-addon">
<i class="fa fa-asterisk"></i>
</div>
<input id="password" name="password" placeholder="Password" class="form-control" type="password">
</div>
</div>
<div class="row form-group">
<div class="col col-md-3">
<label for="text-input" class=" form-control-label">Role : </label>
 </div>
<div class="col-12 col-md-9">

<select name="role" id="select" class="form-control">
<option value="8">Please select</option>
<option value="1">ADMINISTRATOR</option>
<option value="0">ENSEIGNANT</option>
</select>
 </div>
</div>
<div class="row form-group">
<div class="col col-md-3">
<label for="text-input" class=" form-control-label">Employer Image : </label>
 </div>
<div class="col-12 col-md-9">

<input type="file" id="file-input" 
name="image" class="form-control-file">
<div class="form-actions form-group">
</div></div></div>
	<br><br>
<button type="submit" class="btn btn-success btn-sm">Add Employer</button>
</div>
</form>
</div>
</div>
</div>
</center>
<?php
$fname = $_POST["fname"];
$email = $_POST["email"];
$password = $_POST["password"];
$role = $_POST["role"];
$image =  file_get_contents($_FILES["image"]["tmp_name"]);
if (($fname!=="")&&($email!=="")&&($image!=="")&&($role!=="")&&($password!=="")) {
	if($password<8) die(print("<script>alert('Password too short');</script>"));

	$data = array(
			"fname"=>$fname,
			"email"=>$email,
			"isAdmin"=>$role,
			"password"=>$password,
			"image"=>base64_encode($image);
		);
	$rez = post("addemployer",$data,"");
	if ($rez->reponse==1) {
		echo"<script>alert('".$fname." Added successfully ');</script>";
	}else{
		echo"<script>alert('".$fname." Already exist ');</script>";
	}
}else{
	echo "<script>alert('Fields are empty');</script>";
}
?>