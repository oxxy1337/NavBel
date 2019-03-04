<?php
/*
coded by m.slamat
*/
/// CRYPTO PART
// function to crypt user password using salt methode 
	// old devlopers hate hashkiller nah !?
function cryptpwd($pwd,$salt){
	$final = hash_hmac('md5', $pwd, $salt); // crypt pwd using md5 algorithme with salt as key  
	$final = strrev($final); // reversing 
	$final = str_rot13($final); // again with rot13
	return $final;
}  


/// UTIL FUNCTIONS
// function to decode base654 image binary and store it in server then he return url of image  
function upimg($data){
	define('UPLOAD_DIR', '../images/');
	
	$data = base64_decode($data);
	$file = UPLOAD_DIR . uniqid() . '.jpg';
	$success = file_put_contents($file, $data);
    
	if ($success){
		$url = "http://" . $_SERVER['HTTP_HOST'] . '/project/'.$file;
	} else { 
		$url = '0';
	};
	
	
	return  $url;
}
?>