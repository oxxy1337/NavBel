<?php
$d = array(
	"users"=>$admin->countStudent(),
	"alladm"=>$admin->countEnseignant(),
	"challenges"=>$admin->countChallenges(),
	"rewards"=>$admin->countRewards(),
	"provedchallenges"=>$admin->countProvedchallenge(),
	"allstudents"=>$admin->countAllusers(),
	"administrators"=>$admin->countAdminstrators()

);
echo json_encode($d);
?>