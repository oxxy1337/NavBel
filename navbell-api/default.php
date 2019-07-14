<?php
/*
coded by m .slamat 
*/
/******************************************************/
/* This file is a documentation How to use my RestfulAPI 
/******************************************************/
$data = array(
	"Message"=>"Welcome to NavBel RestfullAPI for (android,website & dashboard) applications",
	"Security Tooken" => "The security tooken must sent in METHOD GET  which name is tooken",
	"Operations" => "To specify the operation you must send operation name in GET METHOD which name is op",
	"Explain oprations" => array(
			"Message"=>"Send operation name to GET PARAMATER op",
			"Check USER" => array(
							"PARAMATER GET "=>"?op=check",
							"DATA IN " => array(
									"METHOD"=>"POST",
									"email"=>"email@example.com"
							),
							"DATA OUT" => array(
									"reponse" =>"0 (if USER BANNED Reason of bad use OR security issues attack",
									"reponse "=>"1 (user have right to subscrib )",
									"reponse "=>"2 (user already subscribed)",
									"reponse "=>"3 (user not from whitelist i mean not from esi or not found in allstudent table)",
							)),
			"Regstration of new USER"=> array(
							"PARAMATER GET" => "?op=signin",
							"DATA IN " => array(
									"METHOD"=>"POST",
									"email" => "email@example.com",
									"fname"=>"Mohamed",
									"lname"=>"Slamat",
									"password"=>"$up3rH4rdP4$$0rd",
									"picture"=>"binary data coded to bas64",
									"year"=>3,
									"ispublic"=>1

							),
							"DATA OUT" =>array(
									"reponse"=> "1 (if operation done with success)",
									"reponse"=>"0 (if operation has a technical problem or DB connection error)",
									"fname"=>"Mohamed",
									"lname"=>"Slamat",
									"email"=>"email@example.com",
									"picture"=>"http://serverurl/images/image.jpg",
									"date"=>"2019/03/03 17:17:17",
									"id"=>1
							)


			),
			"Login " =>array(
							"PARAMETER GET"=>"?op=login",
							"DATA IN"=>array(
								"METHOD"=>"POST",
								"email"=>"email@example.com",
								"password"=>"$up3rH4rdP4$$0rd"
							),
							"DATA OUT"=>array(
								"id"=>1,
								"picture"=>"http://serverurl/images/image.jpg",
								"email" => "email@example.com",
								"fname"=>"Mohamed",
								"lname"=>"Slamat",
								"year"=>3,
								"ispublic"=>1,
								"date"=>"2019/03/03 17:17:17",
								"nbsolved"=>0,
								"currentrank"=>0,
								"point"=>0,
								"reponse"=>"1 (if email & password macthed)",
								"reponse"=>"4 (if email or password missmacth)"


							)
						),
			"Send reset code to USER email"=>array(
							"PARAMATER GET"=>"?op=rcode",
							"DATA IN "=>array(
								"METHOD"=>"POST",
								"email"=>"email@example.com"
							),
							"DATA OUT" =>array(
								"reponse" => "1 (if operation done with success)",
								"reponse 2" => "0 (if operation has a technical problem or DB connection error)",
								"code"=>12345
							)

						),
			"Update User Password"=> array(
							"PARAMETER GET"=> "?op=reset",
							"DATA IN " => array(
									"METHOD"=>"POST",
									"email"=>"email@example.com",
									"password"=>"$up3rS3condP4ss"

							),
							"DATA OUT" =>array(
								"reponse" => "1",
								"reponse 2" => "0"	
							)


			),
			"Send challenges" =>array(
							"PARAMETER GET " => "?op=challenges",
							"DATA IN" => array(
									"METHOD"=>"POST",
									"id"=>"1 (user id)",
									"year"=>"3 (user year)"
								),
							"DATA OUT "=> array(
									"		challenges"=>array(array(
											"id"=>10,
											"point"=>1337,
											"module"=>"POO",
											"story"=>"challenge Description",
											"nbOfQuestions"=>1,
											"nbOfPersonSolved"=>2,
											"createdby" => "ENSEIGNANT NAME",
											"reponse" =>" 1 (if it was done with success)",
											"reponse 2"=>"-1 (challenge list null )",

									))

								)
				),
		"Send Questions" => array(
							"PARAMETER GET" => "?op=questions",
							"DATA IN "=> array(
								"METHOD"=>"POST",
								"id"=>"84 ( id of challenge)"

							),
							"DATA OUT " => array( 
							"questions"=>array(
								"time"=>15,
								"id"=>4,
								"question"=>"1+1=?",
								"point"=>"15",
								"options"=>array(array("id"=>89,"trueoption"=>2))),
							"id"=>14,
							"resource"=>array(array("course"=>"havard","name"=>"poo")),
							"reponse"=>1
							)
							),


		"Check if challenge has been solved by max of USERS"=>array(
					"PARAMETER GET" => "?op=nbsolved",
					"DATA IN"=> array(
						"METHOD"=>"POST",
						"id"=>"14 (challenge id )",


					),
					"DATA OUT "=>array(
						"reponse" => "1 (challenge not solved yet by nbmax of users)",
						"reponse 2"=>"-1 (challenge not displaying solved by nbmax of users)"

					)


		),
		"Check if Challenge already solved by requested USER" => array(
					"PARAMETER GET" => "?op=trychallenge",
					"DATA IN " => array(

						"METHOD"=>"POST",
						"id"=>"18 (user id )",
						"challengeid"=>14

					),
					"DATA OUT" => array(
						"reponse" => 1,
						"reponse 2"=>"-1 ( Challenge already solved by user )"
					)
		),
		"DASHBOARD Operations" => array(
				"Message" => "For requesting dashboard operations there too PARAMATER GET required op=admins & op2=(dashboard operations)",
		)

));

die(json_encode($data));
?>