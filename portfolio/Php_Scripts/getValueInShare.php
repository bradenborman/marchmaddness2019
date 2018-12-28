<?php

	$Value_in_Shares_sql = $conn->query("SELECT SUM(CURRENT_PRICE * AMOUNT_OWNED) as totalSpent FROM `OWNS` JOIN TEAMS ON TEAMS.Team_ID = OWNS.Team_ID WHERE USER_ID = '$ID'");
	while ($r = mysqli_fetch_array($Value_in_Shares_sql)){
		$Value_in_Shares = $r['totalSpent'];	
	}
	
?>