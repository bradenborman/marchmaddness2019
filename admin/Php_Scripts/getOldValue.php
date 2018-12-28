<?php
	require '../../Php_Scripts/db_connect.php';
		
	if(isset($_GET['teamId'])) {
		
		$TEAM_ID = $_GET['teamId'];
		$Team_sql = "SELECT CURRENT_PRICE FROM `TEAMS` WHERE TEAM_ID = '$TEAM_ID'";	
		$Teams = $conn->query($Team_sql);
		while ($row = mysqli_fetch_array($Teams)) {
			echo trim($row['CURRENT_PRICE']);
		}
		
	}
	
	
	

?>