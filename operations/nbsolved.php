<?php
/*
coded by m.slamat
*/

// this op  return nbsolved of each challenge 


$data = array("nbPersonSolved"=>$glob->grab("challenges","nbPersonSolved","id",$id));
	echo json_encode($data);