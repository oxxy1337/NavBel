<?php

/**************************************************************/
/* 		CREATING VALIDATE TOOKEN 							
/**************************************************************/

function tooken() {
    $key="team7";
    $time = (int)(time() / 60); // get time in minute from 1/1/1970 
    $string =  md5($time); // hashing
    $key = hash('sha256',$time.$key); // creating our key 
    $secret = hash_hmac('sha256',$string,$key) ; // final hash using sha-256 algorithm
    return $secret; 
}
/*********************************************************************/
/* Lets post our data to my lovely restfull API and see what she say :D 
/* by this function :)  
/**************************************/
function post($op2,$data,$t){
		
		$host = "http://23.101.131.75:2019/" ; // api  127.0.0.1
		//$host = "http://127.0.0.7/project/NavBel/navbell-api/";
		$url = $host."/?tooken=".$t."&op=admins&op2=".$op2;
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

	$modal = '<div  class="btn btn-danger btn-lg active">Unsubscribed</div>';
}else {
	$modal = '

	<div  class="btn btn-success btn-lg active" >Subscribed</div>
	';
}

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
