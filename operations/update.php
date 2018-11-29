<?php
include("./api/con.php");
include("./object/tables.php");
$database = new Database();
$db = $database->getConnection();

$student = new student($db);
//$student = new student($db);
 
// get id of product to be edited

$data =file_get_contents('php://input'); // or whatever json data

$data =preg_replace('/("(.*?)"|(\w+))(\s*:\s*(".*?"|.))/s','"$2$3"$4',$data);

//$data=preg_replace('/\s(\w+)\s/i', '"$1"', $data);

//$data=preg_replace('/("(.*?)"|(\w+))(\s*:\s*)\+?(0+(?=\d))?(".*?"|.)/s','"$2$3"$4$6',$data);
//echo $data ;
//system('echo "'.$data.'" >> c.txt');

$data = json_decode($data);

// set ID property of product to be edited
if(
    !empty($data->name) &&
    !empty($data->email) &&
    !empty($data->password) &&
    !empty($data->picture) &&
    !empty($data->date) &&
    !empty($data->year)
){
	$student->name =  str_replace('"','',$data->name);
    $student->email = str_replace('"','',$data->email);
    $student->password = str_replace('"','',$data->password); 
    $student->picture = str_replace('"','',$data->picture); 
    $student->date = str_replace('"','',$data->date); 
    $student->year = str_replace('"','',$data->year); 
    $student->point = str_replace('"','',$data->point); 
    $student->qsolved = str_replace('"','',$data->qsolved); 
    $student->level = str_replace('"','',$data->level); 

    if($student->update()){
 
    // set response code - 200 ok
    http_response_code(200);
 
    // tell the user
    echo json_encode(array("reponse" => "1"));
}
 
// if unable to update the product, tell the user
else{
 
    // set response code - 503 service unavailable
    http_response_code(503);
 
    // tell the user
    echo json_encode(array("reponse" => "0"));
} } else {
	http_response_code(400);
	echo json_encode(array("reponse" => "0"));}
?>