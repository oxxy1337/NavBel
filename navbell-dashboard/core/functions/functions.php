<?php

/**************************************************************/
/* 		CREATING VALIDATE TOOKEN 							
/**************************************************************/

function tooken() {
    $key="team7";
    $time = (int)(time() / 60); // get time in minute from 1/1/1970 
    $string =  md5($time); // hashing
    $key = hash('sha256',$time.$key); // creating our key 
    $secret = hash_hmac('sha256',$string,$key) ;// final hash using sha-256 algorithm
    return $secret; 
}


/*****************************************/
/* FUNCTION CHECK IF IS VALIDE IMAGE 
/*****************************************/
function validateImg($image){
	$ext = array("jpg","jpeg","gif","png");
	$extimg = explode(".", $image["name"]);
	$isimagebyext = in_array($extimg[1],$ext);
	//$isimage = (exif_imagetype($image["tmp_name"]) !== false ) ;

	$size = (filesize($image["tmp_name"]) < 3000000 ) ; // 3mb 
	//$size = true;
	return ((1)&&($isimagebyext)&&($size));

}
/*********************************************************************/
/* Lets post our data to my lovely restfull API and see what she say :D 
/* by this function :)  
/**************************************/

function post($op2,$op1,$data,$t){	
		$host = "http://23.101.131.75:2019/" ; // api  127.0.0.1
		//$host = "http://127.0.0.7/project/NavBel/navbell-api/";
		$url = $host."/?tooken=".$t."&op=".$op1."&op2=".$op2;
		if ($data == "") $data = array();
		$data["ip"] = getUserIP();
		$data["useragent"] = $_SERVER['HTTP_USER_AGENT'];
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
	/********************************************************************/
	/* 				PUSH NOTIFICATION TO ANDROID DEVICE 
	/********************************************************************/

	function sendNotification(
		$title = "", $body = "",$image="", $topic = "", $serverKey = ""){
	    if(1){
	        $url="https://fcm.googleapis.com/fcm/send";
	        $data = 
	        [
	            "to" => '/topics/'.$topic,
	            "notification" => [
	                "body" => $body,
	                "title" => $title,
	                "image"=>$image
	            ]
	            
	        ];

	        $options = array(
	            'http' => array(
	                'method'  => 'POST',
	                'content' => json_encode( $data ),
	                'header'=>  "Content-Type: application/json\r\n" .
	                            "Accept: application/json\r\n" . 
	                            "Authorization:key=".$serverKey
	            )
	        );

	        $context  = stream_context_create( $options );
	        $result = file_get_contents( $url, false, $context );
	        return json_decode($result);
	    }
	    return false;
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

	$x=post("userinfo","admins",array("email"=>$data->email),tooken());

	if($x->isSub !== 1){

		$modal = '<div  class="btn btn-danger btn-lg active">Unsubscribed</div>';
	}else {
		$modal = '
		<a href="?page=student&email='.base64_encode($data->email).'" class="btn btn-success btn-lg active" >Subscribed</a>
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

	/*****************************************/
	/* FUNCTION TO GET BACKUP DATA FROM SERVER   
	/******************************************/
	function getBackup($server,$username,$password){

	$auth = base64_encode("$username:$password");
	$context = stream_context_create([
	    "http" => [
	        "header" => "Authorization: Basic $auth"
	    ]
	]);
	$hrefs = file_get_contents($server,false,$context);
	preg_match_All("|href=[\"'](.*?)[\"']|", $hrefs, $x);
	return $x;
	}

	/*****************************************/
	/* FUNCTION TO SHOW BACKUPS   
	/******************************************/
	function showBackups($url,$array,$usr,$pwd){
		$data = $array[1];

		$auth = base64_encode("$usr:$pwd");
		stream_context_set_default(
		    array(
		        'http' => array(
		            "header" => "Authorization: Basic $auth"
		        )
		    )
		);
		for($i=5;$i<sizeof($data);$i++){
				$zip = explode('.', $data[$i]);
				$zip = $zip[0].".zip";
				$fileurl = $url.'/backups/files/'.$zip;
				$sqlurl =  $url.'/backups/db/'.$data[$i];
				$head1 = array_change_key_case(get_headers($fileurl, TRUE));
				$filesize = ($head1['content-length'] / (1024*1024) )."MB";
				$head2 = array_change_key_case(get_headers($sqlurl, TRUE));
				$sqlsize =  ($head2['content-length'] / (1024*1024) )."MB";
				//14:08-2019-07-21.zip

				$html .=
				'<td><a href ='.$fileurl.'>' .$zip.' </td></a>
				<td>'.$filesize.'</td>
				<td><a  href ='.$sqlurl.'>'.$data[$i].'</a></td>
				<td>'.$sqlsize.'</td>
				</tr>';
		}

		return $html;


	}
	//==============================================================
// GET REAL IP OF USER :D proxy ? vpn ? lets see we gonna catch u :)
function getUserIP() {
    $ipaddress = '';
    if (isset($_SERVER['HTTP_CLIENT_IP']))
        $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
    else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
    else if(isset($_SERVER['HTTP_X_FORWARDED']))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
    else if(isset($_SERVER['HTTP_X_CLUSTER_CLIENT_IP']))
        $ipaddress = $_SERVER['HTTP_X_CLUSTER_CLIENT_IP'];
    else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
        $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
    else if(isset($_SERVER['HTTP_FORWARDED']))
        $ipaddress = $_SERVER['HTTP_FORWARDED'];
    else if(isset($_SERVER['REMOTE_ADDR']))
        $ipaddress = $_SERVER['REMOTE_ADDR'];
    else
        $ipaddress = 'UNKNOWN';
    return $ipaddress;
}
?>
