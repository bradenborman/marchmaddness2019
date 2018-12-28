<?php

	require '../../Php_Scripts/db_connect.php';

	$teamId = trim($_POST['teamId']);
	$roundOf = trim($_POST['roundOf']);
	$oldValue = trim($_POST['oldValue']);
	$newValue = trim($_POST['newValue']);
	
	$roundOf = $roundOf / 2;
	echo " Passed: ID: ".$teamId." <br>Round: ".$roundOf. " <br>Old Value: ".$oldValue. " <br>New Value: ".$newValue. "<br>";


	
	
	
	
	
	
	
	
	//UPDATE CURRENT PRICE in TEAMS
	//INSERT UPDATE PRICE HISTORY


	$SQL_UPDATE_TEAM = "UPDATE `TEAMS` SET `CURRENT_PRICE` = '$newValue' WHERE `TEAMS`.`TEAM_ID` = '$teamId'";
	if (!mysqli_query($conn, $SQL_UPDATE_TEAM))
		echo("Error description: " . mysqli_error($conn));
	
	
		
	$team_sql = "SELECT PRICE_ID FROM `PRICE_HISTORY` WHERE TEAM_ID = '$teamId' AND Round_ID = '$roundOf'";
	$team = $conn->query($team_sql);	
	while ($row = mysqli_fetch_array($team))
			$PRICE_ID = $row['PRICE_ID'];

	
	if(isset($PRICE_ID))
		$isThere = true;
	else
		$isThere = false;
		



	if(!$isThere) {
			$SQL_INSERT_NEW_HISTORY = "INSERT INTO `PRICE_HISTORY` (`PRICE_ID`, `Team_ID`, `Round_ID`, `VALUE`) VALUES (NULL, '$teamId', '$roundOf', '$newValue');";
			if (!mysqli_query($conn, $SQL_INSERT_NEW_HISTORY)) {
				echo("Error description: " . mysqli_error($conn));
				//EXIT TO ERROR PAGE TODO
					header('Location: https://cbbbluechips.com/');
					exit();	
			}

	} else {
	
		$SQL_UPDATE_NEW_HISTORY = "UPDATE `PRICE_HISTORY` SET `VALUE` = '$newValue' WHERE `PRICE_HISTORY`.`PRICE_ID` = '$PRICE_ID'";
		if (!mysqli_query($conn, $SQL_UPDATE_NEW_HISTORY)) {
			echo("Error description: " . mysqli_error($conn));
			//EXIT TO ERROR PAGE TODO
				header('Location: https://cbbbluechips.com/');
				exit();	
		}
	}










header('Location: https://cbbbluechips.com/admin/?message="History Added"');
exit();
			
?>