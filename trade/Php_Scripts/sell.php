<?php
	date_default_timezone_set("America/Chicago");
	require '../../Php_Scripts/db_connect.php';
	require 'loginManager.php'; // handles login returns $ID
	$Okay_to_sell = false;
	
		
	if (isset($_POST['sell'])) {
			$Amount_to_sell = trim($_POST['sell']);			
			$Team_ID = trim($_POST['teamId']);
	} else {
			header('Location: https://cbbbluechips.com/');
			exit();	
	}	
	
	$Team_sql = "SELECT AMOUNT_OWNED FROM `OWNS` WHERE TEAM_ID = '$Team_ID' AND USER_ID = '$ID'";	
	$Team_Price = $conn->query($Team_sql);	
	while ($row = mysqli_fetch_array($Team_Price))
			$Amount_Ownded = $row['AMOUNT_OWNED'];		
			
			
	if($Amount_Ownded <= $Amount_to_sell)	
		$Okay_to_sell = true;
		
	
	$User_sqlyy = "SELECT * FROM `USER` WHERE USER_ID = '$ID'";	
	$xxyy = $conn->query($User_sqlyy);
	while ($row = mysqli_fetch_array($xxyy)) {			
			$Fname = $row['FIRST_NAME'];
			$Lname = $row['LAST_NAME'];
	}
	
	
	
	//GET TOTAL TO ADD
	$Team_cp_sql = "SELECT CURRENT_PRICE, TEAM_NAME FROM `TEAMS` WHERE TEAM_ID = '$Team_ID'";	
	$Team_Price = $conn->query($Team_cp_sql);	
	while ($row = mysqli_fetch_array($Team_Price)) {
		$Current_Price = $row['CURRENT_PRICE'];	
		$TEAM_NAME = $row['TEAM_NAME'];
			
	}	
	
	$total = ($Current_Price * $Amount_to_sell);
		
		
					
	if($Okay_to_sell && isset($Team_ID) && isset($ID))
	{		
		
		$sql_update_owns = "UPDATE `blue_chips`.`OWNS` SET AMOUNT_OWNED = AMOUNT_OWNED - $Amount_to_sell WHERE  USER_ID = '$ID' AND TEAM_ID = '$Team_ID'";
		
		
		
		if (!mysqli_query($conn, $sql_update_owns)) {
  			echo("Error description: " . mysqli_error($conn));
			header('Location: https://cbbbluechips.com/portfolio/');
			exit();	
  		}
  		
  			
  		$sql_update_USER = "UPDATE `blue_chips`.`USER` SET USER_CASH = USER_CASH + $total, TOTAL_TRANSACTIONS = TOTAL_TRANSACTIONS + 1 WHERE  USER_ID = '$ID'";
		if (!mysqli_query($conn, $sql_update_USER)) {
  			echo("Error description: " . mysqli_error($conn));
  		} else {
  			addToHistory($ID, $Fname, $Lname, $TEAM_NAME, $Amount_to_sell, $total);
  		}
  				
  				
	}
	
	



	function addToHistory($ID, $Fname, $Lname, $TEAM_NAME, $Amount_to_sell, $total) {
		$TEAM_NAME = str_replace(' ', '_', $TEAM_NAME);
		
		$file = '../history/transactions.txt';
		$current = file_get_contents($file);
		$current .= $ID." ".$Fname." ".$Lname." Sell ".$TEAM_NAME." ".$Amount_to_sell." ".$total." ".date("m-d-y h:i:sa")."\n";
		file_put_contents($file, $current);
	}	
		

	header('Location: https://cbbbluechips.com/portfolio/');
	exit();


	
?>