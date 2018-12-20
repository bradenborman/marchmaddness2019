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
         <div class="row">
            <div class="col-sm-4">
               <center>
                  <h4>Team Management</h4>
               </center>
               <div class="list-group">
                  <a href="addTeam.html" class="list-group-item list-group-item-action"><i class="fas fa-plus"></i> Add Team</a>
                  <a href="removeTeam.html" class="list-group-item list-group-item-action"><i class="fas fa-minus"></i> Remove Team</a>
                  <a href="editTeam.html" class="list-group-item list-group-item-action"><i class="fas fa-edit"></i>Edit Team</a>
               </div>
            </div>
            <div class="col-sm-4">
               <center>
                  <h4>User managment</h4>
               </center>
               <div class="list-group">
                  <a href="newUser.html" class="list-group-item list-group-item-action"><i class="fas fa-file-alt"></i> New User</a>
                  <a href="removeUser.html" class="list-group-item list-group-item-action"><i class="fas fa-user-slash"></i> Remove User</a>
                  <a href="editUser.html" class="list-group-item list-group-item-action"><i class="fas fa-user-edit"></i> Edit User</a>
               </div>
            </div>
            <div class="col-sm-4">
               <center>
                  <h4>Universal Settings</h4>
               </center>
               <div class="list-group">
                  <a href="changeRound.html" class="list-group-item list-group-item-action"><i class="fas fa-marker"></i> Change Round</a>
                  <a href="lockunlock.html" class="list-group-item list-group-item-action"><i class="fas fa-lock-open"></i> Lock/Unlock </a>
                  <a href="updateValue.html" class="list-group-item list-group-item-action"><i class="fas fa-money-bill-wave-alt"></i> Update Value</a>
               </div>
            </div>
         </div>
 
		<!-- END TEMPLATE -->
 
 
		<div class="row tool">
            <div class="col-sm-12">
               <center>
                  <h3>Lock / Unlock</h3>
               </center>
            </div>
			<div class="col-sm-12">
					
					  <select style="margin-bottom: 20px;" name="team" class="custom-select-lg"><!-- SET PHP LOAD TEAMS LINK TO PHP SCRIPT THAT TAKE NAME AND DELETES -->
						<option value="volvo">Large Custom Select Menu</option>
						<option value="volvo">Volvo</option>
						<option value="fiat">Fiat</option>
						<option value="audi">Audi</option>
					  </select>
					  
			
					<form class="form" action="php/lock_unlock.php"> <!-- SET PHP HERE -->
					
					 
					  <label for="teamId">Team Id:</label>
					  <input readonly type="text" class="form-control" name="teamId" id="teamId">
					
					  <label for="teamName">Team Name:</label>
					  <input readonly type="text" class="form-control" name="teamName" id="teamName">
					
						<br />
					
					 <label for="isLocked">Is locked:</label>
						<label class="switch">
						  <input checked type="checkbox" name="isLocked" id="isLocked">  <!-- SET PHP HERE -- if locked print CHECKED -->
						  <span class="slider round"></span>
						</label>
						
								<br />	<br />
					  <button type="submit" class="btn btn-primary">Submit</button>			
					</form>
            </div>
			
			
			
         </div>
	 </div>
   </body>
</html>