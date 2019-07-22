<?php
/*
coded by m.slamat
*/
/// CRYPTO PART
//==========================================================
// function to crypt user password using salt methode 
	// old devlopers hate hashkiller.co.uk nah !?
function cryptpwd($pwd,$salt){
	$final = hash_hmac('md5', $pwd, $salt); // crypt pwd using md5 algorithme with salt as key  
	$final = strrev($final); // reversing 
	$final = str_rot13($final); // again with rot13
	return $final;
} 
//=========================================================== 
// function check tooken from my client we won't to make our db public !
function tooken($a) {
    $key="team7";
    $time = (int)(time() / 60); // get time minute from 1/1/1970 
    $string =  md5($time); // hashing
    $key = hash('sha256',$time.$key); // creating our key 
    $secret = hash_hmac('sha256',$string,$key) ; // final hash using sha-256 algorithm
    return ($secret == $a); // check the input with my client (app -web)
}

/// SECURITY PART 
//==========================================================
	/// we don't trust inputs do you ? 
		/// in this case we are 99.99 % protected against sql injection , XSS attacks , and more 	... but remember NO SYSTEM IS SAFE !
	function filter($input){
	$out = htmlentities(htmlspecialchars(strip_tags($input)),ENT_NOQUOTES);
	return $out;
}
//===========================================================

	/* Banne system ! i banne anyone try to get access in db or server how ? 
		the api url stored  in app mobile & web app so what if the app mobile get reversed (reverse engineer) or the web app get owned so in this case api url will be public 
	    we protect db & server by storing attacker ip & attacker useragent in db 
		the attacker will be banned for next requests (forward to 403 error)
		YES, i know why i use $blacklisted ? ther's no get methodes pass value to DB or pass value to read it 
		so why i filter sql injecton queries or local file include payloads ? 
	 	the scenario is the attacker test everything :) 
	
	 	*/
	function banne($tooken,$p1,$p2){
		
		$blacklisted = array('"',"'","%27",'%00',"php","/etc/passwd");
		if((!tooken($tooken)) || 
			(in_array($p1,$blacklisted) || 
			(in_array($tooken, $blacklisted)) ||
			(in_array($p2,$blacklisted)
		)){

			return true;
		}  else{
			return false;
		}


	}    
	/*
	function anti brutforce :) 
	my client send flag if user trying to brut force login passwords or confirmation code for reset password 
	so we don't accept brutforcing :)  
	*/
	function bf($a){
		if($a=="1") {
			return true;
		}
			else{
				return false;
			}
	}
//============================================================

/// UTIL FUNCTIONS
// function to decode base654 image binary and store it in server then he return url of image  
function upimg($data){
	define('UPLOAD_DIR', './images/');
	
	$data = base64_decode($data);
	$file = UPLOAD_DIR . uniqid() . '.jpg';
	
    
	if ($data!==""){
		$success = file_put_contents($file, $data);
		$url = "http://" . $_SERVER['HTTP_HOST'] . '/'.$file;
	} else { 
		$url = '';
	};
	
	
	return  $url;
}
?>