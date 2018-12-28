<?php

	require '../../Php_Scripts/db_connect.php';

	
	
	$roundOf = trim($_POST['roundOf']);
			
			
		if($roundOf == '64' || $roundOf == '32' || $roundOf == '16' || $roundOf == '8' || $roundOf == '4' || $roundOf == '2' || $roundOf == '1') {	
			
		} else {
			header('Location: https://cbbbluechips.com/admin/?message="Wrong round passed: '.$roundOf.'');
			exit();
		}


	$SQL_UPDATE_ROUND = "UPDATE `GENERAL_SETTINGS` SET `CURRENT_ROUND` = '$roundOf' WHERE `GENERAL_SETTINGS`.`GAME_ID` = 1;";
	if (!mysqli_query($conn, $SQL_UPDATE_ROUND))
		echo("Error description: " . mysqli_error($conn));
	else {
		header('Location: https://cbbbluechips.com/admin/?message="Round Updated to: '.$roundOf.'');
		exit();
	}
		

			
?>