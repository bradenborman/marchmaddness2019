<?php

   	if( isset($_COOKIE["username"]))
		$Username = $_COOKIE["username"];
	else {
		$ID = null;
		setcookie("username", "",  time()-3600, "/");	
		header('Location: https://cbbbluechips.com/');
		exit();	
	}
		
		
	$sqlUser = "SELECT * FROM `USER` WHERE EMAIL = '$Username'";	
	$User = $conn->query($sqlUser);	
	while ($row = mysqli_fetch_array($User)) {
			$ID = $row['USER_ID'];
			$NAME = $row['FIRST_NAME']. " ". $row['LAST_NAME'];
	}		
			
	if(isset($_COOKIE["username"]) && $ID == null)
	{
		setcookie("username", "",  time()-3600, "/");	
		header('Location: https://cbbbluechips.com/');
		exit();	
	}
	
	
?>