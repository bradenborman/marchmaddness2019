<?php
	require '../Php_Scripts/db_connect.php';
	require 'Php_Scripts/getLeaderboard.php';
		
?>

<!DOCTYPE html>
<html lang="en">
   <head>
      <title>Leaderboard</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- Latest compiled and minified CSS -->
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
      <!-- jQuery library -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <!-- Popper JS -->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
      <!-- Latest compiled JavaScript -->
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
      <link rel="stylesheet" type="text/css" href="css/style.css">
	  <link href='https://fonts.googleapis.com/css?family=Alfa Slab One' rel='stylesheet'>
	  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
		<script src="scripts/general.js"></script>
   </head>
   <body>

<header class="header"><div id="logo"></div>
  <h1>College Basketballs Blue Chips</h1> 
  <!-- <nav class="nav"> -->
</header> 
  <div class="container">
	<div class="links">
	<a href="../portfolio/">My Portfolio</a>  
	<a href="../portfolio/Php_Scripts/logout.php">Log-out</a>      
	</div>
</div> 
   
   
   
   <div class="container app">
   <div class="card text-center">
  <div class="card-header text-center">
    <h1><i class="fas fa-trophy"></i> Networth</h1>
  </div>
  <div class="card-body">
    
	<div class="row">
			<div class="col-lg-7">
				<table class="table table-hover">
				  <thead>
					<tr>
					  <th scope="col">Ranking</th>
					  <th scope="col"><i class="fas fa-user-circle"></i> Name</th>
					  <th scope="col"><i class="fas fa-dollar-sign"></i> Networth</th>
					</tr>
				  </thead>
				  <tbody>
					<tr>
					<?php
					$INDEX = 0;
					foreach ($PeopleArray as $person) {
					    ++$INDEX;
					    $NAME = str_replace("\r", "", $person-> name);
					    $ID = str_replace("\r", "", $person-> id);
					    $NET = str_replace("\r", "", $person-> networth);					    
					   ?>
					  <th scope="row"><?php echo $INDEX; ?></th>
					  <td><?php echo $NAME; ?></td>
					  <td><?php
					  	if($person-> isMoney) {
					  		//echo '<span style="color: green;">$' .number_format($NET).'</span>';
					  		echo "$" .number_format($NET); 
					  		
					  	}else {
					  	 echo "$" .number_format($NET); 
					  	}
					  ?></td>
					</tr>
				<?php	
						
					}
				?>
				  </tbody>
				</table>
			</div>
			
			<div class="col-lg-5">
			
		
			
				<h3>Winners Purse: $50</h3>
				<hr />
				<p>Thank you all for playing!</p>
			
				<br /><br /><br />
				<div id="lab_social_icon_footer">
					<a style="display: none;" class="linkk" href="https://www.facebook.com/bradenborman"><i class="fab fa-facebook-square"></i></a>
					<a style="display: none;" class="linkk" href="https://twitter.com/middle_Borman?lang=en"><i class="fab fa-twitter"></i></a>	            
					<a style="display: none;" class="linkk" href="https://www.linkedin.com/in/bradyborman/"><i class="fab fa-linkedin"></i></a> 	                   
					<a style="display: none;" class="linkk" href="mailto:bradenborman00@gmail.com"><i class="fas fa-envelope-square"></i></a>
				</div>
				
				</li>
			
			</div>
  </div>
</div>
   
   </div>   
   </body>
</html>