<?php
	// notice that null means an object
 	// $user_info = '
	 // 	{
	 // 		"id" : "170",
	 // 		"fname" : "moussa",
	 // 		"lname" : "khodja",
	 // 		"email" : "m.khodja@esi-sba.dz",
	 // 		"picture" : "",
	 // 		"date" : "2019/04/10 09:33:35",
	 // 		"nbsolved" : "27",
	 // 		"point" : "1075",
	 // 		"currentrank" : null, 
	 // 		"solvedperday" : "27",
	 // 		"ranks" : null,
	 // 		"year" : "2",
	 // 		"reponse" : 1,
	 // 		"ispublic" : 1
	 // 	}	
 	// ';
 	// $user_info = json_decode($user_info);

	session_start();
	$user_profile_info = $_SESSION['user_profile_info'];
?>