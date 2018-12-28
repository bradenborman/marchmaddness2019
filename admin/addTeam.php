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
                  <h3>Add Team</h3>
               </center>
            </div>
			<div class="col-sm-12">
					<form class="form" method="post" action="Php_Scripts/addTeam.php">
					  <label for="teamName">Team Name:</label>
					  <input type="text" class="form-control" required  name="teamName" id="teamName">
					  
					  
					  <label for="seed">Seeding:</label>
					  <input type="number" min="1" max="16" required  class="form-control" name="seed" id="seed">

					  <label for="ipo">IPO Value:</label>
					  <input type="number" class="form-control" required  name="ipo" id="ipo">
					  
					  <label for="url">Logo URL</label>
					  <input type="url" class="form-control" required name="url" id="url">
					  
					  <br />
					  <button type="submit" class="btn btn-primary">Submit</button>
					</form>
            </div>
			
			
			
         </div>
	 </div>
   </body>
</html>