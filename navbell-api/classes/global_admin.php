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
	public $isAdmin;
	public $date;
	public $description;
	public $html;

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

	public function addEmployer(){
		$conn = $this->db;
		$query = "INSERT INTO admins SET Module=:module,date=:date,fname=:fname,salt=:salt,email=:email,password=:password,image=:image,isAdmin=:isAdmin";
		$pre=$conn->prepare($query);
		$pre->bindParam(":email",$this->email);
		$pre->bindParam(":fname",$this->fname);
		$pre->bindParam(":salt",$this->salt);
		$pre->bindParam(":password",$this->password);
		$pre->bindParam(":image",$this->image);
		$pre->bindParam(":isAdmin",$this->isAdmin);
		$pre->bindParam(":date",$this->date);
		$pre->bindParam(":module",$this->module);
			if ($pre->execute()) {
				 return 1 	;
			}else{
				 return 0;
			}

	}

	public function getAllStduent(){
		$conn = $this->db ; 
		$query = "SELECT * FROM allstudents "; 
		$pre = $conn->prepare($query);

		if ($pre->execute()) {
			$pre->setFetchMode(PDO::FETCH_ASSOC);
			return  $pre->fetchall();

		}else{
			return 0 ;
		}



	}


	public function killUser(){
		$con=$this->db;
		$q1 = "DELETE FROM allstudents WHERE email = ? ";
		$pre1 = $con->prepare($q1);
		if (($pre1->execute([$this->email]))) {
			$q2 = "DELETE FROM users WHERE email = ? "; 
			$pre2= $con->prepare($q2);
			$pre2->execute([$this->email]);
			return 1 ;
		}
		else {
			return 0 ;
		}

	}

	public function userInfo(){
		$con = $this->db;
		$query = "SELECT * FROM users WHERE email = ? ";
		$pre = $con->prepare($query);
		if ($pre->execute([$this->email])) {
			$pre->setFetchMode(PDO::FETCH_ASSOC);
			return  $pre->fetchall()[0];
		}else{
			return 0 ; 
		}
	}

	public function addUser(){
		$con = $this->db;
		$query = "INSERT INTO allstudents SET email=:email,fname=:fname,lname=:lname,year=:year";
		$pre = $con->prepare($query);
		$pre->bindParam(":email",$this->email);
		$pre->bindParam(":fname",$this->fname);
		$pre->bindParam(":lname",$this->lname);
		$pre->bindParam(":year",$this->year);

		if ($pre->execute()) {
			return  1 ;
		}else{
			return 0 ;
		}
	}

	public function updateProfile(){
		$con = $this->db;
		$query = "UPDATE admins SET email=:email,password=:password,fname=:fname,Module=:module,image=:image WHERE id=:id ";
		$pre = $con->prepare($query);
		$pre->bindParam(":email",$this->email);
		$pre->bindParam(":fname",$this->fname);
		$pre->bindParam(":image",$this->image);
		$pre->bindParam(":module",$this->module);
		$pre->bindParam(":password",$this->password);
		$pre->bindParam(":id",$this->id);
		if($pre->execute()) {
			return 1 ; 
		}else
		{
			return 0 ;
		}

	}

	public function countStudent(){
		$con = $this->db;
		$query = "SELECT * from users";
		$pre = $con->prepare($query);
		$pre->execute();
		return $pre->rowCount();
	}
	public function countEnseignant(){
		$con = $this->db;
		$query = "SELECT * from admins";
		$pre = $con->prepare($query);
		$pre->execute();
		return $pre->rowCount();
	}
	public function countAllusers(){
		$con = $this->db;
		$query = "SELECT * from allstudents";
		$pre = $con->prepare($query);
		$pre->execute();
		return $pre->rowCount();
	}
	public function countProvedchallenge(){
		$con = $this->db;
		$query = "SELECT * from challenges where isAproved = 1";
		$pre = $con->prepare($query);
		$pre->execute();
		return $pre->rowCount();
	}
	public function countAdminstrators(){
		$con = $this->db;
		$query = "SELECT * from admins where isAdmin = 1";
		$pre = $con->prepare($query);
		$pre->execute();
		return $pre->rowCount();
	}
	public function countChallenges(){
		$con = $this->db;
		$query = "SELECT * from challenges";
		$pre = $con->prepare($query);
		$pre->execute();
		return $pre->rowCount();
	}
	public function countrewards(){
		$con = $this->db;
		$query = "SELECT * from rewards";
		$pre = $con->prepare($query);
		$pre->execute();
		return $pre->rowCount();
	}
	public function topUsers(){
		$con = $this->db;
		$query = "SELECT nbsolved,fname FROM users ORDER BY nbsolved DESC";
		$pre = $con->prepare($query);
		$pre->execute();
		$pre->setFetchMode(PDO::FETCH_ASSOC);
			return  $pre->fetchall();

	}

	public function insrReward(){
		$con = $this->db;
		$query = "INSERT INTO rewards SET html=:html,point=:point,description=:description,image=:image";
		$pre = $con->prepare($query);
		$pre->bindParam(":html",$this->html);
		$pre->bindParam(":description",$this->description);
		$pre->bindParam(":image",$this->image);
		$pre->bindParam(":point",$this->point);

		if ($pre->execute()) {
			return  1 ;
		}else{
			return 0 ;
		}

	}

	public function getUsersEmail(){

		$con = $this->db;
		$query = "SELECT email FROM users ";
		$pre = $con->prepare($query);
		$pre->execute();
		$pre->setFetchMode(PDO::FETCH_ASSOC);
			return  $pre->fetchall();

	}
	public function getAdmEmail(){

		$con = $this->db;
		$query = "SELECT email FROM admins ";
		$pre = $con->prepare($query);
		$pre->execute();
		$pre->setFetchMode(PDO::FETCH_ASSOC);
			return  $pre->fetchall();

	}

	public function chngPassword(){
		$conn = $this->db;
		$query = "UPDATE admins SET password=:password WHERE email=:email";
		$pre= $conn->prepare($query);
		$pre->bindParam(":password",$this->password);
		$pre->bindParam(":email",$this->email);
		
		if ($pre->execute()) {
				return true ;
			}
			return false ; 

	}

	




	}
?>