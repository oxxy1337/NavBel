<?php
/*
coded by m.slamat
*/
// this operation add userid & challengeid in trychallenge , so next time user can't play this challenge 
$glob->id=$id;
$glob->challengeid=$challengeid;
// chack if challenge aviable in challenge list 
if ($glob->check("challenges","id",$challengeid)==false) die(json_encode(array("reponse"=>-1)));
// insert in trychallenge table 
if($glob->trychallenge()) echo json_encode(array("reponse"=>1)); else echo json_encode(array("reponse"=>-1));
