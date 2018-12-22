<?php	
	$servername = "localhost";
	$username = "blue_chips_sql";
	$password = "Borm0000$";
	$dbname = "blue_chips";
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error)
	    die("Connection failed: " . $conn->connect_error);
?>	    
