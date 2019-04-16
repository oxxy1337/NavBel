<?php
/*
coded by m.slamat
*/
$arr = file_get_contents('php://input');
$arr = json_decode($arr);
$userid = filter($arr->id);
$time = filter($arr->time);
$challengeid = filter($arr->challengeid);
$fulltime = $glob->grab('challenges','time','id',$challengeid);
$challengepts =  $glob->grab('challenges','point','id',$challengeid);
$out = array();
$out["finalresult"]=array();
//// range of etudiant
$cheaterz = 10;
$elite = 50 ; 
$bonus = 1;
$elistebonus = 0;
$win = 0;
$timeperc = ( $time * 100 ) / $fulltime ; 
// cheaterz :) 
if($timeperc <= $cheaterz) {
	$glob->challengeid = $challengeid ;
	$glob->id= $userid ;
	$glob->date = $date; 
	$glob->ip = $ip;
	$glob->bannethecheater(); 
	die(json_encode(array('reponse' =>  0)));
};
// elite people :) (bonus)
if(($timeperc > $cheaterz) && ($timeperc <= $elite )) $elistebonus = ($bonus *100) / $challengepts;
echo $elistebonus;
foreach($arr->challenges as $challenge) {
	$questionid = $challenge->questionid;
	$option = $challenge->optionid;
	$realoption = $glob->grab('questions','opt','id',$questionid);
	

	if(($realoption == $option) && (!($timeperc >= 100))) {
		// now lets feed the user some point : )  ++ 
		$qstpoint = $glob->grab('questions','point','id',$questionid);
		$usrpoint = $glob->grab('users','point','id',$userid);
		$solvedperday= $glob->grab('users','solvedperday','id',$userid);
		$nbsolved= $glob->grab('users','nbsolved','id',$userid);
		$win = $qstpoint;
		$totalwin +=$win; 
		$solvedperday++; // increment the question solved by user / per day  in db  
		$nbsolved++; // increment all nb qst solved by user 
		$point = $usrpoint + $qstpoint +$elistebonus; // adding point a777 rba7 :D 
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


}
	$out["totalwin"] = $totalwin;
	$out["playerpoint"] = $glob->grab('users','point','id',$userid);

	echo json_encode($out);

?>