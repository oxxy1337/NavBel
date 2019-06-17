<?php
/*
coded by m.slamat
*/
// this operation add userid & challengeid in trychallenge , so next time user can't play this challenge 
$glob->id=$id;
$glob->challengeid=$challengeid;
// chack if challenge aviable in challenge list 
if ($glob->checksolv()) die(json_encode(array("reponse"=>-1)));
// insert in trychallenge table 
if($glob->trychallenge()) { 
	echo $glob->soulibychlng();
	 }

	//else echo json_encode(array("reponse"=>-1));
//answers of each chlng