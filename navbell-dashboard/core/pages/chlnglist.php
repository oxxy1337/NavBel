<?php
/*******************************************/
/* challenge tables controle only by Root :) 
/*******************************************/
// lets check if is really have right to ... u know !  
//error_reporting(0);
if ($_SESSION["prof_data"]->isAdmin != 1) die("Only Director have right to delete or accept challenges :) ");


?>


            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                         <h1 class="title-5 m-b-35">Challenge List</h1>
                         <h3 class="title-5 m-b-35">Filter</h3>
                        <div class="row">

                                <!-- DATA TABLE -->
                               
                            
                                <div class="table-data__tool">
                                    <div class="table-data__tool-left">
                                        <div class="rs-select2--light rs-select2--md">
                                             <select  class="js-select2"  id="career" onchange="location = this.value;">
        <option value="?page=chlnglist" selected> BY YEAR </option>
        <option value="?page=chlnglist&order=1">1 CP</option>
        <option value="?page=chlnglist&order=2">2 CP</option>
          <option value="?page=chlnglist&order=3">1 CS</option>
            <option value="?page=chlnglist&order=2">2 CS</option>
              <option value="?page=chlnglist&order=2">3 CS</option>
    </select>
                                            <div class="dropDownSelect2"></div>
                                        </div>
                                        
                                        </div>
                                    </div>

                                </div> 
                                
                                <div class="table-responsive table-responsive-data2">
                                    <table class="table table-data2">
                                        <thead>
                                            <tr>
                                               
                                                <th>Module</th>
                                                <th>Enseignant</th>
                                                <th>Year</th>
                                                <th>Description</th>
                                                <th>Number of questions</th>
                                                <th>Date</th>
                                                <th>Solved By</th>
                                                <th>Point</th>
                                                <th>Status</th>

                                                <th>Operations</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="tr-shadow">

 <?php
 /****************************/
/* Delete or approuve challenge :D 
/****************************/

if ($_GET["op"] == "delete") {
    $data = array("id"=>$_GET["id"]);
    
    post("chlng-dl","admins",$data,tooken());
    
}elseif ($_GET["op"] == "aprove") {
    $data = array("id"=>$_GET["id"]);
    $ok=post("chlng-ap","admins",$data,tooken());
    
        sendNotification(
        "New Challenge in" .$ok->data->module,
        "Created by " .$ok->data->createdby,
        
        $ok->data->year,
        "AAAA6o-YQpI:APA91bHlhSVPqF3wEyxg6Vf9YEqSlghGIIptZjWHWdf-ybUa5mWMCP8bsUZACRFrUdLmQ5yd1zHUUy0hITSFWownUVL4gcY8fUp6nG0k9dHSlAJgpHGgJ6KCCpCD6FqyocrJ5RrHbqmo"
    );
  
    
}
/**********************************/
/* SHOW CHALLENGES TABLE           */ 
/**********************************/
$data = post("getchlng","admins","",tooken());

print showChallengesToRoot($data,$_GET["order"]);


?>

                                            
                                           
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                          
<!-- end document-->
