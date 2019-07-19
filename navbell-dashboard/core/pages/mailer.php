<?php

?>

<?php
?>
<div class="main-content">
<div class="section__content section__content--p30">
<div class="container-fluid">
    <h1 class="title-5 m-b-35">Send Mails </h1>
<center>
    <div class="col-lg-6">
<div class="card">
<div class="card-header">Mail Informations</div>
<div class="card-body">
<div class="card-title">
 <i class="fa fa-envelope"></i>&nbsp;</div>
<hr>
<form  enctype="multipart/form-data"  action="" method="post" novalidate="novalidate">
<div class="form-group">
<label for="cc-payment" class="control-label mb-1">Subject : </label>
<input  name="subject" type="text" class="form-control"></input>
</div>
<div class="form-group has-success">
<label for="cc-name" class="control-label mb-1">To : </label>
<select name="to" id="select" class="form-control">
<option value="0">Please select</option>
<option value="1">Administration</option>
<option value="2">Students</option>
</select>
</div>


<div class="form-group">
<label for="cc-exp" class="control-label mb-1">Mail (html) </label>
<textarea rows="8" name="html" id="html">&lt;p&gt;Email.&lt;/p&gt;</textarea>
<script>
 CKEDITOR.replace( 'html');
</script>

</div></div>

 </div>
<input name="submit" value="SEND" id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">

<span id="payment-button-sending" style="display:none;">Sending…</span>
</input>
</div>
</form>
</div>
</div>
</div>
</center>

<?php
$html = $_POST["html"];

$subject = $_POST["subject"];
$to = $_POST["to"];
if (isset($_POST["submit"])) {
	if (($html!=="")&&($to!=="")&&($subject!=="")) {
		$data = array(
			"email"=>$_SESSION["prof_data"]->email,
			"name"=>$_SESSION["prof_data"]->fname,
			"html"=>$html,
			"subject"=>$subject,
			"to"=>$to	
		);
		$ok = post("sndMails",$data,tooken());
		print_r($ok);
		if ($ok->reponse==1) {
			echo '<script>alert("'.$ok->n.' Message Sent");</script>';
		}else{
			echo "<script>alert('Connexion error');</script>";
		}
	}else{
		echo "<script>alert('Fields are empty');</script>";
	}
}

?>
