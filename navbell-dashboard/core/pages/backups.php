<?php

if ($_SESSION["prof_data"]->isAdmin != 1) die("Only Director have right to");


?>


            <!-- MAIN CONTENT-->
         <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                         <h1 class="title-5 m-b-35">Backup System</h1>
                        <div class="row">

                                <!-- DATA TABLE -->
                               
                            
                                <div class="table-data__tool">

                                
                                <div class="table-responsive table-responsive-data2">
                                    <table class="table table-data2">
                                        <thead>
                                            <tr>
                                                <th>Download File</th>
                                                <th>File Size</th>
                                                <th>Download Database</th>
                                                <th>Database Size</th> 
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="tr-shadow">

 <?php

  echo  showBackups(
        "http://23.101.131.75/",
        getBackup("http://23.101.131.75/backups/db/","mohamed","flym1nd")
        ,"mohamed","flym1nd");

?>

                                            
                                           
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                          
<!-- end document-->
