<?php
function post($op2,$data,$tooken){
		$url = "http://127.0.0.1/project/navbell-api/?tooken=$tooken&op=admins&op2=".$op2;
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
?>
