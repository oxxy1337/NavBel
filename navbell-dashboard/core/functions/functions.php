<?php
/**************************************/
/* Lets post our data to my lovely restfull API and see what she say :D 
/* by this function :)  
/**************************************/
function post($op2,$data,$tooken){
		$host = "http://23.101.131.75:2019/" ; // api  127.0.0.1
		$url = $host."/?tooken=$tooken&op=admins&op2=".$op2;
		$data = json_encode($data);
		$options = array(
		  'http' => array(
		    'method'  => 'POST',
		    'content' => $data,
		    'header'=>  "Content-Type: application/json\r\n" .
		                "Accept: application/json\r\n"
		    )


		);
		$context  = stream_context_create( $options );
		$result = file_get_contents( $url, false, $context );
		$response = json_decode( $result );

		return $response;
}
/*************************************************/
/* ROOT want some controle here he deserve to get all :) 
/**************************************************/
function showChallengesToRoot($data,$y){
	
foreach ($data as $chlng) {
	if ($y == $chlng->year || empty($y) ) {
	
if ($chlng->module == null) break; 
if ($chlng->year <3) $year = "CP" ; else $year = "CS" ;  
if($chlng->isAproved == 1) {
	$icone = '<a href="?page=chlnglist&op=delete&id='.$chlng->id.'" class="item" data-toggle="tooltip" data-placement="top" title="Delete">
		<i class="zmdi zmdi-delete"></i>
		</a>';
	$isaviable = '<span class="status--process">Aviable</span>' ;
}else{
	
	$icone = '<a href="?page=chlnglist&op=aprove&id='.$chlng->id.'" class="item" data-toggle="tooltip" data-placement="top" title="Aprove">
			<i class="zmdi zmdi-mail-send"></i>
			</a>';
	$isaviable = '<span class="status--denied">Denied</span>' ;
}
// 148
$html .='

<td>
<span class="block-email">'.$chlng->module.'</span>
</td>
<td>
'.$chlng->createdby.'
</td>
<td class="desc">'.$chlng->year.' <small>'.$year.'</small></td>
<td>'.substr($chlng->story, 0,120).'  . . . .
<td>
'.$chlng->nbOfQuestions.'
</td>
<td>'.$chlng->date.'</td>
<td>'.$chlng->nbPersonSolved.'</td>
<td class="desc">'.$chlng->point.'</td>
<td>
'.$isaviable .'
</td>
<td>
<div class="table-data-feature">

'.$icone.'


</div>
</td>
</tr>';

} 
}
return $html;
}
?>
