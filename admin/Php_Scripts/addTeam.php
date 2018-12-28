<?php

	require '../../Php_Scripts/db_connect.php';


	if (isset($_POST['teamName'])) {
			$teamName = test_input(trim($_POST['teamName']));
			$seed = test_input(trim($_POST['seed']));
			$ipo = test_input(trim($_POST['ipo']));
			$url = test_input(trim($_POST['url']));
	}else {
			header('Location: https://cbbbluechips.com/');
			exit();	
	}
	
	
	$team_sql = "SELECT * FROM `TEAMS` WHERE TEAM_NAME = '$teamName'";	
	$team = $conn->query($team_sql);	
	while ($row = mysqli_fetch_array($team))
			$TEAM_ID = $row['TEAM_ID'];
	
		
	//CHECK FOR PRIOR ENTRY
	if($TEAM_ID > 0) {
			header('Location: https://cbbbluechips.com/admin/?message="Team Already Exists"');
			exit();	
	}
	
	//Update Current Price in Team
	//Insert into PriceHistory if not there
	/*
	$SQL_INSERT_NEW_TEAM = "UPDATE `blue_chips`.`TEAMS` SET TEAM_NAME = '$teamName', LOGO_URL= '$url', TEAM_SEEDING = '$seed', TEAM_IS_KNOCKED_OUT = '0', CURRENT_PRICE = '$ipo', ISTEAMLOCKED = '0' WHERE  USER_ID = $ID AND TEAM_ID = $Team_ID";
	if (!mysqli_query($conn, $SQL_INSERT_NEW_TEAM))
		echo("Error description: " . mysqli_error($conn));
	else
		echo $teamName. " added";
	*/
	
	
	$SQL_INSERT_NEW_TEAM = "INSERT INTO `TEAMS` (`TEAM_ID`, `TEAM_NAME`, `LOGO_URL`, `TEAM_SEEDING`, `TEAM_IS_KNOCKED_OUT`, `CURRENT_PRICE`, `ISTEAMLOCKED`) VALUES (NULL, '$teamName', '$url', '$seed', '0', '$ipo', '0');";
	if (!mysqli_query($conn, $SQL_INSERT_NEW_TEAM)) {
		echo("Error description: " . mysqli_error($conn));
		//EXIT TO ERROR PAGE TODO
			header('Location: https://cbbbluechips.com/');
			exit();	
	}
	
	$team_sql = "SELECT * FROM `TEAMS` WHERE TEAM_NAME = '$teamName'";	
	$team = $conn->query($team_sql);	
	while ($row = mysqli_fetch_array($team))
			$TEAM_ID = $row['TEAM_ID'];
	
	
	$SQL_INSERT_NEW_TEAM = "INSERT INTO `PRICE_HISTORY` (`PRICE_ID`, `Team_ID`, `Round_ID`, `VALUE`) VALUES (NULL, '$TEAM_ID', '64', '$ipo');";
	if (!mysqli_query($conn, $SQL_INSERT_NEW_TEAM)) {
		echo("Error description: " . mysqli_error($conn));
		//EXIT TO ERROR PAGE TODO
			header('Location: https://cbbbluechips.com/admin/?message="'.mysqli_error($conn).'"');
			exit();	
	}
	else {
		header('Location: https://cbbbluechips.com/admin/?message="Team Added"');
		exit();	
	}
	
	
	
	

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}


	
?>