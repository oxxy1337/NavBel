<?php
/*
coded by m.slamat
*/
//class contain methodes crud operations in db in & logics 

class Globals{


	private $conn ; 
	private $tables = ["users","userbannedever","challenges","triedchallenges","questions","options","userbannedtmp"];
	// Propreties 
	// columns of users-subscribed && allstudents tables
	public $id ;
    public $rewardid;
	public $fname;
	public $lname;
	public $email;
	public $password;
	public $salt ;
	public $picture;
	public $date;
	public $nbsolved;
    public $challengeid;
	public $point;
	public $currentrank;
	public $solvedperday;
	public $ranks;
	public $year;
	public $ip;
	public $useragent;
	public $why ;
    public $ispublic;
    public $bio ;
    public $mdl;
    public $chlngpts;


    
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
  		     $sql = "SELECT $c1 FROM $table WHERE $c2 = ?";
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
	    	$query = "INSERT INTO ".$this->tables[0]." SET
             fname=:fname,lname=:lname,email=:email,password=:password,salt=:salt,date=:date,picture=:picture,year=:year,ispublic=:ispublic
             ,point=:point,currentrank=:currentrank,solvedperday=:solvedperday,nbsolved=:nbsolved,ranks=:ranks,bio=:bio";
	    	$send = $con->prepare($query);
	    	$send->bindParam(":fname",$this->fname);
	    	$send->bindParam(":lname",$this->lname);
	    	$send->bindParam(":email",$this->email);
	    	$send->bindParam(":password",$this->password);
	    	$send->bindParam(":salt",$this->salt);
	    	$send->bindParam(":picture",$this->picture);
	    	$send->bindParam(":date",$this->date);
	    	$send->bindParam(":year",$this->year);
            $send->bindParam(":ispublic",$this->ispublic);
            $send->bindParam(":point",$this->point);
            $send->bindParam(":currentrank",$this->currentrank);
            $send->bindParam(":ranks",$this->ranks);
            $send->bindParam(":solvedperday",$this->solvedperday);
            $send->bindParam(":nbsolved",$this->nbsolved);
            $send->bindParam(":bio",$this->bio);





	    	if($send->execute()){
	    		return true;
	    	} else{
	    		return false;
	    	}


    }
    // send user data by id (needed in profile )
    public function userdata(){
        $con= $this->conn;
        $query = "SELECT * FROM ".$this->tables[0]." WHERE id = ?";
        $send = $con->prepare($query);
        if($send->execute([$this->id])){
            $send->setFetchMode(PDO::FETCH_ASSOC);
            return $data = $send->fetchall(); 
        } else {
            return Null ;
        };

    }
    // update user data (update infos) 
    public function updateuser(){
        
            $con = $this->conn ;
            $query = "UPDATE ".$this->tables[0]." SET fname=:fname,lname=:lname,password=:password,salt=:salt,picture=:picture,ispublic=:ispublic WHERE id=:id";
            $send = $con->prepare($query);
            $send->bindParam(":fname",$this->fname);
            $send->bindParam(":lname",$this->lname);
            $send->bindParam(":password",$this->password);
            $send->bindParam(":salt",$this->salt);
            $send->bindParam(":picture",$this->picture);
            $send->bindParam(":id",$this->id);
            $send->bindParam(":ispublic",$this->ispublic);

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
            $query = "SELECT * FROM ".$this->tables[2]." WHERE  year = ? AND isAproved = 1 AND id NOT IN (SELECT challengeid FROM ".$this->tables[3]." where userid=".$this->id.") ";

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
                        $qst["id"] = $this->id;
                        $options=array();

                        
                        $qst["resource"]=$this->grab($this->tables[2],'resource','id',$this->id); // get resource from challenge 
                        $qst["resource"] = json_decode(($qst['resource']));

                        $s=$con->prepare($query);
                        $s->execute([$this->id]);

                        $s->setFetchMode(PDO::FETCH_ASSOC);
                        

                        while ($r = $s->fetch()) { // put question data in array of questions
                           
                           $q->execute([$r["id"]]);
                            $q->setFetchMode(PDO::FETCH_ASSOC);
                            while($x = $q->fetch()) { // put option data in array of options which stored in question array 
                                // init options data  
                                
                               
                               $arr = array('id'=>$x['id'],'trueoption'=>$x['trueoption']);
                                array_push($options, $arr);
                                
                            }
                        // init qestions data 
                            $ar = array("time"=>$r["time"],"id"=>$r['id'],"question"=>$r['question'],"point"=>$r["point"],"options"=>$options);
                            array_push($qst["questions"], $ar);
                            $options = array();
                 } 
          

            
        }
          return json_encode($qst);

    }
    // when user start challenge this challenge moved to tried challenges 
    // user cant try this challenge next time 
    public function trychallenge(){
       $con = $this->conn;
       $query = "INSERT INTO ".$this->tables[3]." SET challengeid=:challengeid , userid=:userid "; 
       $send = $con->prepare($query);
       $send->bindParam("challengeid",$this->challengeid);
       $send->bindParam("userid",$this->id);
       if($send->execute()){
        return true ;
       }
        return false ;
    } 
    /// check if already solved 

    public function checksolv(){
        $con = $this->conn;
        $query = "SELECT * FROM ".$this->tables[3]."
         WHERE challengeid = ".$this->challengeid."
         AND userid = ".$this->id." ";
        $send = $con->prepare($query);
        $send->execute();
        if ($send->rowCount() > 0 ) {
            return true;
        }
        else{
            return false;
        }

    }
    // update if correct pts ++ :D Esist deserve ++ 
    public function updateifsolved(){
        $con = $this->conn;
        $query = "UPDATE ".$this->tables[0]." SET point=:point,nbsolved=:nbsolved,solvedperday=:solvedperday WHERE id=:id";
        $send = $con->prepare($query);
        $send->bindParam(":point",$this->point);
        $send->bindParam(":id",$this->id);
        $send->bindParam(":nbsolved",$this->nbsolved);
        $send->bindParam(":solvedperday",$this->solvedperday);
        if($send->execute()){
            return true;
        }else{
            return false;
        }


    }



    // banne the bad one in hacking case ;)
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
    // banne the cheater :) 
    public function bannethecheater(){
        $con = $this->conn;
        
        $query = "INSERT INTO ".$this->tables[6]." SET userid=:userid,ip=:ip,challengeid=:challengeid,date=:date";
        $send = $con->prepare($query);
        $send->bindParam(":date",$this->date);
        $send->bindParam(":ip",$this->ip);
        $send->bindParam(":userid",$this->id);
        $send->bindParam(":challengeid",$this->challengeid);
        
        if($send->execute()) {
            return true;    
        }else{
            return false;
        }
    }


    //// soulition by challenge ID 

    public function soulibychlng(){
            $con = $this->conn;
            $query = "SELECT * FROM ".$this->tables[4]." where challengeid = ?  ";
            $send = $con->prepare($query);
            if($send->execute([$this->challengeid])){ 
                    
                    $send->setFetchMode(PDO::FETCH_ASSOC);
                    $arr["data"] = $send->fetchall();
                    $arr["reponse"] = 1 ;
                    


            }else{
                    $arr["reponse"] = 0 ; 
            };
            return json_encode($arr);





    }

    /// Send reward info :) 
    public function sendReward(){
        $con= $this->conn;
        $query="SELECT * FROM rewards ";
        $send = $con->prepare($query);
        if ($send->execute()) {
            $send->setFetchMode(PDO::FETCH_ASSOC);
            $arr["data"] = $send->fetchall();
            $arr["reponse"] = 1;
        }else{
            $arr["reponse"] = 0 ;
        }
        return $arr;

    }

    /// update user point 
    public function chngPoint(){
        $con = $this->conn;
        $query = "UPDATE ".$this->tables[0]." SET point=:point WHERE id=:id";
        $send = $con->prepare($query);
        $send->bindParam(":point",$this->point);
        $send->bindParam(":id",$this->id);
        if($send->execute()){
            return true;
        }else{
            return false;
        }


    }

    // getting the solved chlngs
    public function solvedChallenges(){
        $con= $this->conn;
        $query="SELECT * FROM solvedchallenge where userid=?";
        $send = $con->prepare($query);
        if ($send->execute([$this->id])) {
            $send->setFetchMode(PDO::FETCH_ASSOC);
            $arr["data"] = $send->fetchall();
            
        }
        return $arr;
    }
    //  add chlng solved
    public function solvedChlng(){
        
        $con = $this->conn;
        $query = " INSERT INTO solvedchallenge SET 
        userid=:userid,
        challengeid=:challengeid,
        challengepts=:chlngpts,
        mdl=:m,
        resultpts=:point";
        
        $send = $con->prepare($query);
        $send->bindParam(":m",$this->mdl);
        $send->bindParam(":point",$this->point);
        $send->bindParam(":userid",$this->id);
        $send->bindParam(":chlngpts",$this->chlngpts);
        $send->bindParam(":challengeid",$this->challengeid);
        if($send->execute()){
            return true;
        }else{
            return false;
        }


    }



    
	







}