<?php
	if (isset($_GET['message'])) {
			$message= trim($_GET['message']);
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
       	
       	
	       	<div style="margin-top: 40px; text-align: center; font-size: 1.8em;">
	       		<?php if (isset($_GET['message'])) echo $message; ?>
	       	</div>	
	 </div>
   </body>
</html>