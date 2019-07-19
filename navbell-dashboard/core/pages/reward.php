<?php
?>
<div class="main-content">
<div class="section__content section__content--p30">
<div class="container-fluid">
    <h1 class="title-5 m-b-35">Add Reward </h1>
<center>
    <div class="col-lg-6">
<div class="card">
<div class="card-header">Reward Informations</div>
<div class="card-body">
<div class="card-title">
<i class="fas fa-calendar-alt"></i>&nbsp;</div>
<hr>
<form  enctype="multipart/form-data"  action="" method="post" novalidate="novalidate">
<div class="form-group">
<label for="cc-payment" class="control-label mb-1">Description</label>
<textarea  rows="3"  id="cc-pament" name="description" type="text" class="form-control" aria-required="true" aria-invalid="false"></textarea>
</div>
<div class="form-group has-success">
<label for="cc-name" class="control-label mb-1">Point</label>
<input id="cc-name" name="point" type="text" aria-required="true"   class="form-control cc-name valid" data-val="true" data-val-required="Please enter REawrd Point" autocomplete="cc-name" aria-required="true" aria-invalid="false" aria-describedby="cc-name-error">
<span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
</div>


<div class="form-group">
<label for="cc-exp" class="control-label mb-1">Reward Data (html) </label>
<textarea rows="5" name="html" id="html">&lt;p&gt;Reward Content.&lt;/p&gt;</textarea>
<script>
 CKEDITOR.replace( 'html');
</script>

</div></div>
 <div class="row form-group">
 <div class="col col-md-3">
<label for="file-input" class=" form-control-label">Reward Image </label></div>
<div class="col-12 col-md-9">
<input type="file" id="file-input"  name="image" class="form-control-file">
</div>
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
$image = $_FILES["image"]["tmp_name"];
$point = $_POST["point"];
$desc = $_POST["description"];

if (isset($_POST["submit"])) {
	if (($html!=="")&&($image!=="")&&($point!=="")&&($desc!=="")) {
		$data = array(
			"html"=>$html,
			"desc"=>$desc,
			"point"=>$point,
			"image"=>base64_encode($image)
		);
		$ok = post("insrReward",$data,"");
		if ($ok->reponse==1) {
			echo "<script>alert('REward sent to db');</script>";
		}else{
			echo "<script>alert('Connexion error');</script>";
		}
	}else{
		echo "<script>alert('Fields are empty');</script>";
	}
}

?>
    