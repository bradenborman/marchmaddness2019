<?php

	$SQL = $conn->query("SELECT CURRENT_ROUND FROM `GENERAL_SETTINGS`");
	while ($r = mysqli_fetch_array($SQL)){
		$cr = $r['CURRENT_ROUND'];	
	}
	
$CurrentRound =	0;
	
switch ($cr) {
    case 64:
        $CurrentRound = "Round of 64";
        break;
    case 32:
        $CurrentRound = "Round of 32";
        break;
    case 16:
        $CurrentRound = "Sweet Sixteen";
        break;
    case 8:
        $CurrentRound = "Elite Eight";
        break;
    case 4:
        $CurrentRound = "Final Four";
        break;
    case 2:
        $CurrentRound = "Championship";
        break;    
    case 1:
        $CurrentRound = "Game over";
        break;     
        
    default:
         $CurrentRound = "Not set";
}
	
	
	

?>