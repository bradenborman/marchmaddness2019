<?php

	if( isset($_COOKIE["username"]))
		$Username = $_COOKIE["username"];
	else {
			$ID = null;
			setcookie("username", "",  time()-3600, "/");	
			header('Location: https://cbbbluechips.com/');
			exit();	
		}
	
	
		
	if($Username != "bradenborman@hotmail.com") {
		header('Location: https://cbbbluechips.com/');
		exit();	
	}
	
		
?>