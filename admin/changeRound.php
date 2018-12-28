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
                  <h3>Change Round</h3>
               </center>
            </div>

			
			<div class="col-sm-12">
					<form class="form" method="post" action="Php_Scripts/changeRound.php">
					  
					 <div class="col-sm-12">
						  <span style="font-size: 1.5em;"> Current Round Of:  </span>
						 <select required style="padding: 10px;" name="roundOf" class="custom-select-lg"><!-- SET PHP Current on current round -->
								<option value="64">64</option>
								<option value="32">32</option>
								<option value="16">16</option>
								<option value="8">8</option>
								<option value="4">4</option>
								<option value="2">2</option>
								<option value="2">1</option>
							  </select>
						   <br />
						    <br />
					  <button type="submit" class="btn btn-primary">Submit</button>
					</form>

					</div>
					  
					 
            </div>
			
			
			
         </div>
	 </div>
   </body>
</html>