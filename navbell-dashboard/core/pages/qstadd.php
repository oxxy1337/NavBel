<?php

if ($_SESSION["nbqst"] != $_SESSION["nbqstcount"]) {
	$_SESSION["nbqstcount"]+=1;
}else{
	$_SESSION["nbqstcount"]=0;
	$buttom = "Done";
}
?>
<br><br><br><br><br><br><center>
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-header">
                                        <strong>QUESTION <?php echo $_SESSION["nbqstcount"]; ?></strong> 
                                    </div>
                                    <div class="card-body card-block">
                                        <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                                            <div class="row form-group">
                                                
                                                
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Question : </label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="text-input" name="qst" placeholder="" class="form-control">
                                                    <small class="form-text text-muted">Please Enter your question</small>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Question Point : </label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="text-input" name="qstpts" placeholder="" class="form-control">
                                                    <small class="form-text text-muted">Please put Question point</small>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Options : </label><br>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                	 --------
                                                    <small class="form-text text-muted">Please Enter Question Option</small>
                                                </div>
                                            </div>
                                           <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="select" class=" form-control-label">YEAR</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <select name="year" id="select" class="form-control">
                                                        <option value="0">Please select</option>
                                                        <option value="1">1 CPI</option>
                                                        <option value="2">2 CPI</option>
                                                        <option value="3">1 CS</option>
                                                        <option value="4">2 CS</option>
                                                        <option value="4">3 CS</option>
                                                    </select>
                                                </div>
                                            </div>
                                                
                                            
              
                                                
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="textarea-input" class=" form-control-label">Story</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <textarea name="story" id="textarea-input" rows="9" placeholder="Challenge Description" class="form-control"></textarea>
                                                </div>
                                            </div>
                                            
                                         
                                            </div>
                                            
                                            <div class="row form-group">
                                                <div class="col col-md-3">

                                                    <label for="file-input" class=" form-control-label">Challenge Image </label>
                                                </div>

                                                <div class="col-12 col-md-9">
                                                    <input type="file" id="file-input" 
                                                    name="image" class="form-control-file">

                                                </div>

                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="file-multiple-input" class=" form-control-label">Challenge Courses</label>
                                                </div>
                                                 <div class="col-12 col-md-9">
                                                    <input type="text" id="text-input" name="url1" placeholder="URL 1 " class="form-control">
                                                    <input type="text" id="text-input" name="url2" placeholder="URL 2 " class="form-control">
                                                    <input type="text" id="text-input" name="url3" placeholder="URL 3 " class="form-control">
                                                    <small class="form-text text-muted">Please put challenge Coures (url)</small>
                                                </div>
                                            </div>
                                        
                                    </div>
                                    <div class="card-footer">

                                        <input  name="send" value=" Move to questions" type="submit" class="btn btn-primary btn-sm">
                                            
                                        </input>
                                        <button type="reset" class="btn btn-danger btn-sm">
                                            <i class="fa fa-ban"></i> Reset
                                        </button>
                                    </div>
                                </div>
                                </form>
<script>
$(function() {
  $("#addMore").click(function(e) {
    e.preventDefault();
    $("#fieldList").append("<li>&nbsp;</li>");
    $("#fieldList").append("<li><input type='text' option='option[]' placeholder='Name' /></li>");

  });
});
</script>