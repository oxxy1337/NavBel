
<br><br><br><br><br><br><center>
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-header">
                                        <strong>ADD CHALLENGE</strong> 
                                    </div>
                                    <div class="card-body card-block">
                                        <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                                            <div class="row form-group">
                                                
                                                
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Module Name</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="text-input" name="mname" placeholder="" value=<?php echo "'".$_SESSION["prof_data"]->Module ."'" ?> class="form-control">
                                                    <small class="form-text text-muted">Please put Module Name</small>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Challenge Point</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="text-input" name="chlngpts" placeholder="" class="form-control">
                                                    <small class="form-text text-muted">Please put challenge point</small>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Number Of Question</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="text-input" name="nbqst" placeholder="" class="form-control">
                                                    <small class="form-text text-muted">Please put Number of question in this challenge</small>
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
         

                                                    <div class="row form-group">
<div class="col col-md-4">
<input name="c1" placeholder="Course 1 Name" class="form-control" type="text">
</div>
<div class="col col-md-8">
<input name="u1" placeholder="URL 1 " class="form-control" type="text">
</div>

</div>
<div class="row form-group">
<div class="col col-md-4">
<input name="c2" placeholder="Course 2 Name" class="form-control" type="text">
</div>
<div class="col col-md-8">
<input name="u2"  placeholder="URL 2" class="form-control" type="text">
</div>

</div>
<div class="row form-group">
<div class="col col-md-4">
<input name="c3" placeholder="Course 3 Name" class="form-control" type="text">
</div>
<div class="col col-md-8">
<input name="u3" placeholder="URL 3" class="form-control" type="text">
</div>

</div>
  

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
<?php
$name = $_POST["mname"];
$story = $_POST["story"];
$chpoint = $_POST["chlngpts"];
$year = $_POST["year"];
$nbqst = $_POST["nbqst"];
@$image = file_get_contents($_FILES["image"]["tmp_name"]);
for($i=1;$i<4;$i++){
    $resource[$i]=$_POST["u".$i];
    $rname[$i] =  $_POST["c".$i];

}


$_SESSION["nbqstcount"]=null;
$_SESSION["chlng-id"]=null;
$_SESSION["nbqst"]=null;
/*********************************************/
/* some logical things here :v 
/**********************************************/
if (isset($_POST["send"])) {
	if (($nbqst !== "")&&($name!=="")&&($story!=="")&&($chpoint!=="")&&($year!=="")&&($image!=="")&&($resource != null)) {
				$res = array();
                    for($i=1;$i<4;$i++){				
				    	array_push($res, array("url"=>$resource[$i],"name"=>$rname[$i])); // data consume array of json for courses
				}

			$data = array(
					"module"=>$name,
					"isAproved"=>0,
					"story"=>$story,
					"date"=>date("Y-m-d h:i:sa"),
					"point"=>$chpoint,
					"createdby"=>$_SESSION["prof_data"]->fname,
					"nbOfQuestions" =>$nbqst,
					"image"=>base64_encode($image),
					"resource"=>$res,
					"year"=>$year


			);
			
			$_SESSION["nbqst"] = $nbqst;
			$api = post("chlng-add","admins",$data,tooken());
			$_SESSION["chlng-id"] = $api->id;
			die(print("<script>window.location.replace('?page=qstadd');</script>"));

				
	}else{

		echo "<script>alert('Fields are empty');</script>";
	}
}





?>