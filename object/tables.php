<?php 
class student{
 
    // database connection and table name
    private $conn;
    private $salt = rand(1000,9999);
    private $table_name = "users";
    private $table_tests = "tests";
    //private $table_name = "users";
    
    // object properties
    public $imgdata;
    public $id;
    public $name;
    public $email;
    public $password;
    public $picture;
    public $date;
    public $year;
    public $point;
    public $qsolved;
    public $level;
    public $questions;
    public $description;
    public $image;



    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }

    function create(){
 
    // query to insert record
    $query = "INSERT INTO
                " . $this->table_name . "
            SET
                name=:name,  email=:email, password=:password,salt=:salt picture=:picture, date=:date, year=:year, point=:point, qsolved=:qsolved, level=:level";

 //, email=:email, password=:password, picture=:picture, date=:date, birth=:birth, year=:year, point=:point, qsolved=:qsolved, level=:level
    // prepare query
    $stmt = $this->conn->prepare($query);
      
    // sanitize
    $this->name=htmlspecialchars(strip_tags($this->name));
    $this->salt=htmlspecialchars(strip_tags($this->salt));
    $this->email=htmlspecialchars(strip_tags($this->email));
    $this->password=htmlspecialchars(strip_tags(hash_hmac('md5', $this->password, $salt)));
    $this->picture=htmlspecialchars(strip_tags($this->picture));
    $this->date=htmlspecialchars(strip_tags($this->date));
    $this->year=htmlspecialchars(strip_tags($this->year));
    $this->point=htmlspecialchars(strip_tags($this->point));
    $this->qsolved=htmlspecialchars(strip_tags($this->qsolved));
     $this->level=htmlspecialchars(strip_tags($this->level));

 
    // bind values
    $stmt->bindParam(":name", $this->name);
    $stmt->bindParam(":email", $this->email);
    $stmt->bindParam(":password", $this->password);
    $stmt->bindParam(":picture", $this->picture);
    $stmt->bindParam(":date", $this->date);
    $stmt->bindParam(":year", $this->year);
    $stmt->bindParam(":point", $this->point);
    $stmt->bindParam(":qsolved", $this->qsolved);
    $stmt->bindParam(":level", $this->level);


 
    // execute query
    if($stmt->execute()){
        return true;
    }
 
    return false;
     
}
function update(){
 
    // update query
    $query = "UPDATE
                " . $this->table_name . "
            SET
                 name=:name, email=:email, password=:password, picture=:picture, date=:date, year=:year, point=:point, qsolved=:qsolved, level=:level,id=:id
            WHERE
                email = :email";
 
    // prepare query statement
    $stmt = $this->conn->prepare($query);
 
    // sanitize
        $this->name=htmlspecialchars(strip_tags($this->name));
    $this->email=htmlspecialchars(strip_tags($this->email));
    $this->password=htmlspecialchars(strip_tags($this->password));
    $this->picture=htmlspecialchars(strip_tags($this->picture));
    $this->date=htmlspecialchars(strip_tags($this->date));
    $this->year=htmlspecialchars(strip_tags($this->year));
    $this->point=htmlspecialchars(strip_tags($this->point));
    $this->qsolved=htmlspecialchars(strip_tags($this->qsolved));
    $this->level=htmlspecialchars(strip_tags($this->level));
    $this->id=htmlspecialchars(strip_tags($this->id));
 
    // bind new values
    $stmt->bindParam(":name", $this->name);
    $stmt->bindParam(":email", $this->email);
    $stmt->bindParam(":password", $this->password);
    $stmt->bindParam(":picture", $this->picture);
    $stmt->bindParam(":date", $this->date);
    $stmt->bindParam(":year", $this->year);
    $stmt->bindParam(":point", $this->point);
    $stmt->bindParam(":qsolved", $this->qsolved);
    $stmt->bindParam(":level", $this->level);
     $stmt->bindParam(":id", $this->id);

    // execute the query
    if($stmt->execute()){
        return true;
    }
 
    return false;
}
/*public function cryptpwd($pass){

    $salt = rand(1000,9999);
    
    return hash_hmac('md5', $pass, $salt);

}*/

public function count(){
    $query = "SELECT COUNT(*) as total_rows FROM " . $this->table_tests . "";
 
    $stmt = $this->conn->prepare( $query );
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
 
    return $row['total_rows'];
}
function read(){
 
    // select all query
    $query = "SELECT * FROM   " . $this->table_tests . " WHERE year LIKE ? ";
 
    // prepare query statement
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(1, $this->year);
    // execute query
    $stmt->execute();
 
    return $stmt;
}
    
 // id,name,email,password,picture,date,birth,years,point,test:noq\,level

}
?>