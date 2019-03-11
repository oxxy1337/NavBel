<?php
/*
coded by m.slamat
*/
//class contain methodes crud operations in db in & logics 

class Globals{


	private $conn ; 
	private $tables = ["users","userbannedever","challenges","triedchallenges"];
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
	public $why ;
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
	    	$query = "INSERT INTO ".$this->tables[0]." SET fname=:fname,lname=:lname,email=:email,password=:password,salt=:salt,date=:date,picture=:picture,year=:year";
	    	$send = $con->prepare($query);
	    	$send->bindParam(":fname",$this->fname);
	    	$send->bindParam(":lname",$this->lname);
	    	$send->bindParam(":email",$this->email);
	    	$send->bindParam(":password",$this->password);
	    	$send->bindParam(":salt",$this->salt);
	    	$send->bindParam(":picture",$this->picture);
	    	$send->bindParam(":date",$this->date);
	    	$send->bindParam(":year",$this->year);

	    	if($send->execute()){
	    		return true;
	    	} else{
	    		return false;
	    	}


    }
    // Reset password (update with new password)
    public function updatepwd(){
    	$con = $this->conn;
    	$query = "UPDATE ".$this->tables[0]." SET password=:password WHERE email=:email";
    	$send = $con->prepare($query);
    	$send->bindParam(":password",$this->password);
    	$send->bindParam(":email",$this->email);
    	if($send->execute()){
    		return true;
    	}else{
    		return false;
    	}
    }
    // get Challenges data ( json array)
    public function challenges(){
    $con = $this->conn;
    $query= "SELECT * FROM ".$this->tables[2]." WHERE year LIKE ?";
    $q = $con->prepare($query);
    $q->execute([$this->year]);
    $q->setFetchMode(PDO::FETCH_ASSOC);
    $ch=array();
    $flag = $this->check($this->tables[3],'userid',$this->id);
    $challengeid = $this->grab($this->tables[3],'challengeid','userid',$this->id);
    $ch["reponse"]="1";
    $ch["challenges"]=array();

    while ($r = $q->fetch()) {

        // check if user not solve any challenge yet OR he not solve selected challenge
        if (($flag == false)){
            echo $r['id'];
            $arr = 
                array('id' =>$r['id'],
                'issolved' =>'0',            
                'point'=>$r['point'],
                'module'=>$r['module'],
                'story'=>$r['story'],
                'nbOfQuestions'=>$r['nbOfQuestions'],
                'nbPersonSolved'=>$r['nbPersonSolved'],
                'resource'=>$r['resource']
                   );
        // Now if he solve the selected challenge 
        } elseif($challengeid == $r['id']) {
                $arr = 
                array('id' =>$r['id'], 
                'issolved' =>'1',          
                'point'=>$r['point'],
                'module'=>$r['module'],
                'story'=>$r['story'],
                'nbOfQuestions'=>$r['nbOfQuestions'],
                'nbPersonSolved'=>$r['nbPersonSolved'],
                'resource'=>$r['resource']
                   ); 

        // Now if doesnt solve the selected challenge 
        } elseif ($challengeid !== $r['id']) {
            $arr = 
                array('id' =>$r['id'], 
                'issolved' =>'0',          
                'point'=>$r['point'],
                'module'=>$r['module'],
                'story'=>$r['story'],
                'nbOfQuestions'=>$r['nbOfQuestions'],
                'nbPersonSolved'=>$r['nbPersonSolved'],
                'resource'=>$r['resource']
                   );
        }
        array_push($ch["challenges"], $arr);

    }
            return json_encode($ch);
            
}

    // banne the bad one in hacking case :)
    public function bannethehacker(){
    	$con = $this->conn;
    	$query = "INSERT INTO ".$this->tables[1]." SET date=:date,useragent=:useragent,ip=:ip,why=:why";
    	$send = $con->prepare($query);
    	$send->bindParam(":date",$this->date);
    	$send->bindParam(":useragent",$this->useragent);
    	$send->bindParam(":ip",$this->ip);
    	$send->bindParam(":why",$this->why);
    	
    	if($send->execute()) {
    		return true;	
    	}else{
    		return false;
    	}

    }
      
    


	







}