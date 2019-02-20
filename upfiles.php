<?php 

   // error_reporting(E_ALL); ini_set('display_errors', '1');
header("Content-Type: application/json; charset=UTF-8");

include("./api/con.php"); 
include("./object/tables.php");
$database = new Database();
$db= $database -> getConnection();  
$data = file_get_contents('php://input'); //TODO never trust inputs 
file_put_contents('out.txt', $data);
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
	
	return  $url;
};

$picture = upimg($imgdata);
$mouhapi = new student($db);
$mouhapi->id=$data->id;
$mouhapi->name=$data->name;
$mouhapi->email=$data->email;
$mouhapi->password=$data->password;
$mouhapi->picture=$picture;
$mouhapi->date=$data->date;
$mouhapi->year=$data->year;
$mouhapi->point=$data->point;
$mouhapi->qsolved=$data->qsolved;
$mouhapi->level=$data->level;
$reponse = array('reponse'=>$picture);
if($mouhapi->update()) {
	echo json_encode($reponse);
};

?>