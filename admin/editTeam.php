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
                  <h3>Edit Team</h3>
               </center>
            </div>

			
			<div class="col-sm-12">
					<form class="form" action="/action_page.php">
					  
					 <div class="col-sm-12">
					   <center>
						  <span style="font-size: 1.5em;"> To edit:  </span>
						 <select name="team" class="custom-select-lg"><!-- SET PHP LOAD TEAMS LINK TO PHP SCRIPT THAT TAKE NAME AND DELETES -->
								<option selected>Large Custom Select Menu</option>
								<option value="volvo">Volvo</option>
								<option value="fiat">Fiat</option>
								<option value="audi">Audi</option>
							  </select>
						  
					   </center>
					</div>
					  
					  <label for="teamName">Team Name:</label>
					  <input type="text" class="form-control" name="teamName" id="teamName">
					  
					  
					  <label for="seed">Seeding:</label>
					  <input type="text" class="form-control" name="seed" id="seed">

					  <label for="ipo">IPO Value:</label>
					  <input type="text" class="form-control" name="ipo" id="ipo">
					  
					  <label for="url">Logo URL</label>
					  <input type="text" class="form-control" name="url" id="url">
					  
					  
					  
					  <br />
					  <button type="submit" class="btn btn-primary">Submit</button>
					</form>
            </div>
			
			
			
         </div>
	 </div>
   </body>
</html>