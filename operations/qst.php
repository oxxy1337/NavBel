<?php
include_once './api/con.php';
 include_once './api/functions.php';
// instantiate student object
include_once './object/tables.php';
 $yearr= $_GET['year'];
$database = new Database();
$db = $database->getConnection();
echo grabqst($db,'qst',"*",'year',$yearr);