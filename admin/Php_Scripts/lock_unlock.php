<?php
require '../../Php_Scripts/db_connect.php';



	$isLocked = getBool(trim($_POST['isLocked']));
	$isKnockedOut = getBool(trim($_POST['isKnockedOut']));
	$team = trim($_POST['team']);
	
	
	echo "<br>isLocked : ";
	echo $isLocked;
	echo "<br>isKnockedOut : ";
	echo $isKnockedOut;
	echo "<br>team: ";
	echo $team;
	
	
	$SQL_INSERT_NEW_TEAM = "UPDATE `TEAMS` SET `TEAM_IS_KNOCKED_OUT` = '$isKnockedOut', ISTEAMLOCKED = '$isLocked' WHERE `TEAMS`.`TEAM_ID` = '$team';";
	if (!mysqli_query($conn, $SQL_INSERT_NEW_TEAM))
		echo("Error description: " . mysqli_error($conn));
	else {
		header('Location: https://cbbbluechips.com/admin/?message="Team Adjusted"');
		exit();
	}
		
		
		
	function getBool($x) {
		if($x == "on") 
			return true;
	
	}	
	
?>