<?php
$data = array("email"=>base64_decode($_GET["email"]));
$data=post("userinfo","admins",$data,tooken());
$ranks=json_decode($data->data->ranks);


$arr = array(
        "chart" => array(
            "caption" => "User rank ",
            "yaxisname"=> "Rank (1 = 3 challenges solved)",
            "subcaption"=> "Last 15 days",
		    "numbersuffix"=> "",
		    "rotatelabels"=>"1",
		    "setadaptiveymin"=> "1",
		    "theme"=> "fusion"
  
        )
    );
$arrData = array();
$i=1;
foreach ($ranks as $rank) {
	$today=date('D');
	$mins = 15 - $i;
	$day = date('D', strtotime("$today - $mins days"));
	if($mins == 0) $day = "TODAY";
	array_push($arrData, array($day,$rank));
	$i++;
}
 $arrLabelValueData = array();

// Pushing labels and values
for($i = 0; $i < count($arrData); $i++) {
	array_push($arrLabelValueData, array(
	"label" => $arrData[$i][0], "value" => $arrData[$i][1]));
    }
$arr["data"] = $arrLabelValueData;
$json = json_encode($arr);
print_r($json);
$Ranks= new FusionCharts("line", "ex1", "100%", 400, "b1", "json", $json);

?>

<div class="au-card m-b-30">
<div>

<div class="table-responsive table--no-card m-b-30">
<table class="table table-borderless table-striped table-earning">
<thead>
<tr>
<th>Picture</th>
<th>Full Name</th>
<th>Subscription Date</th>
<th>Challenge Solved</th>
<th>Point</th>
<th>Award taken</th>
</tr>
</thead>
<tbody>
<td>
<div class="avatar">
<img src="<?php echo $data->data->picture?>" >
</div>
</td>
<td><?php echo $data->data->fname." ".$data->data->lname ;?></td>
<td><?php echo $data->data->date;?></td>
<td><?php echo $data->data->nbsolved;?></td>
<td><?php echo $data->data->point;?></td>
<td><?php echo $data->data->naward;?></td>
</tbody>
</table>
</div>
</div>




<div class="au-card m-b-30">
<div id="b1"></div>
</div>
</div>
<?php
$Ranks->render();
?> 
</div></div>
