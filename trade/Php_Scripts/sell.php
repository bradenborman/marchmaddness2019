<?php
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
		
		
	
	
	//GET TOTAL TO ADD
	$Team_cp_sql = "SELECT CURRENT_PRICE FROM `TEAMS` WHERE TEAM_ID = '$Team_ID'";	
	$Team_Price = $conn->query($Team_cp_sql);	
	while ($row = mysqli_fetch_array($Team_Price))
			$Current_Price = $row['CURRENT_PRICE'];		
	
	$total = ($Current_Price * $Amount_to_sell);
		
		
					
	if($Okay_to_sell && isset($Team_ID) && isset($ID))
	{		
		
		$sql_update_owns = "UPDATE `blue_chips`.`OWNS` SET AMOUNT_OWNED = AMOUNT_OWNED - $Amount_to_sell WHERE  USER_ID = '$ID' AND TEAM_ID = '$Team_ID'";
		echo $sql_update_owns;
		
		
		if (!mysqli_query($conn, $sql_update_owns)) {
  			echo("Error description: " . mysqli_error($conn));
			header('Location: https://cbbbluechips.com/portfolio/');
			exit();	
  		}
  		
  			
  		$sql_update_USER = "UPDATE `blue_chips`.`USER` SET USER_CASH = USER_CASH + $total, TOTAL_TRANSACTIONS = TOTAL_TRANSACTIONS + 1 WHERE  USER_ID = '$ID'";
		if (!mysqli_query($conn, $sql_update_USER))
  			echo("Error description: " . mysqli_error($conn));
  				
  				
	}
	
	header('Location: https://cbbbluechips.com/portfolio/');
	exit();	
	
?>