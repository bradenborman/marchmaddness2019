<?php
	$MyTeams = array();
	require '../Php_Scripts/db_connect.php';
	require 'Php_Scripts/set_current_week.php'; // Sets $Current_round; 	
	require 'Php_Scripts/loginManager.php'; // Sets $ID
	require 'Php_Scripts/getTeamsUserOwns.php'; // $MyTeams array
	$All_Teams = $conn->query("SELECT *, (SELECT SUM(AMOUNT_OWNED) FROM `OWNS` WHERE OWNS.TEAM_ID = TEAMS.TEAM_ID) as SHARES_OUTSTANDING FROM TEAMS ORDER BY TEAM_IS_KNOCKED_OUT, TEAM_SEEDING");	
	$CASH_SQL = $conn->query("SELECT USER_CASH FROM `USER` WHERE USER_ID = '$ID'");	
	while ($r = mysqli_fetch_array($CASH_SQL)) {
		 $CASH_TO_SPEND = $r['USER_CASH'];
	}
				
?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <title>Market</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- Latest compiled and minified CSS -->
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
      <!-- jQuery library -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <!-- Popper JS -->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
      <!-- Latest compiled JavaScript -->
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
      <link rel="stylesheet" type="text/css" href="css/style.css">
	  <link href='https://fonts.googleapis.com/css?family=Alfa Slab One' rel='stylesheet'>
	  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css" integrity="sha384-/rXc/GQVaYpyDdyxK+ecHPVYJSN9bmVFBvjA/9eOB+pb3F2w2N6fc5qB9Ew5yIns" crossorigin="anonymous">
		<script src="scripts/general.js"></script>

   </head>
   <body onload="drawChart()">

<header class="header"><div id="logo"></div>
  <h1>College Basketball's Blue Chips</h1> 
</header>   

<div id="Info">
	<div class="container">
					<div class="row">
							<div class="col-sm-12">
							<!--	<h4><span id="user">Braden Borman</span></h4>				 -->	
							</div>
						</div>
					<div class="row">
						<div class="col-sm-6">
						   <h4 style="display: inline;">Capital available: <span id="cash">$<?php echo number_format($CASH_TO_SPEND); ?> </span></h4>
						</div>
					<div class="col-sm-6">
							<div id="links">																
									<a class="nav-link" href="../portfolio/">Portfolio</a>
							</div>
						</div>
					</div>
			
<div id="Search">
		<div class="row">
				<div class="col-md-4 col-sm-6 hideMobile">
					
					<div class="input-group mb-3">
						<input type="text" class="form-control" placeholder="Quick Find" aria-label="Recipient's username" aria-describedby="basic-addon2" id="searchINPUT" list="allTeams">
					 <div class="input-group-append">
						<span class="input-group-text" id="basic-addon2"><i class="fas fa-search" onclick="searchTeam()"></i></span>
					  </div>
					</div>
							
				</div>
				<div class="col-md-8 col-sm-6">
					<input type="checkbox" id="hideCheckbox" value="Bike"> Hide Charts?
				</div>
				
		</div>	
</div>					

</div>
</div>
		
				
					<!--TO DO ALSO  POPULATE A LIST FOR SEARCHING -->


<div class="container app">				
<div class="row">
 <div class="col-lg-12">


<?php 
	
	//SELECT * FROM `PRICE_HISTORY` WHERE TEAM_ID = '1' order BY Round_ID DESC
	
	
	$index = 2;
	
	
	while ($row = mysqli_fetch_array($All_Teams))
	{
		$price_array = array();
		$team_id = $row['TEAM_ID'];
		
	
		
		$All_PRICES_SQL = $conn->query("SELECT VALUE FROM `PRICE_HISTORY` WHERE Team_ID = $team_id order BY Round_ID DESC");
		while ($r = mysqli_fetch_array($All_PRICES_SQL))
			array_push($price_array, $r['VALUE']);
					
		if ($index % 2 == 0) {	
			echo '<div class="card-deck">';
		}
	?>	
            <div class="card">
            <img <?php if($row['TEAM_IS_KNOCKED_OUT']) echo 'class="isOut"';  ?> style="margin: auto" width="100px" height="100px" src="<?php echo $row['LOGO_URL']; ?>" alt="Logo">
            
            
            
            
               <h1 class="card-header"><?php if (in_array($team_id, $MyTeams)) { echo '<i style="font-size: .8em;" title="You own some of this team" class="fas fa-star"></i>';} echo $row['TEAM_NAME']. "<br>";  ?></h1>
               <div class="card-img-top" id="<?php echo $row['TEAM_NAME'];  ?>"></div>
               <div class="card-body">
                  <!-- Links -->
                  <p style="Font-size: 2.6em; display: inline;">$<?php echo number_format($row['CURRENT_PRICE']);  ?></p>
                  <p style="Font-size: 1.7em; display: inline; float: right; margin-right: 10px; margin-top: 10px;">
				  <a href="../trade/?team=<?php echo $row['TEAM_ID'];  ?>" class="card-link">
				  
				  <?php if(!$row['ISTEAMLOCKED'])
				   	echo 'Trade</a></p>';
				  else
				  	echo '</a><i class="fa fa-lock" aria-hidden="true"></i></p>';
				  ?>
				  
                  <p class="hidden values d-none"><?php foreach ($price_array as $value) { echo "$value ";}?></p>
               </div>
               <div class="card-footer">
                  <div class="text-muted">Seeding: <?php echo $row['TEAM_SEEDING'];  ?> <span style="float: right;">Shares Outstanding: <?php if(isset($row['SHARES_OUTSTANDING'])) echo $row['SHARES_OUTSTANDING']; else echo '0';  ?></span></div>
                  <!--PRINT OUT STATUS AND SHARES OUTSTANDING -->
               </div>
            </div>		
	<?php	
	
		if ($index % 2 == 0) {	
			
		}else {
			echo '</div><br /><br />';
		}
		unset($price_array);
		$index++;
	}
		

?>
</div>
</div>		 
	<footer style="padding: 30px; margin-top: 50px; text-align: center;">CBB Blue Chips</footer>	 
</div> 
	  
	  
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
google.charts.load('current', {'packages':['corechart']});      
 function drawChart() {
	 $('.card').each(function (index, value) { 
	 var TeamName =$(this).find("h1").text()
	 var values =$(this).find(".values").text()
	 var valueArray = values.split(" ")
	 
		  
	 var data = google.visualization.arrayToDataTable([
	 ['Round', 'Value'],
	 ['64',  parseInt(valueArray[0])],
	<?php if($Current_round <= 64) echo "['32',  parseInt(valueArray[1])],"; ?>
	<?php if($Current_round <= 32) echo "['16',  parseInt(valueArray[2])],"; ?>
	<?php if($Current_round <= 16) echo "['8',  parseInt(valueArray[3])],"; ?>
	<?php if($Current_round <= 8) echo "['4',  parseInt(valueArray[4])],"; ?>
	<?php if($Current_round <= 4) echo "['2',  parseInt(valueArray[5])],"; ?>
	<?php if($Current_round <= 2) echo "['1',  parseInt(valueArray[6])]"; ?>
	 ]);
	 
	 var options = {
	 curveType: 'function',
	 legend: { position: 'bottom' }
	 };
	 var chart = new google.visualization.LineChart(document.getElementById(TeamName));
	 chart.draw(data, options);
	 });		
	 }
	  
	  
	  
	  
</script>

<script>
    var distance = $('#Info').offset().top,
    $window = $(window);

$window.scroll(function() {
    if ( $window.scrollTop() >= distance ) 
        addBorder()
    else 
	removeBorder() 
});


function addBorder() {
	$("#Info").css("border-bottom", "6px solid rgba(0, 0, 0, 1)");
}


function removeBorder()  {
	$("#Info").css("border-bottom", "6px solid rgba(0, 0, 0, 0)");
	}

</script>
	  	  
<datalist id="allTeams">
	  <?php
	  $All_Teams = $conn->query("SELECT * FROM `TEAMS`");
	  	while ($row = mysqli_fetch_array($All_Teams))
	  	 	echo '<option value="'.replaceSpacesWith_($row['TEAM_NAME']).'" />';
	  ?>
	  
	   
</datalist>

<?php 
	
	function replaceSpacesWith_($x) {
	    return str_replace(" ","_", $x);
	}
?>

		    
</body>
</html>