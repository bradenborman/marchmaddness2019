"# marchmaddness2019" 

//UPDATE BUY AND SELL TO LOOK FOR IS UNLOCK

	Right side of leaderboard display game purse and note about who qualifies for winning. 



	FOR MOBILE: 
		
	Bigget text and center option links in portfolio
	
	Bigger img logo for teams in portfolio
	
	Hide search bar in market 
	
	Full width for cards on landing page







		
		
		
		

SQL's:

	SELECT * FROM `Team` JOIN Price_History ON Team.Team_ID = Price_History.Team_ID
	
	SELECT * FROM `Team` JOIN Price_History ON Team.Team_ID = Price_History.Team_ID where Round_ID = '64' **GETS ALL TEAMS AND PRICES PER ROUND**
	
	SELECT * FROM `Team` JOIN Price_History ON Team.Team_ID = Price_History.Team_ID where School = 'Missouri' **GETS ALL Prices for mizzou example**
	
	SELECT * FROM `Team` JOIN Price_History ON Team.Team_ID = Price_History.Team_ID order BY School, Price_History.Round_ID desc ////ORDER BY IS STILL IN!
	
	
	SELECT * FROM `OWNS` JOIN TEAMS ON TEAMS.Team_ID = OWNS.Team_ID WHERE USER_ID = '1'
	///GETS ALL OWNED TEAM INFO -- amount, total spent so far, percent of market, price 
	


	SELECT SUM(CURRENT_PRICE * AMOUNT_OWNED) as totalSpent FROM `OWNS` JOIN TEAMS ON TEAMS.Team_ID = OWNS.Team_ID WHERE USER_ID = '1'
	//gets the total portfolio value by user id
	
	
	
	SELECT SUM(CURRENT_PRICE * AMOUNT_OWNED) + (SELECT SUM(USER_CASH) from USER) FROM `OWNS` JOIN TEAMS ON TEAMS.Team_ID = OWNS.Team_ID   //GETS ALL THE CASH IN PLAY
	
	SELECT *, SUM(AMOUNT_OWNED) FROM `OWNS` JOIN TEAMS ON TEAMS.Team_ID = OWNS.Team_ID where OWNS.TEAM_ID = '1'


