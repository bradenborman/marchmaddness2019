<?php
	require '../Php_Scripts/db_connect.php';
	require 'Php_Scripts/loginManager.php'; // handles login returns $ID
	require 'Php_Scripts/validateLogin_validateTeamId.php'; // gets $TEAM_ID	
	$Apply_Fee_At = 50;						
?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <title>Trade Central</title>
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
   <body onload="determineSliderValues()">
     

	 <!-- IF FEE APPLIES PRINT CHECKED INTO HIDDEN INPUT ON BUY SECTION -->
	 <!-- do logic ahead of time to determine if late to fee applies -->
	 

<header class="header"><div id="logo"></div>
  <h1>College Basketballs Blue Chips</h1> 
</header>

         <div class="container app">
            <!-- <h3><span id="user">Braden Borman</span></h3> -->
            <h2>Capital available: <span id="cash">$<?php echo number_format($CASH); ?></span></h2>
            <div class="links">
               <a href="../market/">Market</a>
               <a href="../portfolio/">My Portfolio</a>
        
            </div>		
         </div>
		 
		 <br><br>
      <div class="container TRADE_SECTION">
         <div class="card">
            <div class="card-header">       
               <h1><?php echo $TEAM_NAME ; ?></h1><img class="logo" src="<?php echo $URL; ?>" />            
               <h3 id="costPerShare">$<?php echo number_format($CURRENT_PRICE); ?></h3>
				<br />
				<i class="fas fa-shopping-cart"></i> <span id="totalSpent">$0 <?php if($SHARES_OUTSTANDING >= $Apply_Fee_At) echo '<br>"Late to the Party" fee may apply'; ?></span>
			</div>
            <!-- TEAM NAME HERE -->
            <div class="card-body">
               <h6 class="card-title">Slide to the right to increase amount</h6>
               <br />
               <div class="row">
                  <div id="BUY_SECTION" class="col-md-6 text-center">
                     <form action="Php_Scripts/buy.php" method="post" onsubmit="return validateBuyForm()">
                        <input onchange="updateBuyBTN(this.value)" class="slider" type="range" min="0" max="100" value="0" class="slider" id="buySlider" name="buy_amount">
                        <input style="display: none;" type="checkbox" name="isFee" id="isFee" <?php if($SHARES_OUTSTANDING >= $Apply_Fee_At) echo 'Checked'; ?> onChange="determineSliderValues()">
                        <input style="display: none;" type="text" name="teamId" value="<?php echo $TEAM_ID; ?>">
						<br />
                        <button id="buyBTN" type="submit" class="buy btn btn-success">Buy</button>
                     </form>
                  </div>
                  <div id="SELL_SECTION" class="col-md-6 text-center">
                     <form action="Php_Scripts/sell.php" method="post" onsubmit="return validateSellForm()">		
                        <input onchange="updateSellBTN(this.value)" class="slider" type="range" min="0" max="<?php if(isset($Shares_Already_Owned)) echo $Shares_Already_Owned; else echo '0'; ?>" value="0" class="slider" id="sellSlider" name="sell">						
                        <input style="display: none;" type="text" name="teamId" value="<?php echo $TEAM_ID; ?>">
                        <br />
                        <button id="sellBTN" type="submit" class="sell btn btn-success">Sell</button>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <script>
	  
	  	  
		//HARD CODED FOR TESTING set to true
		var lateToPartyFee = $("#isFee").attr("checked") ? true : false;
	  
         function updateBuyBTN(value) {
			updateSpent(value, "BUY")
         	$(".buy").html("Buy: " + value);
         }
         
         function updateSellBTN(value) {
         	updateSpent(value, "SELL")
			$(".sell").html("Sell: " + value);
         }
         
         
	 function updateSpent(value, action) {
	  var y = $("#costPerShare").text()
	  var cost = y.replace(/\D+/g, '');  
			
		if(lateToPartyFee && value > 0 && action == "BUY") {
			var spent = parseInt((value * cost)) + parseInt(cost)
			$('#totalSpent').html("$" + ReplaceNumberWithCommas(spent) + "<br />  \"Late to the Party\" fee applied. (<span style='color: red;'>$" + ReplaceNumberWithCommas(cost) + "</span>)")
		}
		else if(lateToPartyFee && value == 0 && action == "BUY") {
			var spent = value * cost 
			$('#totalSpent').html("$" + ReplaceNumberWithCommas(spent) + "<br />  \"Late to the Party\" fee may apply.")
		}
	
		else {
			var spent = value * cost 
			$('#totalSpent').html("$" + ReplaceNumberWithCommas(spent))
		}
		
	 }
		 
		 
         function determineSliderValues() {	
         	var x = $("#cash").text()
         	var y = $("#costPerShare").text()
         	var cash = x.replace(/\D+/g, '');
         	var cost = y.replace(/\D+/g, '');
         	var maxBuy = Math.floor(parseInt(cash) / parseInt(cost))
         
			if(lateToPartyFee)
				maxBuy -= 1
		 
         	$('#buySlider').prop({
                     'min': 0,
                     'max': maxBuy
                 });	
         }
         
		 
         function validateBuyForm() {
         	//ajax for cash AND price of team and return false if not a match
			$("#buyBTN").prop("disabled",true);
         	return true
         }
		 
         function validateSellForm() {
         	//ajax for cash AND price of team and return false if not a match
			$("#sellBTN").prop("disabled",true);
         	return true
         }
         				
      </script>
   </body>
</html>