<?php
	$Current_round_SQL = $conn->query("SELECT * FROM `GENERAL_SETTINGS`");
		while ($row = mysqli_fetch_array($Current_round_SQL))
	  	 	$Current_round =  $row['CURRENT_ROUND'];
	  	 	
	  	 	 	
	  	 	
?>