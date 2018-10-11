	
DROP TABLE IF EXISTS yearBreakdown;
CREATE TABLE yearBreakdown(
	id int UNIQUE AUTO_INCREMENT,
	team varchar(8),
	game_date date,
	game_number int(2),
	visitor_score int(3),
	home_score int(3),
	Rdiff decimal(8,3),
	SRS decimal(8,3),
	R_G decimal(8,3),
	R decimal(8,3),
	RBI decimal(8,3),
	OBP decimal(8,3),
	OPSP decimal(8,3),
	RA decimal(8,3),
	ERA decimal(8,3),
	SV decimal(8,3),
	HA decimal(8,3),
	ER decimal(8,3),
	ERAP decimal(8,3),
	WHIP decimal(8,3),
	Outcome boolean,
	PRIMARY KEY(id)
);

/*
INSERT INTO yearBreakdown
	SELECT NULL, Team, games.game_date, games.game_number, games.visitor_score, games.home_score, Rdiff, SRS, R/G, R, RBI, OBP, OPSP, RA, ERA, SV, Team_Bating.HA, ER, ERAP, WHIP
	from Team_Bating LEFT JOIN games 
	on (Team_Bating.Team = games.home or Team_Bating.Team = games.visitor);
	
ALTER TABLE yearBreakdown ADD Outcome boolean;

UPDATE yearBreakdown SET Outcome = IF(id%2=0, IF(visitor_score>home_score, 1,0),IF(visitor_score<home_score,1,0) );	
*/

--Insert Home team statistics
INSERT INTO yearBreakdown
	SELECT NULL, 
	Team, games.game_date, games.game_number, games.visitor_score, games.home_score, Rdiff, SRS, R/G, R, RBI, OBP, OPSP, RA, ERA, SV, Team_Bating.HA, ER, ERAP, WHIP,
	(IF(home_score>visitor_score,1,0))
	from Team_Bating LEFT JOIN games 
	on (Team_Bating.Team = games.home);
--Insert Visitor team statistics
INSERT INTO yearBreakdown
	SELECT NULL, 
	Team, games.game_date, games.game_number, games.visitor_score, games.home_score, Rdiff, SRS, R/G, R, RBI, OBP, OPSP, RA, ERA, SV, Team_Bating.HA, ER, ERAP, WHIP,
	(IF(visitor_score>home_score,1,0))
	from Team_Bating LEFT JOIN games 
	on (Team_Bating.Team = games.visitor);	
