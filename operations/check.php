<?php 

include("./api/con.php");
$email=$_GET['email'];
$database = new Database();
$db = $database->getConnection();
if(checkmail($db,'users','email',$email)) {
	echo json_encode(array('reponse'=>'-1'));
} 
else if(checkmail($db,'maillist','mail',$email)) {
	$year=grab($db,'maillist','year','mail',$email);
	echo json_encode(array('reponse'=> $year)); 
}
else { echo json_encode(array('reponse' =>'0')); } ;

?>