<?php
	if(isset($_GET['email']))
		$USERS_EMAIL = $_GET['email'];
	else {
		header('Location: https://cbbbluechips.com/');
		exit();
	}
	
	require 'db_connect.php';
	$getEmail = "SELECT * FROM USER WHERE EMAIL = '$USERS_EMAIL'";	
	$CheckSQL= $conn->query($getEmail);	
	while ($row = mysqli_fetch_array($CheckSQL)) {
		$PASSWORD = $row['PASSWORD'];
	}

$to = "bradenborman00@gmail.com";
$subject = "Blue Chips Password";
$txt = "As requested, here is the password for " .$USERS_EMAIL. ": ".$PASSWORD;
$headers = "From: password_recovery@cbbbluechips.com" . "\r\n" .
"BCC: bradenborman@hotmail.com";

if(mail($to,$subject,$txt,$headers)) 
	$sent = true;
else {
	$sent = false;
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</head>
<body>
  <div class="jumbotron">
  <div class="container">
  
  
  <?php 
  	if($sent)  {
  		echo '<h1>Password Sent</h1>';
  		echo '<p>Please check your email in a couple minutes. More than likely it will be in the <i><b>Spam</b></i> folder.</p>';
  	
  	}else{
  		echo '<h1>Password Recovery Unsuccessful</h1>';
  		echo '<p>Please try again</p>';
  	}
  ?>
  </div>   
</div>
<script>
	setTimeout(function(){ location.href="https://cbbbluechips.com"; }, 4000);
</script>
</body>
</html>