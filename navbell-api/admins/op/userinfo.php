<?php

$ok = $glob->check("users","email",$data->email);

if($ok !== false) {
	$admin->email = $data->email ;
	$d["isSub"] = 1 ;
	$d["data"] = $admin->userInfo();
	$d["data"]["password"] = "";
	$awards = $glob->sendReward();
	$id = $glob->grab("users","id","email",$data->email);
	$d["data"]["naward"]=0;
	//print_r($awards);
	foreach ($awards["data"] as $award) {
		//echo $award["takenby"];
		if ($award["takenby"] == $id) {
			$d["data"]["naward"] +=1 ;
		}
	}
	

} 
	else $d["isSub"] = 0;
echo json_encode($d);

?>