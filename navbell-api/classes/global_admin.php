<?php
/**
* 
*/
class Dashboard
{
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
	}
?>