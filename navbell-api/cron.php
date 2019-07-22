<?php
error_reporting(0);
include('./config.php');
include('./classes/conn.php');
$database = new Database(MySQL_HOST,MySQL_USER,MySQL_PASS,MySQL_PORT,MySQL_DBNAME); 
$db = $database->getConnection();
/*******************************************************/
/*				  	Current rank 			           */
/* if user solve more then 3 chlng he will get ++ in rank 
********************************************************/
$query = "SELECT ranks,currentrank,solvedperday,id from users";
$pre = $db->prepare($query);
$pre->execute();
$pre->setFetchMode(PDO::FETCH_ASSOC);
$data=$pre->fetchall();
foreach ($data as $user) {
	$id = $user["id"];
	$bigrank = $user["ranks"];
	$bigrank = json_decode($bigrank);
	array_shift($bigrank);
	if ($user["solvedperday"] >= 3 ) {
		$rank = $user["currentrank"] + (int)($user["solvedperday"]/3);
		array_push($bigrank,$rank);
		$bigrank = json_encode($bigrank);
		$query = "UPDATE users SET currentrank=$rank,ranks=:ranks WHERE id=$id";
		$pre = $db->prepare($query);
		$pre->bindParam(":ranks",$bigrank);	
		$pre->execute();
	}elseif(($user["solvedperday"] == 0)){
		if(($user["currentrank"] > 0)) 
			$rank = $user["currentrank"] - 1; 
		else $rank=0;
		array_push($bigrank,$rank);
		$bigrank = json_encode($bigrank);
		$query = "UPDATE users SET currentrank=$rank,ranks=:ranks WHERE id=$id";
		$pre = $db->prepare($query);
		$pre->bindParam(":ranks",$bigrank);	
		$pre->execute();
	}
}


/***********************************************/
/* RESET SOLVED PER DAY TO 0 TO ALL USERS 	   */
$query = "UPDATE users SET solvedperday=0";
$pre = $db->prepare($query);
$pre->execute();
/***********************************************/
/* */