<?php
/*
coded by m.slamat
*/
    // Class To connect to database 
        // Using PDO prepared statement isn't cool nah ?
        // why ?? ==> for our safety (secure + fast)
    
class Database{
 
        // my data is public  don't harm the server or db ....... rak kkbir 
    private $host = "navbellapi_db_1";
    private $db_name = "navbell";
    private $username = "slamat";
    private $password = "slamat";
    private $port ="3306";
    public  $conn;

    // get the database connection
    public function getConnection(){
 
        $this->conn = null;
 
        try{
            $this->conn = new PDO("mysql:host=" . $this->host . ";port=".$this->port.";dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn->exec("set names utf8");
        }catch(PDOException $exception){
            echo "Connection error: " . $exception->getMessage();
        }
 
        return $this->conn;
    }
}
?>