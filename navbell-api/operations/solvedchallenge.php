<?php
$glob->id = $id;
$arr = $glob->solvedChallenges();

if ($arr["data"] !== []) {
	$arr2 = array();
	$arr2["data"]=array();
	foreach ($arr["data"] as $chall) {
		$chall["image"] = $glob->grab("challenges","url","id",$chall["challengeid"]);
		array_push($arr2["data"], $chall);

	}
	$arr2["reponse"] = 1;
	echo json_encode($arr2);
}else{
	echo json_encode(array("reponse"=>0));
}

?>