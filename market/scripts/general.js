$(document).ready(function(){		
      
	$('input:checkbox').change(
		function(){
			if ($(this).is(':checked')) 
				hideCharts() 
			else
				showCharts()
	});

	$('#searchINPUT').keypress(function(event){
	  if(event.keyCode == 13){
		searchTeam()
	  }
	});
	  
});



function searchTeam() {
	var team = $("#searchINPUT").val()
	var id = "#"  + team
	var distance = $(id).offset().top
		
	 $(window).scrollTop(distance - 300);
			 
 }

 
function hideCharts()  {
	$(".card-img-top").hide();
}

function showCharts()  {
	$(".card-img-top").show();
}