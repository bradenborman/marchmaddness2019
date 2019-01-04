<?php
	//todo validate login too
	
	if(isset($_GET['team']))
		$TEAM_ID = $_GET['team'];
	else 
		header('Location: https://cbbbluechips.com/portfolio/');
	
	if(!isset($ID))
		header('Location: https://cbbbluechips.com/');
		
	
	$TEAM_info_sql = $conn->query("SELECT *, (SELECT SUM(AMOUNT_OWNED) FROM `OWNS` WHERE OWNS.TEAM_ID = TEAMS.TEAM_ID) as SHARES_OUTSTANDING FROM TEAMS WHERE `TEAM_ID`= $TEAM_ID");
	
	while ($r = mysqli_fetch_array($TEAM_info_sql)){
		$CURRENT_PRICE = $r['CURRENT_PRICE'];
		$URL = $r['LOGO_URL'];
		$TEAM_NAME = $r['TEAM_NAME'];
		$SHARES_OUTSTANDING = $r['SHARES_OUTSTANDING'];
		$ISTEAMLOCKED = $r['ISTEAMLOCKED'];
	}
		
	if($TEAM_NAME == '')
			header('Location: https://cbbbluechips.com/portfolio/');
		
		
			
	$USER_CASH_SQL = $conn->query("SELECT USER_CASH FROM `USER` WHERE `USER_ID` = $ID");
	while ($r = mysqli_fetch_array($USER_CASH_SQL)){
		$CASH = $r['USER_CASH'];
	}	
		
		
	$OWNS_SQL = $conn->query("SELECT * FROM `OWNS` WHERE `USER_ID` = $ID AND `TEAM_ID`= $TEAM_ID");
	while ($r = mysqli_fetch_array($OWNS_SQL)){
		$Shares_Already_Owned = $r['AMOUNT_OWNED'];
	}	
		
?>