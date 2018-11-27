<?php 
// error reporting = 1 
ini_set ('display_errors', 1);
error_reporting (E_ALL | E_STRICT);
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

function uniq() {
$key ="team7" ;
$key =  strrev(md5($key)) ; // md5 key inversed 
$random= md5(time());
for($i=0;$i<=64;$i++)
    {
    $rezult .= $key[$i].$random[$i];
    }; 
return $rezult ; 
}

echo uniq();

// function to sign in 
function create(){
 
    // query to insert record
    $query = "INSERT INTO
                " . $this->table_name . "
            SET
                name=:name, email=:email, password=:password, picture=:picture, date=:date, birth=:birth, year=:year, point=:point, Qsolved=:Qsolved, level=:level";

 
    // prepare query
    $stmt = $this->conn->prepare($query);
 
    // sanitize
    $this->name=htmlspecialchars(strip_tags($this->name));
    $this->email=htmlspecialchars(strip_tags($this->email));
    $this->password=htmlspecialchars(strip_tags($this->password));
    $this->picture=htmlspecialchars(strip_tags($this->picture));
    $this->date=htmlspecialchars(strip_tags($this->date));
    $this->birth=htmlspecialchars(strip_tags($this->birth));
    $this->year=htmlspecialchars(strip_tags($this->year));
    $this->point=htmlspecialchars(strip_tags($this->point));
    $this->Qsolved=htmlspecialchars(strip_tags($this->Qsolved));
    $this->level=htmlspecialchars(strip_tags($this->level));
 
    // bind values
    $stmt->bindParam(":name", $this->name);
    $stmt->bindParam(":email", $this->email);
    $stmt->bindParam(":password", $this->password);
    $stmt->bindParam(":picture", $this->picture);
    $stmt->bindParam(":date", $this->date(format));
    $stmt->bindParam(":birth", $this->birth);
    $stmt->bindParam(":year", $this->year);
    $stmt->bindParam(":point", $this->point);
    $stmt->bindParam(":Qsolved", $this->Qsolved);
    $stmt->bindParam(":level", $this->level);
 
    // execute query
    if($stmt->execute()){
        return true;
    }
 
    return false;
     
}
 // id,name,email,password,picture,date,birth,years,point,test:noq\,level

?>