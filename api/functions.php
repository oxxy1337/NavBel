<?php 
//ini_set ('display_errors', 1);
//error_reporting (E_ALL | E_STRICT);
// function check token 
function tooken($a) {
$key = "team7";
for($i=0;$i<=64;$i++)
	{
	$rezult .= $a[$i*2];
	}; 
$rezult = strrev($rezult);
$check  = ($rezult == md5($key));
return $check; 
}
// function check email 

function checkmail($x,$table,$column,$data) {
$query = $x->prepare( "SELECT $column
             FROM $table
             WHERE $column = ?" );
$query->bindValue( 1, $data );
$query->execute();
if ( $query->rowCount() > 0 ) {return true; } else { return false ;};
};
 
function grab($z,$table1,$c1,$c2,$data1){
    $sql = "SELECT $c1 FROM $table1 WHERE $c2 LIKE ?";
    $q = $z->prepare($sql);
    $q->execute(["$data1"]);
    $q->setFetchMode(PDO::FETCH_ASSOC);
 
    while ($r = $q->fetch()) {
        return $r["$c1"];
    }

            
}

?>