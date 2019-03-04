<?php
/*
coded by m.slamat
*/
    // Class To connect to database 
        // Using PDO prepared statement isn't cool nah ?
        // why ?? ==> for our safety (secure + fast)
    
class Database{
 
    
    private $host = "35.203.11.145";
    private $db_name = "navbell";
    private $username = "slamat";
    private $password = "Slamat=x=2x=3x";
    public  $conn;

    // get the database connection
    public function getConnection(){
 
        $this->conn = null;
 
        try{
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn->exec("set names utf8");
        }catch(PDOException $exception){
            echo "Connection error: " . $exception->getMessage();
        }
 
        return $this->conn;
    }
}
?>