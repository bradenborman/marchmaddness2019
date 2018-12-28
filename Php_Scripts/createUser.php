<?php
	require 'db_connect.php';	
	$STARTING_CASH = "100000";
	
	
	$isThere = false;	

	
	if (isset($_POST['fname']))
		$fname = trim($_POST['fname']);
			
	if (isset($_POST['lname']))
		$lname = trim($_POST['lname']);
		
	if (isset($_POST['email_new']))
		$email = trim($_POST['email_new']);
		
	if (isset($_POST['password_new']))
		$password = trim($_POST['password_new']);
		
	if (isset($_POST['passwordHint']))
		$hint = trim($_POST['passwordHint']);
			
			
	$check_user_sql = "SELECT count(*) FROM `USER` where EMAIL = '".$email."'";	

	$USERSSQL = $conn->query($check_user_sql);
	while ($row = mysqli_fetch_array($USERSSQL)){
		if($row[0] > 0) {
			$isThere = true;
		}	
	}
		
	if($isThere)
		echo "Already used that email";
	else {
	
	    if (isset($fname) && isset($lname) && isset($email) && isset($password) && isset($hint))
	    {				
	$sql = "INSERT INTO `blue_chips`.`USER` (`USER_ID`, `FIRST_NAME`, `LAST_NAME`, `EMAIL`, `PASSWORD`, `PASSWORD_HINT`, `USER_CASH`, `TOTAL_SPENT`, `TOTAL_TRANSACTIONS`) VALUES (NULL, '$fname', '$lname', '$email', '$password', '$hint', '$STARTING_CASH', '0', '0')";		
			echo $sql;
			
			if (!mysqli_query($conn, $sql))
			{
				echo("Error description: " . mysqli_error($conn));
			}else
			{
				echo "User Inserted";
				setcookie(username, $email, time() + (365 * 24 * 60 * 60), "/");
				header('Location: https://cbbbluechips.com/');
				exit();
			}
	    }
	
	}
				
?>
