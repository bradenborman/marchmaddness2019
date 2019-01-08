<?php
	require '../Php_Scripts/db_connect.php';
	require 'Php_Scripts/loginManager.php'; // handles login returns $ID
?>

<!DOCTYPE html>
<html lang="en">
   <head>
      <title>Update Settings</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
      <link rel="stylesheet" type="text/css" href="css/style.css">
      <script src="scripts/general.js"></script>
      <link href='https://fonts.googleapis.com/css?family=Alfa Slab One' rel='stylesheet'>
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css" integrity="sha384-/rXc/GQVaYpyDdyxK+ecHPVYJSN9bmVFBvjA/9eOB+pb3F2w2N6fc5qB9Ew5yIns" crossorigin="anonymous">
   </head>
   <body>
      <header class="header">
         <div id="logo"></div>
         <h1>College Basketballs Blue Chips</h1>
      </header>
      <div class="container app">
         <div class="row">
            <div class="col-md-6">
               <div class="card">
                  <div class="card-header">
                     <h2>Edit Info</h2>
                  </div>
                  <div class="card-body">
                     <div class="row">
                        <div class="col-md-6">
                           <form action="Php_Scripts/editUser.php" enctype="multipart/form-data" method="post">
                              <label for="fname">First Name:</label>
                              <input <?php if(isset($FNAME)) echo 'value="'.$FNAME.'"'; ?> type="text" class="form-control" id="fname" name="fname">
                        </div>
                        <div class="col-md-6">   
                        <label for="lname">Last Name:</label>
                        <input <?php if(isset($LNAME)) echo 'value="'.$LNAME.'"'; ?> type="text" class="form-control" id="lname" name="lname">
                        </div>
                     </div>
                     <br />
                      <div class="row">
                      <div class="col-md-6">
                         <div class="form-group">
                           <label for="upload">Profile Picture</label>
			      <input accept="image/*" type="file" class="form-control-file border" id="upload" name="fileToUpload">
			 </div>
			 </div>
                     </div>
                     
                     <br/>
                     <button type="submit" class="btn btn-primary">Submit</button>
                     </form>
                  </div>
                  <div class="col-md-6">
                  </div>
               </div>
            </div>
         </div>
      </div>
   </body>
</html>