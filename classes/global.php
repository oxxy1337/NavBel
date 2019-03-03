<?php
/*
coded by m.slamat
*/
//class contain methodes crud operations in db in & logics 

Class global(){
	private $conn ; 
	private $tables =array('allstudents' => 'allstudents' , 
    					   'users-subscribed' => 'users-subscribed' );
	// Propreties 
	// columns of users-subscribed && allstudents tables
	public $id ;
	public $fname;
	public $lname;
	public $email;
	public $password;
	public $salt = base64_encode(rand(100,999));
	public $picture;
	public $date;
	public $nbsolved;
	public $point;
	public $currentrank;
	public $solvedperday;
	public $ranks;
    // class constructures 
		//db connection
    public function __construct($db){
    	$this->conn = $db;

    }

    public function check_if_existe_in_esi($con,$email){
    		$query = $con->prepare( "SELECT email FROM allstudents WHERE email = ?" );
			$query->bindValue( 1, $email );
			$query->execute();
			if ( $query->rowCount() > 0 ) {
				return true; 
			} else { 
				return false;
				};

    }

	







}