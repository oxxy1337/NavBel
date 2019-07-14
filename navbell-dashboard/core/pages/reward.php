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
<h3 class="text-center title-2">REWARD</h3>
</div>
<hr>
<form action="" method="post" novalidate="novalidate">
<div class="form-group">
<label for="cc-payment" class="control-label mb-1">Description</label>
<textarea  rows="9"  id="cc-pament" name="description" type="text" class="form-control" aria-required="true" aria-invalid="false"></textarea>
</div>
<div class="form-group has-success">
<label for="cc-name" class="control-label mb-1">Point</label>
<input id="cc-name" name="point" type="text" aria-required="true"   class="form-control cc-name valid" data-val="true" data-val-required="Please enter REawrd Point" autocomplete="cc-name" aria-required="true" aria-invalid="false" aria-describedby="cc-name-error">
<span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
</div>


<div class="form-group">
<label for="cc-exp" class="control-label mb-1">Reward Data (html) </label>
<textarea rows="5" name="content" id="editor">&lt;p&gt;Reward Content.&lt;/p&gt;</textarea>

    <script>
        ClassicEditor
            .create( document.querySelector( '#editor' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>
</div></div>
 <div class="row form-group">
 <div class="col col-md-3">
<label for="file-input" class=" form-control-label">Reward Image </label></div>
<div class="col-12 col-md-9">
<input type="file" id="file-input"  name="image" class="form-control-file">
</div>
 </div>
<button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
<i class="fa fa-lock fa-lg"></i>&nbsp;
<span id="payment-button-amount">Pay $100.00</span>
<span id="payment-button-sending" style="display:none;">Sending…</span>
</button>
</div>
</form>
</div>
</div>
</div>
</center>
    