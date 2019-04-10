<?php
/*
coded by m.slamat
*/
$arr = file_get_contents('php://input');
$arr = json_decode($arr);
$userid = filter($arr->id);

	
foreach($arr->challenges as $challenge) {
	$questionid = $challenge->questionid;
	$option = $challenge->optionid;
	$realoption = $glob->grab('questions','opt','id',$questionid);
	$out = array();
	$out["finalresult"]=array();

	if($realoption == $option){
		// now lets feed the user some point : )  ++ 
		$qstpoint = $glob->grab('questions','point','id',$questionid);
		$usrpoint = $glob->grab('users','point','id',$userid);
		$solvedperday= $glob->grab('users','solvedperday','id',$userid);
		$nbsolved= $glob->grab('users','nbsolved','id',$userid);
		$win = $qstpoint;
		$solvedperday++; // increment the question solved by user / per day  in db  
		$nbsolved++; // increment all nb qst solved by user 
		$point = $usrpoint + $qstpoint; // adding point a777 rba7 :D 
		// passing new values
		$glob->id = $userid;
		$glob->point = $point;
		$glob->nbsolved = $nbsolved;
		$glob->solvedperday = $solvedperday;
		/// time to update user tab : ) 
		if($glob->updateifsolved()) $out["reponse"]=1;  else $out["reponse"]=-1; 

		///
	}
	//// Hmmmmmmmmmmmmmm user is a Looooser  hhhhhh :v 
	else{
		$win = 0; 
	}
	$mouh = array("id"=>$questionid,"win"=>$win);
	array_push($out["finalresult"],$mouh);
	echo json_encode($out);

}

?>