<?php
/*
coded by m.slamat
*/
//class contain methodes crud operations in db in & logics 

class Globals{


	private $conn ; 

	// Propreties 
	// columns of users-subscribed && allstudents tables
	public $id ;
	public $fname;
	public $lname;
	public $email;
	public $password;
	public $salt ;
	public $picture;
	public $date;
	public $nbsolved;
	public $point;
	public $currentrank;
	public $solvedperday;
	public $ranks;
    // [+] class constructures 
    public function __construct($db){
    	$this->conn = $db;

    }
    // [+] class methodes
   	// checking if email exist in esi maillist 
    public function check($table,$column,$data){
    		$db = $this->conn;
    		$query =$db->prepare( "SELECT $column FROM $table WHERE $column = ?" );
			$query->bindValue( 1, $data);
			$query->execute();
			if ( $query->rowCount() > 0 ) {
				return true; 
			} else { 
				return false;
				};

    }
    // grabing data 
    public function grab($table,$c1,$c2,$data1){
    		 $db = $this->conn;
  		     $sql = "SELECT $c1 FROM $table WHERE $c2 LIKE ?";
    		 $q = $db->prepare($sql);
    		 $q->execute(["$data1"]);
     		 $q->setFetchMode(PDO::FETCH_ASSOC);
 
    		while ($r = $q->fetch()) {
      			  return $r["$c1"];
    }
}

    


	







}