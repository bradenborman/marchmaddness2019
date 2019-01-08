<!DOCTYPE html>
<html>
<head>
<title>Transaction History</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="style.css">
  
  
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.jqueryui.min.css">
  <link rel="stylesheet" type="text/css" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.19/js/dataTables.jqueryui.min.js"></script>

<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
  
  
   $(function(){
    $("tbody").each(function(elem,index){
      var arr = $.makeArray($("tr",this).detach());
      arr.reverse();
        $(this).append(arr);
    });
});
  
  // $('#history').DataTable();
});
</script>

</head>
<body>
<div class="container app">
<div class="searchWrapper">
 <div class="input-group mb-3 search">
    <div class="input-group-prepend">
      <span class="input-group-text"><b><i class="fa fa-search" aria-hidden="true"></i> Filter</b></span>
    </div>
    <input id="myInput" type="text" class="form-control" placeholder="Search..">
  </div>
 </div>
<br><br>



<div class="table-responsive">

<!-- <p class="showSmall">Scroll right to see more</p> -->
<table id="history" class="table">
  <thead>
  <tr class="thead-light">
    <th><i class="fas fa-user"></i> Name</th>
    <th>Action</th>
    <th>Team</th>
    <th><i class="fas fa-dollar-sign"></i> Amount</th>
    <th><i class="fas fa-clock"></i> Date</th>
  </tr>
  </thead>
  <tbody id="myTable">


	<!-- READ HERE -->
	
	<?php
		
				
		$myfile = fopen("transactions.txt", "r") or die("Unable to open file!");
		while(! feof($myfile)){
		  writeLine(fgets($myfile));
		}
		
		fclose($myfile);

		function writeLine($line) {
		   $parsedLine = explode(" ", $line);
		   $User_ID = $parsedLine[0];
		   $FName = $parsedLine[1];
		   $LName = $parsedLine[2];
		   $Action = $parsedLine[3];
		   $Team_Name = $parsedLine[4];
		   $Amount = $parsedLine[5];
		   $TotalSPent = $parsedLine[6];  
		   $DATE = $parsedLine[7];
		   $Time = $parsedLine[8]; 
		  
		    
				   if(!empty($User_ID)) {
				   	
				   	echo '<tr>';
				   		echo "<td class='name'>".$FName." ".$LName."</td>";
				   		
				   		if($Action == "Buy")
				   			echo '<td><span class="badge badge-primary">'.$Action.'</span></td>';
				   		else
				   			echo '<td><span class="badge badge-success">'.$Action.'</span></td>';
				   			
				   		echo "<td>".str_replace("_", " ", $Team_Name)."</td>";
				   		echo "<td>$".number_format($TotalSPent)."</td>";
				   		echo "<td>".$DATE." ".$Time."</td>";			   	 
				        echo "</tr>";
				   }
		   	  
		}
		
		 //echo $FName. " spent $".number_format($TotalSPent)." on ".$Team_Name." on: ".$DATE." ".$Time."<br>";  
	?>
	


</tbody>
</table>
 </div>
  </div>
  
</body>
</html>
