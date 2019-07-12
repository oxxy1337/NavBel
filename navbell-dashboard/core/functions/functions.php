<?php
/**************************************/
/* Lets post our data to my lovely restfull API and see what she say :D 
/* by this function :)  
/**************************************/
function post($op2,$data,$tooken){
		$host = "http://23.101.131.75:2019/" ; // api  127.0.0.1
		//$host = "http://127.0.0.7/project/NavBel/navbell-api/";
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
   /************************************************/
   /* 	Function to show table of challenge 	   */
   /************************************************/
function showChallengesToRoot($data,$y){
$html= "";	
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


	/************************************************/
   /*Function to show table of AllStudents 	        */
   /************************************************/
function showAllStudentToRoot($d,$y){
	
foreach ($d as $data) {
	if ($y == $data->year || empty($y) ) {
	
if ($data->fname == null) break; 
if ($data->year <3) $year = "CP" ; else $year = "CS" ;  
$icone = '<a href="?page=allstudent&op=delete&email='.$data->email.'" class="item" data-toggle="tooltip" data-placement="top" title="Delete">
		<i class="zmdi zmdi-delete"></i>
		</a>';

$x=post("userinfo",array("email"=>$data->email),"");

if($x->isSub !== 1){

	$modal = '<button type="button" class="btn btn-danger btn-lg active">Unsubscribe</button>';
}else {
	$modal = '

	<a href="?page=allstudent&userinfo=1" type="button" class="btn btn-success btn-lg active" data-toggle="modal" data-target="#smallmodal">
	Subscribed
	</a>
	';
}

$userinfo = '<div class="modal fade show" id="mediumModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" style="display: block;">
<div class="modal-dialog modal-lg" role="document">
<br><br><br><br><br>
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title" id="mediumModalLabel">'.$x->data->lname.' '.$x->data->fname.'</h5>
<a href="?page=allstudent" type="button" class="close" data-dismiss="modal" aria-label="Close"></a>
<span aria-hidden="true">×</span>
</button>
</div>
<div class="modal-body">
		<p>Date of inscription : '.$x->data->date.' </p>
 		<p>Point : '.$x->data->point.' </p>
 		<p>Challenge Solved : '.$x->data->nbsolved.'</p> 
 		<p>Picture :  </p><p> <img src = "'.$x->data->picture.'"  width="120" height="60" > </p>

</div>
<div class="modal-footer">

</div>
</div>
</div>
</div>
	

	
	




';
if ($_GET["userinfo"] == 1) print($userinfo);


// 148
$html .='
<td>'.$data->fname.'</td>
<td>'.$data->lname.' </td>
<td>'.$data->email.' </td>
<td>'.$data->year.' '.$year.'</td>
<td>'.$modal. ' </td>
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
