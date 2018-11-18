	
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
	pos_1_id varchar(24),
	pos_2_id varchar(24),
	pos_3_id varchar(24),
	pos_4_id varchar(24),
	pos_5_id varchar(24),
	pos_6_id varchar(24),
	pos_7_id varchar(24),
	pos_8_id varchar(24),
	pos_9_id varchar(24),
	starting_pitcher_id varchar(24),
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
	pos_1_id varchar(24),
	pos_2_id varchar(24),
	pos_3_id varchar(24),
	pos_4_id varchar(24),
	pos_5_id varchar(24),
	pos_6_id varchar(24),
	pos_7_id varchar(24),
	pos_8_id varchar(24),
	pos_9_id varchar(24),
	starting_pitcher_id varchar(24),
	
	PRIMARY KEY(id)
);

DROP TABLE IF EXISTS yearBreakdown;
CREATE TABLE yearBreakdown(
	id int UNIQUE AUTO_INCREMENT,
	home_team varchar(8),
	home_game_date date,
	game_number int(2),
	/*Home team stats*/
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
	/*Home player stats*/
	pos_1_id varchar(24),
	pos_2_id varchar(24),
	pos_3_id varchar(24),
	pos_4_id varchar(24),
	pos_5_id varchar(24),
	pos_6_id varchar(24),
	pos_7_id varchar(24),
	pos_8_id varchar(24),
	pos_9_id varchar(24),
	starting_pitcher_id varchar(24),
	
	
	/*Opponent team stats, all 'away' fields will be dropped*/
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
	/*Opponent player stats*/
	opponent_pos_1_id varchar(24),
	opponent_pos_2_id varchar(24),
	opponent_pos_3_id varchar(24),
	opponent_pos_4_id varchar(24),
	opponent_pos_5_id varchar(24),
	opponent_pos_6_id varchar(24),
	opponent_pos_7_id varchar(24),
	opponent_pos_8_id varchar(24),
	opponent_pos_9_id varchar(24),
	opponent_starting_pitcher_id varchar(24),	
	PRIMARY KEY(id)
);

INSERT INTO yearBreakdownHome
	SELECT NULL, Team, games.game_date, games.game_number, games.home_score, Rdiff, SRS, R/G, R, RBI, OBP, OPSP, RA, ERA, SV, Team_Bating.HA, ER, ERAP, WHIP,
	home_batter_1_id, home_batter_2_id, home_batter_3_id, home_batter_4_id, home_batter_5_id, home_batter_6_id, home_batter_7_id, home_batter_8_id, home_batter_9_id, home_starting_pitcher_id
	from Team_Bating LEFT JOIN games 
	on (Team_Bating.Team = games.home);

INSERT INTO yearBreakdownAway
	SELECT NULL, Team, games.game_date, games.game_number, games.visitor_score, Rdiff, SRS, R/G, R, RBI, OBP, OPSP, RA, ERA, SV, Team_Bating.HA, ER, ERAP, WHIP,
	visitor_batter_1_id,visitor_batter_2_id,visitor_batter_3_id,visitor_batter_4_id,visitor_batter_5_id,visitor_batter_6_id,visitor_batter_7_id,visitor_batter_8_id,visitor_batter_9_id, visitor_starting_pitcher_id
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

/*Convert Retrosheet IDs to Baseball Reference IDs of players for Including Player Stats*/
UPDATE yearBreakdown JOIN players on yearBreakdown.pos_1_id = players.RTid SET yearBreakdown.pos_1_id = players.playerID;
UPDATE yearBreakdown JOIN players on yearBreakdown.pos_2_id = players.RTid SET yearBreakdown.pos_2_id = players.playerID;
UPDATE yearBreakdown JOIN players on yearBreakdown.pos_3_id = players.RTid SET yearBreakdown.pos_3_id = players.playerID;
UPDATE yearBreakdown JOIN players on yearBreakdown.pos_4_id = players.RTid SET yearBreakdown.pos_4_id = players.playerID;
UPDATE yearBreakdown JOIN players on yearBreakdown.pos_5_id = players.RTid SET yearBreakdown.pos_5_id = players.playerID;
UPDATE yearBreakdown JOIN players on yearBreakdown.pos_6_id = players.RTid SET yearBreakdown.pos_6_id = players.playerID;
UPDATE yearBreakdown JOIN players on yearBreakdown.pos_7_id = players.RTid SET yearBreakdown.pos_7_id = players.playerID;
UPDATE yearBreakdown JOIN players on yearBreakdown.pos_8_id = players.RTid SET yearBreakdown.pos_8_id = players.playerID;
UPDATE yearBreakdown JOIN players on yearBreakdown.starting_pitcher_id = players.RTid SET yearBreakdown.starting_pitcher_id = players.playerID;

UPDATE yearBreakdown JOIN players on yearBreakdown.opponent_starting_pitcher_id = players.RTid SET yearBreakdown.opponent_starting_pitcher_id = players.playerID;
UPDATE yearBreakdown JOIN players on yearBreakdown.opponent_pos_1_id = players.RTid SET yearBreakdown.opponent_pos_1_id = players.playerID;
UPDATE yearBreakdown JOIN players on yearBreakdown.opponent_pos_2_id = players.RTid SET yearBreakdown.opponent_pos_2_id = players.playerID;
UPDATE yearBreakdown JOIN players on yearBreakdown.opponent_pos_3_id = players.RTid SET yearBreakdown.opponent_pos_3_id = players.playerID;
UPDATE yearBreakdown JOIN players on yearBreakdown.opponent_pos_4_id = players.RTid SET yearBreakdown.opponent_pos_4_id = players.playerID;
UPDATE yearBreakdown JOIN players on yearBreakdown.opponent_pos_5_id = players.RTid SET yearBreakdown.opponent_pos_5_id = players.playerID;
UPDATE yearBreakdown JOIN players on yearBreakdown.opponent_pos_6_id = players.RTid SET yearBreakdown.opponent_pos_6_id = players.playerID;
UPDATE yearBreakdown JOIN players on yearBreakdown.opponent_pos_7_id = players.RTid SET yearBreakdown.opponent_pos_7_id = players.playerID;
UPDATE yearBreakdown JOIN players on yearBreakdown.opponent_pos_8_id = players.RTid SET yearBreakdown.opponent_pos_8_id = players.playerID;
UPDATE yearBreakdown JOIN players on yearBreakdown.opponent_pos_9_id = players.RTid SET yearBreakdown.opponent_pos_9_id = players.playerID;


DROP TABLE IF EXISTS yearBreakdownWithPlayerStats;
CREATE TABLE yearBreakdownWithPlayerStats(
	id int UNIQUE AUTO_INCREMENT,
	home_team varchar(8),
	home_game_date date,
	game_number int(2),
	/*Home team stats*/
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
	/*Home player stats*/
	pos_1_id varchar(24),
	pos_2_id varchar(24),
	pos_3_id varchar(24),
	pos_4_id varchar(24),
	pos_5_id varchar(24),
	pos_6_id varchar(24),
	pos_7_id varchar(24),
	pos_8_id varchar(24),
	pos_9_id varchar(24),
	starting_pitcher_id varchar(24),
	
	pos_1_last_name varchar(24),
	pos_1_age int,
	pos_1_R int,
	pos_1_H int,
	pos_1_RBI int,
	pos_1_BB int,
	pos_1_OPSP decimal(8,3),
	pos_1_TB int,
	
	pos_2_last_name varchar(24),
	pos_2_age int,
	pos_2_R int,
	pos_2_H int,
	pos_2_RBI int,
	pos_2_BB int,
	pos_2_OPSP decimal(8,3),
	pos_2_TB int,

	pos_3_last_name varchar(24),
	pos_3_age int,
	pos_3_R int,
	pos_3_H int,
	pos_3_RBI int,
	pos_3_BB int,
	pos_3_OPSP decimal(8,3),
	pos_3_TB int,

	pos_4_last_name varchar(24),
	pos_4_age int,
	pos_4_R int,
	pos_4_H int,
	pos_4_RBI int,
	pos_4_BB int,
	pos_4_OPSP decimal(8,3),
	pos_4_TB int,
	
	/*Opponent team stats, all 'away' fields will be dropped*/
	opponent_team varchar(8),
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
	/*Opponent player stats*/
	opponent_pos_1_id varchar(24),
	opponent_pos_2_id varchar(24),
	opponent_pos_3_id varchar(24),
	opponent_pos_4_id varchar(24),
	opponent_pos_5_id varchar(24),
	opponent_pos_6_id varchar(24),
	opponent_pos_7_id varchar(24),
	opponent_pos_8_id varchar(24),
	opponent_pos_9_id varchar(24),
	opponent_starting_pitcher_id varchar(24),

	opponent_pos_1_last_name varchar(24),
	opponent_pos_1_age int,
	opponent_pos_1_R int,
	opponent_pos_1_H int,
	opponent_pos_1_RBI int,
	opponent_pos_1_BB int,
	opponent_pos_1_OPSP decimal(8,3),
	opponent_pos_1_TB int,
	
	opponent_pos_2_last_name varchar(24),
	opponent_pos_2_age int,
	opponent_pos_2_R int,
	opponent_pos_2_H int,
	opponent_pos_2_RBI int,
	opponent_pos_2_BB int,
	opponent_pos_2_OPSP decimal(8,3),
	opponent_pos_2_TB int,

	opponent_pos_3_last_name varchar(24),
	opponent_pos_3_age int,
	opponent_pos_3_R int,
	opponent_pos_3_H int,
	opponent_pos_3_RBI int,
	opponent_pos_3_BB int,
	opponent_pos_3_OPSP decimal(8,3),
	opponent_pos_3_TB int,

	opponent_pos_4_last_name varchar(24),
	opponent_pos_4_age int,
	opponent_pos_4_R int,
	opponent_pos_4_H int,
	opponent_pos_4_RBI int,
	opponent_pos_4_BB int,
	opponent_pos_4_OPSP decimal(8,3),
	opponent_pos_4_TB int,

	Outcome boolean,
	PRIMARY KEY(id)
);


/*Individual Player Stats */

/* *************************************************

DROP TABLE IF EXISTS yearBreakdownWithPlayerStats;
CREATE TABLE yearBreakdownWithPlayerStats(

);

	pos_1_age int,
	pos_1_R int,
	pos_1_H int,
	pos_1_RBI int,
	pos_1_BB int,
	pos_1_OPSP decimal(8,3),
	pos_1_TB int,
	
	pos_2_age int,
	pos_2_R int,
	pos_2_H int,
	pos_2_RBI int,
	pos_2_BB int,
	pos_2_OPSP decimal(8,3),
	pos_2_TB int,

	pos_3_age int,
	pos_3_R int,
	pos_3_H int,
	pos_3_RBI int,
	pos_3_BB int,
	pos_3_OPSP decimal(8,3),
	pos_3_TB int,

	pos_4_age int,
	pos_4_R int,
	pos_4_H int,
	pos_4_RBI int,
	pos_4_BB int,
	pos_4_OPSP decimal(8,3),
	pos_4_TB int
*/
	
/*
********************************************************
********************************************************
****************Unused *********************************

	pos_3_age int,
	pos_3_R int,
	pos_3_H int,
	pos_3_2B int,
	pos_3_3B int,
	pos_3_HR int,
	pos_3_RBI int,
	pos_3_SB int,
	pos_3_CS int,
	pos_3_BB int,
	pos_3_SO int,
	pos_3_BA decimal(8,3),
	pos_3_OBP decimal(8,3),
	pos_3_SLG decimal(8,3),
	pos_3_OPS decimal(8,3),
	pos_3_OPSP decimal(8,3),
	pos_3_TB int,


	pos_4_age int,
	pos_4_R int,
	pos_4_H int,
	pos_4_2B int,
	pos_4_3B int,
	pos_4_HR int,
	pos_4_RBI int,
	pos_4_SB int,
	pos_4_CS int,
	pos_4_BB int,
	pos_4_SO int,
	pos_4_BA decimal(8,3),
	pos_4_OBP decimal(8,3),
	pos_4_SLG decimal(8,3),
	pos_4_OPS decimal(8,3),
	pos_4_OPSP decimal(8,3),
	pos_4_TB int,


	pos_5_age int,
	pos_5_R int,
	pos_5_H int,
	pos_5_2B int,
	pos_5_3B int,
	pos_5_HR int,
	pos_5_RBI int,
	pos_5_SB int,
	pos_5_CS int,
	pos_5_BB int,
	pos_5_SO int,
	pos_5_BA decimal(8,3),
	pos_5_OBP decimal(8,3),
	pos_5_SLG decimal(8,3),
	pos_5_OPS decimal(8,3),
	pos_5_OPSP decimal(8,3),
	pos_5_TB int,


	pos_6_age int,
	pos_6_R int,
	pos_6_H int,
	pos_6_2B int,
	pos_6_3B int,
	pos_6_HR int,
	pos_6_RBI int,
	pos_6_SB int,
	pos_6_CS int,
	pos_6_BB int,
	pos_6_SO int,
	pos_6_BA decimal(8,3),
	pos_6_OBP decimal(8,3),
	pos_6_SLG decimal(8,3),
	pos_6_OPS decimal(8,3),
	pos_6_OPSP decimal(8,3),
	pos_6_TB int,


	pos_7_age int,
	pos_7_R int,
	pos_7_H int,
	pos_7_2B int,
	pos_7_3B int,
	pos_7_HR int,
	pos_7_RBI int,
	pos_7_SB int,
	pos_7_CS int,
	pos_7_BB int,
	pos_7_SO int,
	pos_7_BA decimal(8,3),
	pos_7_OBP decimal(8,3),
	pos_7_SLG decimal(8,3),
	pos_7_OPS decimal(8,3),
	pos_7_OPSP decimal(8,3),
	pos_7_TB int,


	pos_8_age int,
	pos_8_R int,
	pos_8_H int,
	pos_8_2B int,
	pos_8_3B int,
	pos_8_HR int,
	pos_8_RBI int,
	pos_8_SB int,
	pos_8_CS int,
	pos_8_BB int,
	pos_8_SO int,
	pos_8_BA decimal(8,3),
	pos_8_OBP decimal(8,3),
	pos_8_SLG decimal(8,3),
	pos_8_OPS decimal(8,3),
	pos_8_OPSP decimal(8,3),
	pos_8_TB int,

	pos_9_age int,
	pos_9_R int,
	pos_9_H int,
	pos_9_2B int,
	pos_9_3B int,
	pos_9_HR int,
	pos_9_RBI int,
	pos_9_SB int,
	pos_9_CS int,
	pos_9_BB int,
	pos_9_SO int,
	pos_9_BA decimal(8,3),
	pos_9_OBP decimal(8,3),
	pos_9_SLG decimal(8,3),
	pos_9_OPS decimal(8,3),
	pos_9_OPSP decimal(8,3),
	pos_9_TB int,
*/

/* ********************************************* */

/*
SELECT yearBreakdownHome.*, playerSTDBatting.H, playerSTDBatting.TB
FROM yearBreakdownHome LEFT JOIN playerSTDBatting
ON (yearBreakdownHome.pos_1_id = playerSTDBatting.playerID)
LIMIT 10;

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
*/
