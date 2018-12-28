<?php 
	
	$Money_in_play_sql = $conn->query("SELECT SUM(CURRENT_PRICE * AMOUNT_OWNED) + (SELECT SUM(USER_CASH) from USER) as grandTotal FROM `OWNS` JOIN TEAMS ON TEAMS.Team_ID = OWNS.Team_ID");
	while ($r = mysqli_fetch_array($Money_in_play_sql)){
		$GRAND_TOTAL_IN_PLAY = $r['grandTotal'];	
	}
	
?>