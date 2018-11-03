    
function myFunction() {

	var isOnlyMe = $("input[name=isOnlyMe]:checked").val() == "True" ? true : false
	

  var input, filter, table, tr, tdTEAMNAME, tdAction, tdPerson, i;
  input = document.getElementById("teamSerachInput");
  filter = input.value.toUpperCase();
  var filters = filter.split(" ");
  
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
 
if(filters.length <= 1) {
	 for (i = 0; i < tr.length; i++) {
		tdTEAMNAME = tr[i].getElementsByTagName("td")[0];
		tdAction = tr[i].getElementsByTagName("td")[1];
		tdPerson = tr[i].getElementsByTagName("td")[5];
		if (tdTEAMNAME) {
		  if (tdTEAMNAME.innerHTML.toUpperCase().indexOf(filters[0]) > -1 || tdAction.innerHTML.toUpperCase().indexOf(filters[0]) > -1 || tdPerson.innerHTML.toUpperCase().indexOf(filters[0]) > -1) {
			tr[i].style.display = "";
		  } else {
			tr[i].style.display = "none";
		  }
		}       
	  }
  } else {
		  for (i = 0; i < tr.length; i++) {
				tdTEAMNAME = tr[i].getElementsByTagName("td")[0];
				tdAction = tr[i].getElementsByTagName("td")[1];
				tdPerson = tr[i].getElementsByTagName("td")[5];
				if (tdTEAMNAME) {
				  if ((tdTEAMNAME.innerHTML.toUpperCase().indexOf(filters[0]) > -1 || tdAction.innerHTML.toUpperCase().indexOf(filters[0]) > -1 || tdPerson.innerHTML.toUpperCase().indexOf(filters[0]) > -1)
				  && (tdTEAMNAME.innerHTML.toUpperCase().indexOf(filters[1]) > -1 || tdAction.innerHTML.toUpperCase().indexOf(filters[1]) > -1 || tdPerson.innerHTML.toUpperCase().indexOf(filters[1]) > -1)
				  ) {
					tr[i].style.display = "";
				  } else {
					tr[i].style.display = "none";
				  }
				}       
			  }
  }
  
 
  if(isOnlyMe)
	showOnlyme()
  
}

function showOnlyme() {
		
	var name = "Cory Loeffelman" // PHP print var here
	 
		$('tr:not(:first)').each(function(){
			var tr = $(this);
			if (tr.find('td:eq(5)').text() != name) 
				tr.hide()
});
	 
}
 

//TODO takes away headers on switch
function showEveryOne() {
		
	var name = "Cory Loeffelman" // PHP print var here
	 
		$('tr').each(function(){
			var tr = $(this);
				if (tr.find('td:eq(5)').text() != name || tr.find('td:eq(5)').text() == name) 
				tr.show()
});
	 
}



$(document).ready(function(){  
	
		$(".dropdown-menu span").click(function(){
			var x = $(this).text()
			$("#teamSerachInput:text").val(x);
			myFunction()
		});


		//RIGHT NOW HIDES THE COL when header is clicked
		$( "th" ).click(function() {
			
			if($(this).text() == "Amount" || $(this).text() == "Round") {
				var x = ($(this).index() + 1);
				$(this).css("display", "none");
				$("td:nth-child(" + x + ")").css("display", "none");
			}
		});
		
		

		$( ".fa-times" ).click(function() {
			$("#teamSerachInput:text").val("");
			myFunction()
		});


});	
/*
$( "td:nth-child(1)" ).click(function() {
	var x = $(this).text()
	$("#teamSerachInput:text").val(x);
	myFunction()

});
*/	 
