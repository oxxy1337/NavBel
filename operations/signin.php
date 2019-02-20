<?php

 
// get database connection
include_once './api/con.php';
 
// instantiate student object
include_once './object/tables.php';
include_once './api/functions.php';

 
$database = new Database();
$db = $database->getConnection();
 
$student = new student($db);
 

$d =file_get_contents('php://input'); // or whatever json data

//if (isMobile()) {
$data = json_decode(preg_replace('/("(.*?)"|(\w+))(\s*:\s*(".*?"|.))/s','"$2$3"$4',$d));/*} else {

//$data=preg_replace('/\s(\w+)\s/i', '"$1"', $data);

//$data=preg_replace('/("(.*?)"|(\w+))(\s*:\s*)\+?(0+(?=\d))?(".*?"|.)/s','"$2$3"$4$6',$data);
//echo $data ;
*/
if (ispc()) {

system("echo  $d > tmp");
$data = json_decode(file_get_contents('./tmp'));
//system("rm tmp");
system("echo  $d > zx.txt");
//echo "$data->level";
};
// make sure data is not empty  
if(1
   /* !empty($data->name) &&
    !empty($data->email) &&
    !empty($data->password) &&
    !empty($data->date) &&
    !empty($data->year)*/
){
 
    // set student property values
    $student->name =  str_replace('"','',$data->name);
    $student->email = str_replace('"','',$data->email);
    $student->password = str_replace('"','',$data->password); 
    $student->picture = str_replace('"','',$data->picture); 
    $student->date = str_replace('"','',$data->date); 
    $student->year = str_replace('"','',$data->year); 
    $student->point = str_replace('"','',$data->point); 
    $student->qsolved = str_replace('"','',$data->qsolved); 
    $student->level = str_replace('"','',$data->level); 

    // create the student
    if($student->create()){
 
        // set response code - 201 created
        http_response_code(201);
 
        // tell the user
        echo json_encode(array('reponse' =>"1"));
    }
 
    // if unable to create the student, tell the user
    else{
 
        // set response code - 503 service unavailable
        http_response_code(503);
 
        // tell the user
       echo json_encode(array('reponse' =>"0"));
    }
}
 
// tell the user data is incomplete
else{
 
    // set response code - 400 bad request
    http_response_code(400);
 
    // tell the user
     echo json_encode(array('reponse' =>"0"));
 }
?>