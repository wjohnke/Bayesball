	
DROP TABLE IF EXISTS yearBreakdownHome;
CREATE TABLE yearBreakdownHome(
	id int UNIQUE AUTO_INCREMENT,
	team varchar(8),
	game_date date,
	game_number int(2),
	team_score int(3),
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
	PRIMARY KEY(id)
);
DROP TABLE IF EXISTS yearBreakdownAway;
CREATE TABLE yearBreakdownAway(
	id int UNIQUE AUTO_INCREMENT,
	team varchar(8),
	game_date date,
	game_number int(2),
	team_score int(3),
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
	PRIMARY KEY(id)
);

DROP TABLE IF EXISTS yearBreakdown;
CREATE TABLE yearBreakdown(
	id int UNIQUE AUTO_INCREMENT,
	home_team varchar(8),
	home_game_date date,
	game_number int(2),
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
	
	away_id int,
	opponent_team varchar(8),
	away_game_date date,
	away_game_number int(2),
	opponent_score int(2),
	opponent_Rdiff decimal(8,3),
	opponent_SRS decimal(8,3),
	opponent_R_G decimal(8,3),
	opponent_R decimal(8,3),
	opponent_RBI decimal(8,3),
	opponent_OBP decimal(8,3),
	opponent_OPSP decimal(8,3),
	opponent_RA decimal(8,3),
	opponent_ERA decimal(8,3),
	opponent_SV decimal(8,3),
	opponent_HA decimal(8,3),
	opponent_ER decimal(8,3),
	opponent_ERAP decimal(8,3),
	opponent_WHIP decimal(8,3),
	
	PRIMARY KEY(id)
);

INSERT INTO yearBreakdownHome
	SELECT NULL, Team, games.game_date, games.game_number, games.home_score, Rdiff, SRS, R/G, R, RBI, OBP, OPSP, RA, ERA, SV, Team_Bating.HA, ER, ERAP, WHIP
	from Team_Bating LEFT JOIN games 
	on (Team_Bating.Team = games.home);	

INSERT INTO yearBreakdownAway
	SELECT NULL, Team, games.game_date, games.game_number, games.visitor_score, Rdiff, SRS, R/G, R, RBI, OBP, OPSP, RA, ERA, SV, Team_Bating.HA, ER, ERAP, WHIP
	from Team_Bating LEFT JOIN games 
	on (Team_Bating.Team = games.visitor);

INSERT INTO yearBreakdown
	SELECT * from yearBreakdownHome
	LEFT JOIN yearBreakdownAway on yearBreakdownHome.id = yearBreakdownAway.id
	UNION
	SELECT * from yearBreakdownHome
	RIGHT JOIN yearBreakdownAway on yearBreakdownHome.id = yearBreakdownAway.id;
	
ALTER TABLE yearBreakdown ADD Outcome boolean;
ALTER TABLE yearBreakdown DROP COLUMN away_id;
ALTER TABLE yearBreakdown DROP COLUMN away_game_date;
ALTER TABLE yearBreakdown DROP COLUMN away_game_number;

UPDATE yearBreakdown SET Outcome = IF(home_score>opponent_score,1,0);


/*
INSERT INTO yearBreakdown
	SELECT NULL, Team, games.game_date, games.game_number, games.visitor_score, games.home_score, Rdiff, SRS, R/G, R, RBI, OBP, OPSP, RA, ERA, SV, Team_Bating.HA, ER, ERAP, WHIP
	from Team_Bating LEFT JOIN games 
	on (Team_Bating.Team = games.home or Team_Bating.Team = games.visitor);
	
ALTER TABLE yearBreakdown ADD Outcome boolean;

UPDATE yearBreakdown SET Outcome = IF(id%2=0, IF(visitor_score>home_score, 1,0),IF(visitor_score<home_score,1,0) );	


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





INSERT INTO yearBreakdown
	SELECT NULL, yHome.team, yAway.team, yHome.game_date, yHome.game_number, yHome.team_score, yAway.team_score, yHome.Rdiff, yHome.SRS, yHome.R_G, yHome.R, yHome.RBI, yHome.OBP, yHome.OPSP, yHome.RA, yHome.ERA, yHome.SV, yHome.HA, yHome.ER, yHome.ERAP, yHome.WHIP,
yAway.Rdiff, yAway.SRS, yAway.R_G, yAway.R, yAway.RBI, yAway.OBP, yAway.OPSP, yAway.RA, yAway.ERA, yAway.SV, yAway.HA, yAway.ER, yAway.ERAP, yAway.WHIP, (IF(yHome.team_score>yAway.team_score,1,0))
	FROM ((yearBreakdownHome as yHome
	LEFT JOIN yearBreakdownAway as yAway
	on (yHome.id = yAway.id))
	UNION
	SELECT * FROM 
	yearBreakdownHome as yHome
	RIGHT JOIN yearBreakdownAway as yAway
	on (yHome.id = yAway.id));
