<?php
	require '../Php_Scripts/db_connect.php';
	$Team_sql = "SELECT * FROM `TEAMS`";	
	$Teams = $conn->query($Team_sql);
		
	$SQL = $conn->query("SELECT CURRENT_ROUND FROM `GENERAL_SETTINGS`");
	while ($r = mysqli_fetch_array($SQL)){
		$cr = $r['CURRENT_ROUND'];	
	}
?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <title>Bluechip Admin | Update value</title>
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
         <a href="../index.html"><h1>College Basketball's Blue Chips</a> | ADMIN</h1>
      </header>
      <div class="container">
         <?php require 'Php_Scripts/navbar.php'; ?>
		<div class="row tool">
            <div class="col-sm-12">
               <center>
                  <h3>New Value</h3>
                  
                 <p>Will Insert or Update the value of the next round. If its round 32.. will update/insert for 16</p>
               </center>
            </div>
			<div class="col-sm-12">
					
					  <select id="teams" onChange="getOldValue(this.value)" style="margin-bottom: 20px;" name="team" class="custom-select-lg"><!-- SET PHP LOAD TEAMS LINK TO PHP SCRIPT THAT TAKE NAME AND DELETES -->
						<option selected  disabled="disabled">Select Team</option>
						<?php	
							while ($row = mysqli_fetch_array($Teams)) {
								$TEAM_ID = $row['TEAM_ID'];
								$TEAM_NAME = $row['TEAM_NAME'];
								echo '<option value="'.$TEAM_ID.'">'.$TEAM_NAME.'</option>';
							}
	
							?>
					  </select>
					  
			
					<form class="form" method="post" action="Php_Scripts/changeValue.php"> <!-- SET PHP HERE -->
				  
					  <input style="display: none;" readonly type="text" class="form-control" name="teamId" id="teamId">
					
					  <div class="row">
					  <div class="col-sm-6">
					  <label for="teamName">Team Name:</label>
					  <input required   readonly type="text" class="form-control" name="teamName" id="teamName">
					   </div>
					   <div class="col-sm-6">
					  <label for="roundOf">Round of: </label>
					  <input required   readonly type="text" class="form-control" value="<?php echo $cr; ?>" name="roundOf" id="roundOf"> <!-- PHP PRRINT CURRENT ROUND -->
					   </div>
					 </div>	
					  
					  
					   <div class="row">
					  <div class="col-sm-6">
					  <label for="oldValue">Old Value:</label>
					  <input required   readonly type="text" class="form-control" name="oldValue" id="oldValue">
					  </div>
					   <div class="col-sm-6">
					  <label for="newValue">Next Round Value:</label>
					  <input required  type="number" class="form-control" name="newValue" id="newValue">
					  </div>
					 </div>		<br />	<br />
					  <button type="submit" class="btn btn-primary">Submit</button>			
					</form>
            </div>	
         </div>
		 
		 
		 
		 
<script>
	$(document).ready(function(){
	  $("#teams").change(function(){
		var teamID = $(this).val()
		var name = $("#teams option:selected").text();
			$('#teamId').val(teamID)
			$('#teamName').val(name)
	  });
	});
	
		
	function getOldValue(x) {
	var xmlhttp = new XMLHttpRequest();
	    xmlhttp.onreadystatechange = function() {
	      if (this.readyState == 4 && this.status == 200) {
	        $('#oldValue').val(this.responseText)
	      }
	    };
	    xmlhttp.open("GET", "Php_Scripts/getOldValue.php?teamId=" + x, true);
	    xmlhttp.send();
	    
	    setTimeout(function(){ removeSpaces() }, 450);
	    
	}
	

	function removeSpaces() {
		var value = $('#oldValue').val()
				
		var news = value.replace(/\s/g, "");
		$('#oldValue').val(news)
		
		
	}
	
	
</script>	 
	 </div>
   </body>
</html>