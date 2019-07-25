<?php
if ($_SESSION["prof_data"]->isAdmin == false) die(print("<script>alert('Onley Administrator have right to');</script>"));
?>

<?php
$name = $_SESSION["prof_data"]->fname;
$email = $_SESSION["prof_data"]->email;
$image = $_SESSION["prof_data"]->image;
$module = $_SESSION["prof_data"]->Module;
$id = $_SESSION["prof_data"]->id;
?>
<center>
	<br><br><br><br><br><br><br><br>
<div class="col-lg-6">
<div class="card">
<div class="card-header">Change Profile Information</div>
<div class="card-body card-block">
<form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
<div class="form-group">
<div class="input-group">
<input id="username2" name="name" value="<?php  echo $name ; ?>" class="form-control" type="text">
<div class="input-group-addon">
<i class="fa fa-user"></i>
</div>
</div>
</div>
<div class="form-group">
<div class="input-group">
<input id="email2" name="email" value="<?php echo $email ; ?>" placeholder="Email" class="form-control" type="email">
<div class="input-group-addon">
 <i class="fa fa-envelope"></i>
</div>
</div>
</div>

<div class="form-group">
<div class="input-group">
<input id="email2" name="module" value="<?php echo $module ; ?>" placeholder="Module" class="form-control" type="text">

</div>
</div>
<div class="form-group">
<div class="input-group">
<input id="password2" name="password" placeholder="Password" class="form-control" type="password">
<div class="input-group-addon">
<i class="fa fa-asterisk"></i>
</div>
</div>

</div>
<div class="form-group">
<div class="input-group">
<input id="password2" name="password2" placeholder="Confirme Password " class="form-control" type="password">
<div class="input-group-addon">
<i class="fa fa-asterisk"></i>
</div>
</div>
</div>

 Change Image : <input type="file" id="file-input" name="image" height="50" width="75">
<img src="<?php echo $image ; ?>" >
</div>
<div class="form-actions form-group">
<input name="submit" type="submit" class="btn btn-secondary btn-sm" value="Change Profile">
</div>
</form>
</div>
</div>
</div>

<?php
if(!(validateImg($_FILES["image"]))) die(print("
    <script>alert('Image invalide Or image size too big
    ')</script>"));
$img = file_get_contents($_FILES["image"]["tmp_name"]);
$eml = $_POST["email"];
$nme = $_POST["name"];
$module = $_POST["module"];
$pwd1 = $_POST["password"];
$pwd2 = $_POST["password2"];

if (isset($_POST["submit"])) {
	if (($img !== "")&&($eml!== "")&&($nme !== "")&&($module !== "")&&($pwd1 !== "")&&($pwd2 !== "")) {
		if($pwd1 !== $pwd2) die(print("<script>alert('Password missmatch');</script>"));
		if(strlen($pwd1) < 8 ) die(print("<script>alert('Password weak length');</script>"));
		$data = array(
				"image"=>base64_encode($img),
				"fname"=>$nme,
				"module"=>$module,
				"password" =>$pwd1,
				 "email" => $eml,
				 "id" => $id

		);

		$ok = post("settings","admins",$data,tooken());
		if ($ok->reponse == 1) {
			echo "<script>alert('Profile was updated ');</script>";
			unset($_SESSION["logged"]);
			print("<script>window.location.replace('.');</script>");
		}else{
			echo "<script>alert('Error ');</script>";
		}
	}else{
		echo "<script>alert('Fields are empty');</script>";
	}
}
?>