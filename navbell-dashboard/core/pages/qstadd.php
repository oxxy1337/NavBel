<?php
if ($_SESSION["prof_data"]->isAdmin == false) die(print("<script>alert('Onley Administrator have right to');</script>"));

if (($_SESSION["nbqst"]) > ($_SESSION["nbqstcount"])+1) {
     $_SESSION["nbqstcount"]++;
    $next =$_SESSION["nbqstcount"]+1;
    $buttom = '  <input  name="send" value=" Move to question '.$next.' " type="submit" class="btn btn-primary btn-sm">';
}else{
    $_SESSION["nbqstcount"]++; // for showing 
    $buttom = '<input  name="done" value="Done" type="submit" class="btn btn-primary btn-sm">';
    

}

$qst = $_POST["qst"];
$pts = $_POST["qstpts"];
$time = $_POST["time"];
for($i=1;$i<6;$i++){
    if($_POST["op".$i]=="") break;
$option[$i] = $_POST["op".$i];

}
$true = $_POST["true"];
$chid = $_SESSION["chlng-id"];
if ((isset($_POST["send"])) || isset($_POST["done"]))  {

if (($qst!=="")&&($pts!=="")&&($time!=="")&&($option!==null)&&($true!=="")) {
    ////////////
    // Posting question to api 

    $data = array(
        "question"=>$qst,
        "id"=>$chid,
        "point"=>$pts,
        "time"=>$time

    );
    $qstid = post("qstadd",$data,tooken()); // getting new fetched column id :D interested nah ? 
    $qstid = $qstid->id;
    //////////////
    // Posting Options to api 
    $trueid= array();
    for($i=1;$i<6;$i++){
        if($_POST["op".$i]=="") break;
        
        $data = array(
            "questionid"=>$qstid,
            "trueoption"=>$option[$i],
            "true"=>$option[$true] // Bingoooo 


        );
        
        array_push($trueid,post("optadd",$data,"")); //// hmmm every paradox has a key ;) enjoying hah ? 
        
}

    foreach ($trueid as $key ) {

        if($key->TrueOptionId !== null) { $x = $key ; break;} //// Woah we get the key :D 
    }
    ////////////
    // put the true option id in question :D
    $trueid = $x;
    $ok=post("soluadd",array("opt"=>$trueid->TrueOptionId,"id"=>$qstid),tooken()); // our pardox solved now by gold key :D hahaha 
   
    //////////////
    // if we complete challenge creating move to creat new one :D

    if(isset($_POST["done"]) && ($ok->reponse==1) ){
     $_SESSION["nbqstcount"]=null;
     $_SESSION["chlng-id"]=null;
     $_SESSION["nbqst"]=null;
     die(print("<script>alert('Challenge waiting approuvemment of Adminstrator');window.location.replace('?page=chlngadd');</script>"));
    }
    
}
else{
    echo "<script>alert('Fields are empty');</script>";
}
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
                                                    <label for="textarea-input" class=" form-control-label">Question</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <textarea name="qst" id="textarea-input" rows="6" placeholder="QUESTION CONTENT" class="form-control"></textarea>
                                       
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
                                                    <label for="text-input" class=" form-control-label">Question Time : </label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="text-input" name="time" placeholder="" class="form-control">
                                                    <small class="form-text text-muted">Please put Question Time</small>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="file-multiple-input" class=" form-control-label">Question Options : </label>
                                                </div>
                                                 <div class="col-12 col-md-9">
                                                    <input type="text" id="text-input" name="op1" placeholder="Option 1 " class="form-control">
                                                    <input type="text" id="text-input" name="op2" placeholder="Option 2" class="form-control">
                                                    <input type="text" id="text-input" name="op3" placeholder="Option 3 " class="form-control">
                                                    <input type="text" id="text-input" name="op4" placeholder="Option 4 " class="form-control">
                                                    <input type="text" id="text-input" name="op5" placeholder="Option 5 " class="form-control">
                                                    <small class="form-text text-muted">Please Enter your Question options</small>
                                                </div>
                                            </div>
                                           <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="select" class=" form-control-label">True Option</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <select name="true" id="select" class="form-control">
                                                        <option value="0">Please select</option>
                                                        <option value="1">Option 1 </option>
                                                        <option value="2">Option 2</option>
                                                        <option value="3">Option 3</option>
                                                        <option value="4">Option 4</option>
                                                        <option value="5">Option 5</option>
                                                    </select>
                                                </div>
                                            </div>
                                                
                                            
              
                                                
                                            </div>
                                            
                                            
                                         
                                            </div>
                                            

                                            
                                        
                                    </div>
                                    <div class="card-footer">

                                      <?php
                                        echo $buttom;
                                      ?>
                                            
                                        </input>
                                        <button type="reset" class="btn btn-danger btn-sm">
                                            <i class="fa fa-ban"></i> Reset
                                        </button>
                                    </div>
                                </div>
                                </form>
