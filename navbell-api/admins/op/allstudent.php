<?php

if ($admin->getAllStduent() !== 0 ) {
	$d = $admin->getAllStduent();
	$d["reponse"] = 1 ;

}else{
	$d["reponse"] = 0; 
}
echo json_encode($d);
?>