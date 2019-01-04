
$(document).ready(function(){		

	
	
	setTimeout(function(){ showTradeBtns() ; }, 1500);
	setTimeout(function(){ location.reload(); }, 180000);
});


function ReplaceNumberWithCommas(yourNumber) {
    var n= yourNumber.toString().split(".");
    n[0] = n[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    return n.join(".");
}


function showTradeBtns() {
	$(".tradeBTN").fadeIn(700);
}


