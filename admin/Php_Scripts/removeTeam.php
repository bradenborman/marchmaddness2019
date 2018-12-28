<?php
	require '../../Php_Scripts/db_connect.php';

		
	$TEAMID = $_POST['team'];
	
	
	$SQL_delete_team_ph = "DELETE FROM `PRICE_HISTORY` WHERE `PRICE_HISTORY`.`Team_ID` = '$TEAMID'";
	if (!mysqli_query($conn, $SQL_delete_team_ph)) {
		echo("Error description: " . mysqli_error($conn));
		//EXIT TO ERROR PAGE TODO
			header('Location: https://cbbbluechips.com/admin/?message="'.mysqli_error($conn).'"');
			exit();	
	}

	$SQL_delete_team_TEAM = "DELETE FROM `TEAMS` WHERE `TEAMS`.`Team_ID` = '$TEAMID'";
	if (!mysqli_query($conn, $SQL_delete_team_TEAM)) {
		echo("Error description: " . mysqli_error($conn));
		//EXIT TO ERROR PAGE TODO
			header('Location: https://cbbbluechips.com/admin/?message="'.mysqli_error($conn).'"');
			exit();	
	}
	
	
	$SQL_delete_team_OWNS = "DELETE FROM `OWNS` WHERE `OWNS`.`Team_ID` = '$TEAMID'";
	if (!mysqli_query($conn, $SQL_delete_team_OWNS)) {
		echo("Error description: " . mysqli_error($conn));
		//EXIT TO ERROR PAGE TODO
			header('Location: https://cbbbluechips.com/admin/?message="'.mysqli_error($conn).'"');
			exit();	
	}else {
		header('Location: https://cbbbluechips.com/admin/?message="Team Removed. Deleted From Price History and Owns"');
		exit();	
	}




?>