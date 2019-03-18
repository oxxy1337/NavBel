<?php
/*
coded by m.slamat
*/
//class contain methodes crud operations in db in & logics 

class Globals{


	private $conn ; 
	private $tables = ["users","userbannedever","challenges","triedchallenges","questions","options"];
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
               
      			$x=$r["$c1"];
    	       }
               return $x;
                
               
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
            // select challenge by year and not solved yet by user 
            $query = "SELECT * FROM ".$this->tables[2]." WHERE  year = ? AND id NOT IN (SELECT challengeid FROM ".$this->tables[3]." where userid=".$this->id.") ";

            $s=$con->prepare($query);
            $s->execute([$this->year]);
            $s->setFetchMode(PDO::FETCH_ASSOC);
            $ch = array();
            $ch["challenges"] = array();
            
            if($s->rowCount() > 0) $ch["reponse"] = 1; else $ch["reponse"] = -1; 
            while($r= $s->fetch()){
                $arr = array('id'=>$r['id'],"url"=>$r['url'],'point'=>$r['point'],'module'=>$r['module'],'story'=>$r['story'],'nbOfQuestions'=>$r['nbOfQuestions'],'nbPersonSolved'=>$r['nbPersonSolved']);
                array_push($ch["challenges"], $arr);

            }
            return json_encode($ch);
            
}

    
    // get questions of each challenge data 
    public function questions(){
            
            if(($this->check($this->tables[2],'id',$this->id) == false)){ // check if challenge still existe 
                $qst = array("reponse"=>-1);
            }
                 else {
                        $con = $this->conn;

                        $query="SELECT * FROM ".$this->tables[4]." WHERE challengeid = ? "; // 1st query for get question by challenge id
                        
                        $qst=array();
                        $q2="SELECT * FROM ".$this->tables[5]." WHERE questionid = ? "; // get option by question id 
                        $q=$con->prepare($q2);
                        $qst["questions"]=array(); // array of questions 
                        $qst["reponse"]=1; // flag of operation successed 
                        $options=array();

                        $qst["time"]=$this->grab($this->tables[2],'time','id',$this->id); // get time  from challenge
                        $qst["resource"]=$this->grab($this->tables[2],'resource','id',$this->id); // get resource from challenge 
                        $qst["resource"] =  urlencode($qst["resource"]);
                        $s=$con->prepare($query);
                        $s->execute([$this->id]);

                        $s->setFetchMode(PDO::FETCH_ASSOC);
                        

                        while ($r = $s->fetch()) { // put question data in array of questions
                           
                           $q->execute([$r["id"]]);
                            $q->setFetchMode(PDO::FETCH_ASSOC);
                            while($x = $q->fetch()) { // put option data in array of options which stored in question array 
                                // init options data  
                                
                               
                               $arr = $x['trueoption'];
                                array_push($options, $arr);
                                
                            }
                        // init qestions data 
                            $ar = array("question"=>$r['question'],"point"=>$r["point"],"options"=>$options);
                            array_push($qst["questions"], $ar);
                            $options = array();
                 } 
          

            
        }
          return json_encode($qst);

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