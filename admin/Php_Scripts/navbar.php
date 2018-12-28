<?php
	require '../Php_Scripts/db_connect.php';
	require '../Php_Scripts/getCurrentRound.php'; //gets $CurrentRoundName
	require 'adminManager.php';
?>
	<div class="row">	
	   <div class="col-sm-4">
               <center>
                  <h4>Team Management</h4>
               </center>
               <div class="list-group">
                  <a href="addTeam.php" class="list-group-item list-group-item-action"><i class="fas fa-plus"></i> Add Team</a>
                  <a href="removeTeam.php" class="list-group-item list-group-item-action"><i class="fas fa-minus"></i> Remove Team</a>
                  <a href="#" class="list-group-item list-group-item-action"><i class="fas fa-edit"></i>Edit Team</a> <!-- href="editTeam.php"  -->
               </div>
            </div>
            <div class="col-sm-4">
               <center>
                  <h4>User managment</h4>
               </center>
               <div class="list-group">
                  <a href="#" class="list-group-item list-group-item-action"><i class="fas fa-file-alt"></i> New User</a> <!-- href="newUser.php"  -->
                  <a href="#" class="list-group-item list-group-item-action"><i class="fas fa-user-slash"></i> Remove User</a> <!-- href="removeUser.php"  -->
                  <a href="#" class="list-group-item list-group-item-action"><i class="fas fa-user-edit"></i> Edit User</a> <!-- href="editUser.php"  -->
               </div>
            </div>
            <div class="col-sm-4">
               <center>
                  <h4>Universal Settings</h4>
               </center>
               <div class="list-group">
                  <a href="changeRound.php" class="list-group-item list-group-item-action"><i class="fas fa-marker"></i> Change Round <span style="float: right" class="badge badge-primary badge-pill">
                  <?php echo $CurrentRound; ?>
                  </span></a>
                  <a href="lockunlock.php" class="list-group-item list-group-item-action"><i class="fas fa-lock-open"></i> Lock/Unlock </a>
                  <a href="updateValue.php" class="list-group-item list-group-item-action"><i class="fas fa-money-bill-wave-alt"></i> New Value</a>
               </div>
            </div>
         </div>
 
		<!-- END TEMPLATE -->	
