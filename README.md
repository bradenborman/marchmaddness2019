"# marchmaddness2019" 


	//TODO 
			
			Pull random quotes to display on log in page


SQL's:

	SELECT * FROM `Team` JOIN Price_History ON Team.Team_ID = Price_History.Team_ID
	
	SELECT * FROM `Team` JOIN Price_History ON Team.Team_ID = Price_History.Team_ID where Round_ID = '64' **GETS ALL TEAMS AND PRICES PER ROUND**
	
	SELECT * FROM `Team` JOIN Price_History ON Team.Team_ID = Price_History.Team_ID where School = 'Missouri' **GETS ALL Prices for mizzou example**
	
	SELECT * FROM `Team` JOIN Price_History ON Team.Team_ID = Price_History.Team_ID order BY School, Price_History.Round_ID desc ////ORDER BY IS STILL IN!
	