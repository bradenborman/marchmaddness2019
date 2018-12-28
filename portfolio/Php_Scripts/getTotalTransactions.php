<?php

	$totalTransActions = 0;
	
	$MYtotalTransActions = 0;
	
	
	
	$User_sql1 = $conn->query("SELECT sum(TOTAL_TRANSACTIONS) as count FROM `USER`");
	while ($r = mysqli_fetch_array($User_sql1)){
		$totalTransActions = $r['count'];
	}
	
	
	$User_sql = $conn->query("SELECT TOTAL_TRANSACTIONS FROM `USER` WHERE `USER_ID` = '$ID'");
	while ($r = mysqli_fetch_array($User_sql)){
		$MYtotalTransActions = $r['TOTAL_TRANSACTIONS'];
	}
?>