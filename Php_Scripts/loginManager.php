<?php

   	if( isset($_COOKIE["username"]))
		$Username = $_COOKIE["username"];
		
	$sqlUser = "SELECT * FROM `USER` WHERE EMAIL = '$Username'";	
	$User = $conn->query($sqlUser);	
	while ($row = mysqli_fetch_array($User))
			$ID = $row['USER_ID'];
			
	if(isset($_COOKIE["username"]) && $ID == null)
	{
		setcookie("username", "",  time()-3600, "/");	
		header('Location: https://cbbbluechips.com/');
		exit();
		
	} elseif (isset($_COOKIE["username"]) && isset($ID)) {
		header('Location: https://cbbbluechips.com/portfolio');
		exit();	
	}

?>