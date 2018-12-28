<?php
	require '../Php_Scripts/db_connect.php';
	$Team_sql = "SELECT * FROM `TEAMS`";	
	$Teams = $conn->query($Team_sql);	

?>

<!DOCTYPE html>
<html lang="en">
   <head>
      <title>Bluechip Admin Remove Team</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css" integrity="sha384-/rXc/GQVaYpyDdyxK+ecHPVYJSN9bmVFBvjA/9eOB+pb3F2w2N6fc5qB9Ew5yIns" crossorigin="anonymous">
      <link rel="stylesheet" type="text/css" href="css/style.css">
      <link href='https://fonts.googleapis.com/css?family=Alfa Slab One' rel='stylesheet'>
      <script src="scripts/general.js"></script>
      <style>     	
		select{
		    -webkit-appearance: none;
		    -moz-appearance: none;
		    appearance: none;
		    padding: 15px;
		}
		
		button {
			margin-top: 15px;
			padding: 45px;
		}
		
      </style>
   </head>
   <body>
      <header class="header">
         <div id="logo"></div>
         <h1>College Basketball's Blue Chips | ADMIN</h1>
      </header>
      <div class="container">
       	<?php require 'Php_Scripts/navbar.php'; ?>
		<div class="row tool">
            <div class="col-sm-12">
               <center>
                  <h3>Remove Team</h3>
               </center>
            </div>
			<div class="col-sm-12">
					<form class="form" method="post" action="Php_Scripts/removeTeam.php"> <!-- SET PHP HERE -->
					  <select required name="team" class="custom-select-lg">
							<?php
								while ($row = mysqli_fetch_array($Teams)) {
									$TEAM_ID = $row['TEAM_ID'];
									$TEAM_NAME = $row['TEAM_NAME'];
									echo '<option value="'.$TEAM_ID.'">'.$TEAM_NAME.'</option>';
								}
								
								
							?>
					  </select>
					  <br />
					  	<button type="submit" class="sell btn btn-danger">Remove Team</button>
					</form>
            </div>
			
			
			
         </div>
	 </div>
   </body>
</html>