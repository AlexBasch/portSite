<?php

 	header("Access-Control-Allow-Origin: *");
		
	class Project{
		public $project;
		public $description;
		public $thumbnail;
		public $document;
	}
	class Projects{
		public $projects;
	}
		
	require 'Slim/Slim.php';
	\Slim\Slim::registerAutoloader();
	
	$app = new \Slim\Slim();
	
	$app -> get('/projects/',function(){
		
	$servername = "sql2.freemysqlhosting.net";
	$username = "sql294395";
	$password = "wU8!yA5*";
	$dbname = "sql294395";

	// Create connection
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	// Check connection
	if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
	}
		
		$sql = "SELECT * FROM Information";
		
		$result = mysqli_query($conn, $sql);
	
		$projects = new Projects();
		$projects->projects = array();
		
		while($row = $result->fetch_array()){
    	
			$project1 = new Project();
			$project1 -> project = $row["project"];
			$project1 -> description = $row["description"];
			$project1 -> thumbnail = $row["thumbnail"];
			$project1 -> document = $row["document"];
			array_push($projects->projects, $project1);
		}
		
		echo json_encode($projects);	
	});
		
	$app -> run();
	
	


?>