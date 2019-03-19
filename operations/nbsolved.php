<?php
/*
coded by m.slamat
*/

// this op  return nbsolved of each challenge 

if($glob->check("challenges","id",$id) !== false) $data = array("reponse"=>1,"nbPersonSolved"=>$glob->grab("challenges","nbPersonSolved","id",$id));
	else $data = array("reponse"=>-1);

print json_encode($data) ;