<?php

 
// get database connection
include_once './api/con.php';
 
// instantiate student object
include_once './object/tables.php';
 
$database = new Database();
$db = $database->getConnection();
 
$student = new student($db);
 

$data =file_get_contents('php://input'); // or whatever json data

$data =preg_replace('/("(.*?)"|(\w+))(\s*:\s*(".*?"|.))/s','"$2$3"$4',$data);

//$data=preg_replace('/\s(\w+)\s/i', '"$1"', $data);

//$data=preg_replace('/("(.*?)"|(\w+))(\s*:\s*)\+?(0+(?=\d))?(".*?"|.)/s','"$2$3"$4$6',$data);
//echo $data ;
//system('echo "'.$data.'" >> c.txt');

$data = json_decode($data);
//echo "$data->level";

// make sure data is not empty  
if(
    !empty($data->name) &&
    !empty($data->email) &&
    !empty($data->password) &&
    !empty($data->picture) &&
    !empty($data->date) &&
    !empty($data->year)
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