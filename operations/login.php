<?php
include("./api/con.php");
$database = new Database();
$db = $database->getConnection();
$email=$_GET['email'];
$pwd=$_GET['password'];
if(grab($db,'users','password','email',$email)==$pwd){
echo json_encode(array("name"=>grab($db,'users','password','email',$email),
					  "email"=>grab($db,'users','email','email',$email),
					  "picture"=>grab($db,'users','picture','email',$email),
					  "date"=>grab($db,'users','date','email',$email),
					  "year"=>grab($db,'users','year','email',$email),
					  "point"=>grab($db,'users','point','email',$email),
					  "qsolved"=>grab($db,'users','qsolved','email',$email),
					  "level"=>grab($db,'users','level','email',$email)));




} else {echo "{}";};


						
?>