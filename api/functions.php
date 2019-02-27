<?php 
//ini_set ('display_errors', 1);
//error_reporting (E_ALL | E_STRICT);
// function check token 

function tooken($a) {
    $key="team7";
    $time = (int)(time() / 60); // get time minute from 1/1/1970 
    $string =  md5($time); // hashing
    $key = sha256($time.$key); // creating our key 
    $secret = hash_hmac('sha256',$string,$key); // final hash using sha-256 algorithm
    return ($secret == $a); // check the input with my client (app -web)
};
if(tooken($_GET['skey']) !== false) die('{"reponse":"nqmqmqmqqmqmqmqmqmqmqq akram terma "}');

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
    }}
;
function grabtests($z,$table1,$c1,$c2,$data1){
    $sql = "SELECT $c1 FROM $table1 WHERE $c2 LIKE ?";
    $q = $z->prepare($sql);
    $q->execute(["$data1"]);
    $q->setFetchMode(PDO::FETCH_ASSOC);
     $students_arr=array();
    $students_arr["records"]=array();
    while ($r = $q->fetch()) {

        $arr = 
            array('id' =>$r['id'],            
            'name'=>$r['name'],
            'description'=>$r['description'],
            'image'=>$r['image'],
            'questions'=>$r['questions'],
            'point'=>$r['point'],
            'year'=>$r['year']

               );
            array_push($students_arr["records"], $arr);

    }

            return json_encode($students_arr);
            
};
function grabqst($z,$table1,$c1,$c2,$data1){
    $sql = "SELECT $c1 FROM $table1 WHERE $c2 LIKE ?";
    $q = $z->prepare($sql);
    $q->execute(["$data1"]);
    $q->setFetchMode(PDO::FETCH_ASSOC);
     $students_arr=array();
    $students_arr["records"]=array();
    while ($r = $q->fetch()) {

        $arr = 
            array('id' =>$r['id'],            
            'image'=>$r['image'],
            'question'=>$r['question'],
            'option'=>$r['option'],
            'question'=>$r['question'],
            'reponse'=>$r['reponse'],
            'point'=>$r['point'],
            'type'=>$r['type'],
            'testid'=>$r['testid'],
            'year'=>$r['year']
            
               );
            array_push($students_arr["records"], $arr);

    }

            return json_encode($students_arr);
            
};

function ispc() {
    return preg_match("/(one|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"]);
}
?>