<?php
	require 'db_connect.php';
	
	$SQL = $conn->query("SELECT CURRENT_ROUND FROM `GENERAL_SETTINGS`");
	while ($r = mysqli_fetch_array($SQL)){
		$current_round = $r['CURRENT_ROUND'];	
	}
	

?>