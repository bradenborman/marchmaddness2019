<?php 

	$TEAMS_USER_OWNS = $conn->query("SELECT * FROM `OWNS` WHERE `USER_ID`= '$ID' AND not `TEAM_ID` = '0' AND AMOUNT_OWNED > 0");	
	while ($r = mysqli_fetch_array($TEAMS_USER_OWNS)) {		
		 array_push($MyTeams, $r['TEAM_ID']);
	}
	
?>