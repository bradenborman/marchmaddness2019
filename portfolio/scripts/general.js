$(document).ready(function(){
	
	$("#Networth").html("$" + ReplaceNumberWithCommas(networth));
	$("#Standings").html(standings);
	$("#Leader").html("$" + ReplaceNumberWithCommas(leader));
	$("#TotalMoney").html("$" + ReplaceNumberWithCommas(totalMoney));
	$("#CurrentRound").html(currentRound);
	
   var d = new Date();
	var n = d.toLocaleTimeString();
	document.getElementById("dateTime").innerHTML = d.toDateString() + " " + n
	
});




//PHP send with url vars
function goToTradeCentral(teamID) {
	window.location.href = "../trade/index.php?team=" + teamID;
}



function ReplaceNumberWithCommas(yourNumber) {
    var n= yourNumber.toString().split(".");
    n[0] = n[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    return n.join(".");
}