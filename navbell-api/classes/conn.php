<?php
/*
coded by m.slamat
*/
    // Class To connect to database 
        // Using PDO prepared statement isn't cool nah ?
        // why ?? ==> for our safety (secure + fast)
    
class Database {
 
       
    private $host = "23.101.131.75";
    private $db_name = "navbell";
    private $username = "slamat";
    private $password = "slamat";
    private $port ="1337";
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
         $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_USE_BUFFERED_QUERY);
        return $this->conn;
    }
}
?>