<?php
/*
coded by m.slamat
*/
$glob->id=$id;
$glob->challengeid=$challengeid;
if($glob->trychallenge()) echo json_encode(array("reponse"=>1)); else echo json_encode(array("reponse"=>1));
