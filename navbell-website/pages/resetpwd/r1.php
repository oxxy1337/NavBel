<?php 

if($_GET['page']=="recover"){

$op = "rcode";
$data = array("email"=>$_POST["email"]);
//$result = postapi($url,$op,$data);

$html = file_get_contents('./pages/resetpwd/html/t1.html');
die $html;
};
?>