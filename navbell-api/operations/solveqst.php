<?php
/*
coded by m.slamat
*/
$arr = file_get_contents('php://input');
$arr = json_decode($arr);
$userid = filter($arr->id);
$challengeid = filter($arr->challengeid);
$solvedperday= $glob->grab('users','solvedperday','id',$userid);
$nbsolved= $glob->grab('users','nbsolved','id',$userid);
$chlngpts = $glob->grab('challenges','point','id',$challengeid);
$module = $glob->grab('challenges','module','id',$challengeid);
//$timeperc = filter($arr->time);

//$fulltime = $glob->grab('challenges','time','id',$challengeid); app will get full time not me
$challengepts =  $glob->grab('challenges','point','id',$challengeid);
$out = array();
//$out["finalresult"]=array();
//// range of etudiant
$cheaterz = 10;
$elite = 50 ; 
$bonus = 10;
$elistebonus = 0;
$win = 0;
//$timeperc = ( $time * 100 ) / $fulltime ; app will calculate per 
/*
// cheaterz :) 
if($timeperc <= $cheaterz) {
	$glob->challengeid = $challengeid ;
	$glob->id= $userid ;
	$glob->date = $date; 
	$glob->ip = $ip;
	$glob->bannethecheater(); 
	die(json_encode(array('reponse' =>  -2)));
};
*/
// time effect :) 
/*
if(($timeperc>=70)&&($timeperc <80)){
	$eff = -((40 * 100)/$challengepts);
}elseif (($timeperc>=80)&&($timeperc <90)) {
	$eff = - ((60 * 100)/$challengepts);
}elseif (($timeperc>=90)&&($timeperc <100)) {
	$eff = - ((80 * 100)/$challengepts);
}*/
// elite people :) (bonus)
//if(($timeperc > $cheaterz) && ($timeperc <= $elite )) $elistebonus = ($bonus *100) / $challengepts;


/// consume  data 
foreach($arr->challenges as $challenge) {
	$questionid = $challenge->questionid;
	$option = $challenge->optionid;
	$realoption = $glob->grab('questions','opt','id',$questionid);
	$qstpoint = $glob->grab('questions','point','id',$questionid);
	$time=(boolean)$challenge->time;
	if(($realoption == $option) && (($time == true))) {
		// now lets feed the user some point : )  ++ 

		$win = $qstpoint;
		//$totalwin +=$win; 
		$solvedperday++; // increment the question solved by user / per day  in db  
		
		$point += $qstpoint  ;// adding point a777 rba7 :D 

	}
	//// Hmmmmmmmmmmmmmm user is a Looooser  hhhhhh :v 
	else{
		$win = 0; 
	}
	// output
	//$mouh = array("id"=>$questionid,"win"=>$win); not needed 
	//array_push($out["finalresult"],$mouh); not needed 


}
// passing new values
/////////


	/// We hate who are not serious in our challenge those who solve <70% of pts and get out 
	
	if (((int)(69*$chlngpts/100)) > $point) {
		$point = 0;
		$nbsolved = 0;
		$solvedperday = 0; 
	}else{
		$glob->id = $userid;
		$glob->challengeid = $challengeid;
		$glob->point = $point ;
		$glob->chlngpts = $chlngpts;
		$glob->mdl = $module;
		$nbsolved +=1; 
		$glob->solvedChlng();

	}


	$usrpoint = $glob->grab('users','point','id',$userid);
	
	$glob->point = (int)($usrpoint+$point);
	$glob->nbsolved = $nbsolved;
	$glob->solvedperday = $solvedperday;

	/// time to update user tab : )
	
	if($glob->updateifsolved()) $out["reponse"]=1;  else $out["reponse"]=-1; 
	$out["totalwin"] = (int)($point);
	//$out["playerpoint"] = $glob->grab('users','point','id',$userid); not needed 
	echo json_encode($out);

?>