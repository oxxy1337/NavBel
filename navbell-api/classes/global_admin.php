<?php
/**
* 
*/
class Dashboard 
{
	public $point;
	public $module;
	public $nbOfQuestions;
	public $createdby;
	public $isAproved;
	public $image;
	public $story;
	public $year;
	public $resource;
	public $time;
	public $opt;
	public $question;
	public $true;
	public $trueoption;
	public $id;
	public $email;
	public $password;

	private $db;
	function __construct($db)
	{
		$this->db=$db;
	}


	public function Login(){
		$conn = $this->db;
		$query = "SELECT * FROM admins where email = ? and password = ?";
		$pre = $conn->prepare($query);
		$pre->bindValue(1,$this->email);
		$pre->bindValue(2,$this->password);
		if ($pre->execute()) {
			$pre->setFetchMode(PDO::FETCH_ASSOC);
			$data = $pre->fetchall()[0];
			
	}
		return $data;
	}

	public function getChallenges(){
			$conn = $this->db;
			$query = "SELECT * FROM challenges";
			$pre= $conn->prepare($query);
			if ($pre->execute()) {
				$pre->setFetchMode(PDO::FETCH_ASSOC);
				$data = $pre->fetchall();
			}
			return $data ; 
	}

	public function chlngDl(){
		$conn = $this->db;
		$query = "UPDATE challenges SET isAproved=0 WHERE id =:id";
		$pre= $conn->prepare($query);
		$pre->bindParam(":id",$this->id);
		print_r($id);
		if ($pre->execute()) {
				return true ;
			}
			return false ; 
	}
	

	public function chlngAp(){
		$conn = $this->db;
		$query = "UPDATE challenges SET isAproved=1 WHERE id =:id";
		$pre= $conn->prepare($query);
		$pre->bindParam(":id",$this->id);
		if ($pre->execute()){
				return true ;
			}
			return false ; 
	}

	public function addChallenge(){
		$conn = $this->db;
		$query = "INSERT INTO challenges SET date=:date,year=:year,module=:module,isAproved=:isAproved,story=:story,point=:point,createdby=:createdby,
			nbOfQuestions=:nbOfQuestions,url=:image,resource=:resource
		";
		$pre=$conn->prepare($query);
		$pre->bindParam(":module",$this->module);
		$pre->bindParam(":date",$this->date);
		$pre->bindParam(":year",$this->year);
		$pre->bindParam(":isAproved",$this->isAproved);
		$pre->bindParam(":story",$this->story);
		$pre->bindParam(":point",$this->point);
		$pre->bindParam(":createdby",$this->createdby);
		$pre->bindParam(":nbOfQuestions",$this->nbOfQuestions);
		$pre->bindParam(":image",$this->image);
		$pre->bindParam(":resource",$this->resource);
			if ($pre->execute()) {
				 $stmt = $conn->query("SELECT LAST_INSERT_ID()");
				return $stmt->fetchColumn();		
			}else{
				 return 0;
			}

	}

	public function addQuestion(){
		$conn = $this->db;
		$query = "INSERT INTO questions SET question=:question,point=:point,time=:time,challengeid=:challengeid";
		$pre=$conn->prepare($query);
		$pre->bindParam(":question",$this->question);
		
		$pre->bindParam(":point",$this->point);
		$pre->bindParam(":time",$this->time);
		$pre->bindParam(":challengeid",$this->id);
			if ($pre->execute()) {
				 $stmt = $conn->query("SELECT LAST_INSERT_ID()");
				return $stmt->fetchColumn();		
			}else{
				 return 0;
			}

	}

	public function addOption(){
		$conn = $this->db;
		$query = "INSERT INTO options SET trueoption=:trueoption,questionid=:questionid";
		$pre=$conn->prepare($query);
		$pre->bindParam(":trueoption",$this->trueoption);
		
		$pre->bindParam(":questionid",$this->id);

			if ($pre->execute()) {
				if($this->true == $this->trueoption) {
				 $stmt = $conn->query("SELECT LAST_INSERT_ID()");
				 return $stmt->fetchColumn();	
				}
					
			}else{
				 return 0;
			}

	}

	public function addSolution(){
		$conn = $this->db;
		$query = "UPDATE questions SET opt=:opt WHERE id=:id";
		$pre=$conn->prepare($query);
		$pre->bindParam(":opt",$this->opt);
		
		$pre->bindParam(":id",$this->id);

			if ($pre->execute()) {
				return 1;
					
			}else{
				 return 0;
			}

	}


	}
?>