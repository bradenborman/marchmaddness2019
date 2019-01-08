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
	
	team = team.split(' ').join('_')
	var id = "#"  + team
	var distance = $(id).offset().top
		
	 $(window).scrollTop(distance - 300);
			 
 }

 
function hideCharts()  {
	$(".card-img-top").hide();
	$("#searchINPUT").prop('disabled', true);
}

function showCharts()  {
	$(".card-img-top").show();
	$("#searchINPUT").prop('disabled', false);
}