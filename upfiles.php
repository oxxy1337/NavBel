<?php 

header("Content-Type: application/json; charset=UTF-8");
include("./api/con.php"); 
$database = new Database();
$db= $database -> getConnection();  
$data = file_get_contents('php://input'); //TODO never trust inputs 
$data = json_decode($data);
$imgdata = $data->imgdata;
function upimg($imgdata){
	define('UPLOAD_DIR', 'images/');
	$data=$imgdata;
	$data = base64_decode($data);
	$file = UPLOAD_DIR . uniqid() . '.jpg';
	$success = file_put_contents($file, $data);
    
	if ($success){
		$url = "http://" . $_SERVER['HTTP_HOST'] . '/project/'.$file;
	} else { 
		$url = '0';
	};
	//echo $url;
	$json = array('reponse' => $url);
	$json = json_encode($json);
	
	return  $json;
}

echo upimg($imgdata);
?>