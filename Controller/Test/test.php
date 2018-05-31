<?php
	$host='localhost';
	$dbName = 'manga';
	$username = 'postgres';
	$password = 'Parkboyoung';
	$dbconfig = "pgsql:host=$host;port=5432;dbname=$dbName;user=$username;password=$password";

	try{
		// create a PostgreSQL database connection
		$database = new PDO($dbconfig);
	 
		// display a message if connected to the PostgreSQL successfully
		if($database){
			echo "Connected to the <strong>$db</strong> database successfully!";
			$sql = 'SELECT * from manga';
			$result = $database->query($sql);
			$result->setFetchMode(PDO::FETCH_ASSOC);
			$row = $result->fetchAll();
			var_dump($row);
		}
	}catch (PDOException $e){
		// report error message
		echo $e->getMessage();
	}
?>
