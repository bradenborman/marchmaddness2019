<?php

$PeopleID = array();
$PeopleArray = array();
	
	$Value_in_Shares_sql = $conn->query("SELECT * FROM `USER`");
	while ($r = mysqli_fetch_array($Value_in_Shares_sql)){
		$FIRST_NAME = $r['FIRST_NAME'];	
		$LAST_NAME= $r['LAST_NAME'];
		$USER_ID = $r['USER_ID'];
		$IS_MONEY = $r['IS_MONEY'];
		
		$FullName = $FIRST_NAME. " ". $LAST_NAME. "<br>";
		$get_networthSQL = $conn->query("SELECT SUM(CURRENT_PRICE * AMOUNT_OWNED) as inShares, (SELECT USER.USER_CASH from USER where USER_ID = '$USER_ID') as cash FROM `OWNS` JOIN TEAMS ON TEAMS.Team_ID = OWNS.Team_ID WHERE USER_ID = '$USER_ID'");
		while ($row = mysqli_fetch_array($get_networthSQL)){
			$netWorth = $row['inShares'] + $row['cash'];
			array_push($PeopleArray, new Person($FullName, $USER_ID, $netWorth, $IS_MONEY));					
		}	  	
	}
	
	
	usort($PeopleArray, 'sort_objects_by_total');
	
	

class Person {
    function Person($Name, $ID, $Networth, $IS_MONEY) {
        $this->name = $Name;
        $this->id = $ID;
        $this->networth = $Networth;
        $this->isMoney = $IS_MONEY;
    }
}



function sort_objects_by_total($a, $b) {
	if($a->networth == $b->networth){ return 0 ; }
	return ($a->networth < $b->networth ) ? 1 : -1;
}



?>