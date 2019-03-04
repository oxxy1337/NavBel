<?php
/*
coded by m.slamat
*/
//class contain methodes crud operations in db in & logics 

class Globals{


	private $conn ; 
	private $tables = ["users","user-banned-ever"];
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
	public $year;
	public $ip;
	public $useragent;
    // [+] class constructures 
    public function __construct($db){
    	$this->conn = $db;

    }
    
    // [+] class methodes
   	// checking if some data exist or not () 
    public function check($table,$column,$data){
    		$con = $this->conn ;
    		$query =$con->prepare( "SELECT $column FROM $table WHERE $column = ?" );
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

    // sign in saving data in our db 
    public function signin(){
    	
	    	$con = $this->conn ;
	    	$query = "INSERT INTO ".$this->tables[0]." SET fname=:fname,lname=:lname,email=:email,password=:password,salt=:salt,date=:date,picture=:picture,nbsolved=:nbsolved,point=:point,currentrank=:currentrank,solvedperday=:solvedperday,ranks=:ranks,year=:year";
	    	$send = $con->prepare($query);
	    	$send->bindParam(":fname",$this->fname);
	    	$send->bindParam(":lname",$this->lname);
	    	$send->bindParam(":email",$this->email);
	    	$send->bindParam(":password",$this->password);
	    	$send->bindParam(":salt",$this->salt);
	    	$send->bindParam(":picture",$this->picture);
	    	$send->bindParam(":date",$this->date);
	    	$send->bindParam(":nbsolved",$this->nbsolved);
	    	$send->bindParam(":point",$this->point);
	    	$send->bindParam(":currentrank",$this->currentrank);
	    	$send->bindParam(":solvedperday",$this->solvedperday);
	    	$send->bindParam(":ranks",$this->ranks);
	    	$send->bindParam(":year",$this->year);

	    	if($send->execute()){
	    		return true;
	    	} else{
	    		return false;
	    	}


    }

    // banne the bad one in hacking case :)
    public function bannethehacker(){
    	$con = $this->conn;
    	$query = "INSERT INTO ".$this->tables[1]." SET date=:date,useragent=:useragent,ip=:ip";
    	$send = $con->prepare($query);
    	$send->bindParam(":date",$this->date);
    	$send->bindParam(":useragent",$this->useragent);
    	$send->bindParam(":ip",$this->ip);
    	
    	if($send->execute()) {
    		return true;	
    	}else{
    		return false;
    	}

    }  
    


	







}