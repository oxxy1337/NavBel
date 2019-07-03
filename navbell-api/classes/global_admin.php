<?php
/**
* 
*/
class Dashboard
{
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
}
?>