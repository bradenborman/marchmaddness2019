<?php
	require '../../Php_Scripts/db_connect.php';
	require 'loginManager.php'; // handles login returns $ID
		
	if (isset($_POST['buy_amount'])) {
			$Amount_to_buy = trim($_POST['buy_amount']);
			$isFee = trim($_POST['isFee']);
			$Team_ID = trim($_POST['teamId']);
	} else {
			header('Location: https://cbbbluechips.com/');
			exit();	
	}	
					
	//Gets $total 
	$Team_sql = "SELECT CURRENT_PRICE FROM `TEAMS` WHERE TEAM_ID = '$Team_ID'";	
	$Team_Price = $conn->query($Team_sql);	
	while ($row = mysqli_fetch_array($Team_Price))
			$PRICE = $row['CURRENT_PRICE'];
	
	if($isFee)
		$total =  ($PRICE * $Amount_to_buy) + $PRICE;
	else 
		$total =  ($PRICE * $Amount_to_buy);

	//Gets $Cash_open
	$User_sql = "SELECT * FROM `USER` WHERE USER_ID = '$ID'";	
	$Cash = $conn->query($User_sql);	
	while ($row = mysqli_fetch_array($Cash))
			$Cash_open = $row['USER_CASH'];
		
	if($Cash_open >= $total)
		$OKAY_TO_BUY = true;
	

		
		if($OKAY_TO_BUY) //CHECK OWNS TABLE
		{
		
			$UPDATE_OWNS_TABLE = false;
			
			$sql = "SELECT AMOUNT_OWNED FROM `OWNS` WHERE  USER_ID = $ID AND TEAM_ID = $Team_ID";	
			$result = $conn->query($sql);		
			while ($row = mysqli_fetch_array($result)) 		
				if($row['AMOUNT_OWNED'] >= 0)
					$UPDATE_OWNS_TABLE = true;
			
			
			if($UPDATE_OWNS_TABLE) {
					
					$sql_update_owns = "UPDATE `blue_chips`.`OWNS` SET AMOUNT_OWNED = AMOUNT_OWNED + '$Amount_to_buy', TOTAL_SPENT_ON_SHARE = TOTAL_SPENT_ON_SHARE + '$total' WHERE  USER_ID = $ID AND TEAM_ID = $Team_ID";
					if (!mysqli_query($conn, $sql_update_owns))
			  			echo("Error description: " . mysqli_error($conn));
			
			} else {
				$SQL = "INSERT INTO `OWNS` (`OWNS_ID`, `USER_ID`, `TEAM_ID`, `AMOUNT_OWNED`, `TOTAL_SPENT_ON_SHARE`) VALUES (NULL, '$ID', '$Team_ID', '$Amount_to_buy', '$total')";
				if (!mysqli_query($conn, $SQL))
			  			echo("Error description: " . mysqli_error($conn));
			}
			
			
			//END UPDATE OWNS	
			/********************************************/	
			//UPDATE USER TOTAL SPEND AND TOTAL TRANSACTION  => ADD to total ADD to spent Subtract from cash
			
			
			
					
			$sql_update_USER = "UPDATE `blue_chips`.`USER` SET USER_CASH = USER_CASH - '$total', TOTAL_SPENT = TOTAL_SPENT + '$total', TOTAL_TRANSACTIONS = TOTAL_TRANSACTIONS + 1 WHERE  USER_ID = $ID";
					if (!mysqli_query($conn, $sql_update_USER))
			  			echo("Error description: " . mysqli_error($conn));
			  		else
			  			header('Location: https://cbbbluechips.com/portfolio/');
						exit();	
		}else {
			header('Location: https://cbbbluechips.com/portfolio/');
			exit();	
		}
		
?>