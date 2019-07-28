<?php
$data = file_get_contents("php://input");
$data = json_decode($data);


$admin->description = $data->desc;
$admin->image = upimg($data->image);
$admin->html = cryptdata($data->html,"flym1nd");
$admin->point=$data->point;


if ($admin->insrReward() !==0) {
	$d["reponse"] = 1;
	//$d["url"] = $admin->image  ;

}else{
	$d["reponse"] = 0;
}

echo json_encode($d);
?>