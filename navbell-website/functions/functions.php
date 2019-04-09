<?php
$url = "http://35.203.0.205:2019/";
// sending requests to API 
function postapi($url,$op,$data){
	$url = $url."/"."?"."op=".$op;
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
	if ($flag != 1337) return false;
}
?>