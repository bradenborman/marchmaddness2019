<?php 
	require 'db_connect.php';
	
	if(isset($_POST["email"]))
		$email = $_POST["email"];
	
	if(isset($_POST["password"]))
		$password = $_POST["password"];
	
		
	$login = "SELECT * FROM USER WHERE EMAIL = '$email'";	
	$CheckSQL= $conn->query($login);
		
	while ($row = mysqli_fetch_array($CheckSQL)) {
		
		if($row['PASSWORD'] == $password)
		{
			echo $email;
			echo $password;		
			setcookie(username, $email, time() + (365 * 24 * 60 * 60), "/");
			header('Location: https://cbbbluechips.com/portfolio');
			exit();
		}else {
			setcookie("username", "",  time()-3600, "/");
			$PASSWORD_HINT = $row['PASSWORD_HINT'];
			header('Location: https://cbbbluechips.com/?passwordHint="'.$PASSWORD_HINT.'"');
			exit();
		}		
	} 
	
	
	
	setcookie("username", "",  time()-3600, "/");
	$error = "No user could be found";
	header('Location: https://cbbbluechips.com/?error="'.$error.'"');
	exit();
		
	 
?>