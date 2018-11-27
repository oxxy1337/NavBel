<?php 
class users{
 
    // database connection and table name
    private $conn;
    private $table_name = "users";
 
    // object properties
    public $id;
    public $name;
    public $email;
    public $password;
    public $picture;
    public $date;
    public $birth;
    public $years;
    public $point;
    public $Qsolved;
    public $level;
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }
}
 // id,name,email,password,picture,date,birth,years,point,test:noq\,level
