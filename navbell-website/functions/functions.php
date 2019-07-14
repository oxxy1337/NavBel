<?php
$url = "http://23.101.131.75:2019/";
// sending requests to API 
function tooken(){
       $key = "team7";
       $time = (int)(time()/60);//get time in minute from 1970
       $string = md5($time);//hashing
       $key = hash('sha256', $time.$key);//creating our key
       $secret = hash_hmac('sha256', $string, $key);//final hash using sha-256 algorithm
       return $secret; 
   }
function postapi($url,$op,$data){
	$url = $url."/"."?"."op=".$op."&tooken=".tooken();
	$data = json_encode($data);
	$opt = array(
        'http' => array(
            'method' => 'POST',
            'header' => 'Content-type: application/x-www-form-urlencoded',
            'content' => $data
            )
        );
    $context = stream_context_create($opt);
    $result = file_get_contents($url, false, $context);
    $result = json_decode($result);
    return $result;
}

// function check is allowed or no (sec)
function allowinc(){
    return true;
	if ($flag != 1337) return false;
}
// function validate tooken 

?>