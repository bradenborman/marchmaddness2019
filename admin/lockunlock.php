<?php
	require '../Php_Scripts/db_connect.php';
	$Team_sql = "SELECT * FROM `TEAMS`";	
	$Teams = $conn->query($Team_sql);	
	
	if(isset($_GET['teamID'])) {
		$TEAM_ID_SELECTED = $_GET['teamID'];				
		$team_sql = "SELECT * FROM `TEAMS` WHERE TEAM_ID = '$TEAM_ID_SELECTED'";
	}	
	
?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <title>Bluechip Admin</title>
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
                  <h3>Lock / Unlock</h3>
               </center>
            </div>
			<div class="col-sm-12">
					
					  
			
				
					
					  <select onChange="loadTeamData(this.value)" style="margin-bottom: 20px;" id="ddTeam" name="team" class="custom-select-lg">
					  <option selected  disabled="disabled">Select Team</option>
						<?php
								while ($row = mysqli_fetch_array($Teams)) {
									$TEAM_ID = $row['TEAM_ID'];
									$TEAM_NAME = $row['TEAM_NAME'];
									echo '<option value="'.$TEAM_ID.'">'.$TEAM_NAME.'</option>';
								}
	
							?>
					  </select>
					 
					<?php 
					
						if(isset($_GET['teamID'])) {
						$team = $conn->query($team_sql);	
						while ($row = mysqli_fetch_array($team)) {
							$isOut = $row['TEAM_IS_KNOCKED_OUT'];
							$isLocked = $row['ISTEAMLOCKED'];
							$name = $row['TEAM_NAME'];
						}
						?>
										<br />
				
				
							<h2><?php echo $name; ?></h2>
				
							<form class="form" method="post" action="Php_Scripts/lock_unlock.php">
				
							
								<input style="display: none;" type="text" name="team" value="<?php echo $TEAM_ID_SELECTED; ?>">  	
							
							
								<label class="switch">
								  <input <?php if($isLocked) echo "CHECKED"; ?> type="checkbox" name="isLocked" id="isLockedDy">  					  
								  <span class="slider round"></span>
								</label>
								 <label for="isLocked">Is locked:</label>
								
								<br />
							
							 
								<label class="switch">
								  <input <?php if($isOut) echo "CHECKED"; ?> type="checkbox"  name="isKnockedOut" id="isKnockedOutDy"> 
								  <span class="slider round"></span>
								</label>
								<label for="isKnockedOut">Is knocked out:</label>
								
								
								<br />	<br />
								 <button type="submit" class="btn btn-primary">Submit</button>			
						</form>
					<?php 
						}

					?>
									
					 
            </div>	
            </div>
			
         </div>
	 </div>
	 
	 <script>
	 
	 
	 
	 
	 
	 
	 
	 function loadTeamData(teamId) {
            	window.location.href = "https://cbbbluechips.com/admin/lockunlock.php?teamID=" + teamId;
              	
         }
	 	
	 </script>
	 
	 
	 
	 
	 
	 
	 
	 
   </body>
</html>