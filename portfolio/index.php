<?php
	require '../Php_Scripts/db_connect.php';
	require '../Php_Scripts/getCurrentRound.php'; //gets $CurrentRound
	require 'Php_Scripts/loginManager.php'; // handles login returns $ID
	require 'Php_Scripts/getValueInShare.php'; // gets $Value_in_Shares
	require 'Php_Scripts/getTotalMoneyInPlay.php'; // gets $GRAND_TOTAL_IN_PLAY	
	require 'Php_Scripts/getTotalTransactions.php'; // gets $totalTransactions && $MYtotalTransActions
	require 'Php_Scripts/getFirstPlace.php'; // gets $firstplace
		
	$Portfolio_sql = $conn->query("SELECT * FROM `OWNS` JOIN TEAMS ON TEAMS.Team_ID = OWNS.Team_ID WHERE USER_ID = '$ID' and AMOUNT_OWNED > 0");
	$User_sql = $conn->query("SELECT * FROM `USER` WHERE `USER_ID` = '$ID'");
	
	
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>My Portfolio</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css" integrity="sha384-/rXc/GQVaYpyDdyxK+ecHPVYJSN9bmVFBvjA/9eOB+pb3F2w2N6fc5qB9Ew5yIns" crossorigin="anonymous">
	<link href='https://fonts.googleapis.com/css?family=Alfa Slab One' rel='stylesheet'>
  <script src="scripts/general.js"></script>
  </head>
<body>
<script>
<?php
while ($r = mysqli_fetch_array($User_sql)){
	$Net_worth = $r['USER_CASH'] + $Value_in_Shares;
	$cash = $r['USER_CASH'];
?>
	var networth = '<?php echo $Net_worth; ?>';
	var leader =   '<?php echo $firstplace; ?>';
	var totalMoney = '<?php echo $GRAND_TOTAL_IN_PLAY; ?>';
	var currentRound =  '<?php echo $CurrentRound; ?>';
<?php } ?></script>
<header class="header"><div id="logo"></div>
  <h1>College Basketball's Blue Chips</h1> 
</header>

<div class="container app">
		  <div class="row">
				<div class="col-lg-6 ">
						<div class="card">
							<div class="card-header"><h2><i class="fas fa-folder-open"></i> <?php echo $NAME; ?>'s Snapshot</h2></div>
							<div class="card-body">
								<div class="row">
									<div class="col-lg-12">
										<p><b><h3>My Networth:</b> <span id="Networth"></span></h3></p>
									</div>
								</div>
								<div class="row">
									<div class="col-lg-12">
										<p><b><h5>Cash: <span style="color: green;">$<?php echo number_format($cash); ?> </span></b><h5></p>
									</div>
								</div>	
								<div class="row">
									<div class="col-lg-12">
										<p><b><h5>My Total Transactions: </b><span id="Transactions"><?php echo $MYtotalTransActions; ?></span><h5></p>
									</div>
								</div>	
							</div> 
							
						  </div>
				</div>
				<div class="col-lg-6">
				  <div class="card text-justify">
						<div class="card-header"><h2><i class="fas fa-tachometer-alt"></i> Game flow</h2></div>
						<div class="card-body ">
							<div class="row">
								<div class="col-lg-12">
									<p><b>Leader's Value:</b> <span id="Leader"></span></p>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-12">
									<p><b>Total Money in Play:</b> <span id="TotalMoney"></span></p>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-12">
									<p><b>Current Round:</b> <span id="CurrentRound"></span></p>
								</div>
							</div>	
							<div class="row">
								<div class="col-lg-12">
									<p><b>Total Transactions thus far:</b> <span id="GrandTransactions"><?php echo $totalTransActions ; ?></span></p>
								</div>
							</div>	
						</div> 						
					  </div>
				</div>
		  </div>
		  <div class="row"><!-- FOR EACH TEAM -- PRINT JAVASCRIPT FUNCTION THAT TAKES IN TEAM NAME OR ID CREATE FUNCTION THAT HEADS TO TRADE PAGE WITH TEAM NAME SET-->
				<div class="col-lg-8">
						<div class="card">
						<div class="card-header"><h2><i class="fas fa-money-bill-alt"></i> My Investments</h2> $<?php echo number_format($Value_in_Shares); ?>
						<p class="showSmall">Scroll right to see more</p>
						</div>
								<div class="table-responsive-lg">
								<table class="table table-hover table-striped text-center">
									  <thead>
										<tr>
										  <th scope="col">Institution</th>
										  <th scope="col">Amt Owned</th>
										  <th scope="col">Market Price</th>
										  <th scope="col">Total Value</th>
										  <th scope="col"></th>
										</tr>
									  </thead>
									  <tbody><?php
										while ($r = mysqli_fetch_array($Portfolio_sql)){
										$AMOUNT_OWNED = $r['AMOUNT_OWNED'];
										$MARKET_PRICE = $r['CURRENT_PRICE'];
										$TOTAL_OWNED = $AMOUNT_OWNED * $MARKET_PRICE;			
									?>				
										<tr>
										  <td><?php echo '<img class="logo" src="'.$r['LOGO_URL'].'" />'; 
										  if($r['TEAM_IS_KNOCKED_OUT']) echo '<span style="text-decoration: line-through;">';
										  echo ' ' .$r['TEAM_NAME']; 
										  if($r['TEAM_IS_KNOCKED_OUT']) echo '</span>';
										  ?></td>
										  
										  
										  <td><?php echo $AMOUNT_OWNED; ?></td>
										  <td><?php echo '$' .number_format($MARKET_PRICE); ?></td>
										  <td><?php echo '$' .number_format($TOTAL_OWNED); ?></td>
										  <td><button type="button"
										  <?php if($r['ISTEAMLOCKED']) echo 'disabled'; ?>
										   class="btn btn-primary" onclick='goToTradeCentral("<?php echo $r['TEAM_ID']; ?>")'>
										  <?php if($r['ISTEAMLOCKED']) echo '<i class="fa fa-lock" aria-hidden="true"></i>'; ?> Trade
										  </button></td>
										</tr>									
									<?php					
									}										
									?></tbody>
									</table>
								<div class="card-footer"><i><b>As of: </b><span id="dateTime"></span></i></div>
								</div>
						</div>
				</div>
				<div class="col-lg-4">
				  <div class="card optionLinks">
						<div class="card-header"><h2><i class="fas fa-cog"></i> Options</h2></div>
						<div class="card-body">
							<ul class="nav flex-column">
							<li class="nav-item">
							  <a class="nav-link" href="../market/">View Market</a>
							</li>
							<li class="nav-item">
							  <a class="nav-link" href="../leaderboard/">View Leaderboard</a>
							</li>
							<li class="nav-item">
							  <a class="nav-link" href="../trade/history">Transaction History</a>
							</li>
							<li class="nav-item">
							  <a class="nav-link" href="../user-update/">My Information</a>
							</li>
							<li class="nav-item">
							  <a class="nav-link" href="https://cbbbluechips.com/rules.pdf">Extended Rules</a>
							</li>
							<li class="nav-item">
							  <a class="nav-link" href="Php_Scripts/logout.php">Log-out</a> <!-- To PHP SCRIPT THAT LOGS OUT THEN HEADS TO HOME PAGE -->
							</li>
						  </ul>
						</div> 
					  </div>
				</div>
		  </div>  
</div>
</body>
</html>