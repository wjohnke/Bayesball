DROP TABLE IF EXISTS players;
CREATE TABLE players(
	RTid varchar(24),
	last varchar(256),
	first varchar(256),
	BRid1 varchar(24),
	BRidDup int,
	player_debut date,
	playerID varchar(24),
	PRIMARY KEY(playerID)
);

DROP TABLE IF EXISTS RetrosheetIDConversion;
CREATE TABLE RetrosheetIDConversion(
	RetrosheetID varchar(24),
	BBRefID varchar(24),
	PRIMARY KEY(BBRefID)
);

DROP TABLE IF EXISTS playerSTDBatting;
CREATE TABLE playerSTDBatting(
	rowID int UNIQUE,
	first_name varchar(256),
	last_name varchar(256),
	playerID varchar(24),
	age int,
	team varchar(8),
	league varchar(3),
	games int,
	PA int,
	AB int,
	R int,
	H int,
	2B int,
	3B int,
	HR int,
	RBI int,
	SB int,
	CS int,
	BB int,
	SO int,
	BA decimal(8,3),
	OBP  decimal(8,3),
	SLG  decimal(8,3),
	OPS decimal(8,3),
	OPSP  decimal(8,3),
	TB decimal(8,3),
	GDP int,
	HBP int,
	SH int,
	SF int,
	IBB int,
	position_summary varchar(16),
	/*FOREIGN KEY(playerID) REFERENCES players(id),
	FOREIGN KEY(team) REFERENCES Team_Bating(Team),*/
	PRIMARY KEY(rowID)
);

LOAD DATA INFILE "/var/lib/mysql-files/playerID.csv"
INTO table bayesball.players
FIELDS TERMINATED BY ','
ENCLOSED BY ""
LINES TERMINATED BY '\r\n'
IGNORE 1 LINES;

LOAD DATA INFILE "/var/lib/mysql-files/RTtoBBRefIDs.csv"
INTO table bayesball.RetrosheetIDConversion
FIELDS TERMINATED BY ','
ENCLOSED BY ""
LINES TERMINATED BY '\r\n'
IGNORE 1 LINES;


LOAD DATA INFILE "/var/lib/mysql-files/playerSTDBatting.csv"
INTO table bayesball.playerSTDBatting
FIELDS TERMINATED BY ','
ENCLOSED BY ""
LINES TERMINATED BY '\r\n'
IGNORE 1 LINES;

ALTER TABLE bayesball.playerSTDBatting DROP COLUMN league;
ALTER TABLE bayesball.playerSTDBatting DROP COLUMN games;
ALTER TABLE bayesball.playerSTDBatting DROP COLUMN PA;
ALTER TABLE bayesball.playerSTDBatting DROP COLUMN AB;
ALTER TABLE bayesball.playerSTDBatting DROP COLUMN SH;
ALTER TABLE bayesball.playerSTDBatting DROP COLUMN SF;
ALTER TABLE bayesball.playerSTDBatting DROP COLUMN IBB;
ALTER TABLE bayesball.playerSTDBatting DROP COLUMN HBP;
ALTER TABLE bayesball.playerSTDBatting DROP COLUMN GDP;
ALTER TABLE bayesball.playerSTDBatting DROP COLUMN position_summary;

UPDATE playerSTDBatting SET team="WAS" WHERE team="WSN";
UPDATE playerSTDBatting SET team="NYN" WHERE team="NYM";
UPDATE playerSTDBatting SET team="NYA" WHERE team="NYY";
UPDATE playerSTDBatting SET team="ANA" WHERE team="LAA";
UPDATE playerSTDBatting SET team="LAN" WHERE team="LAD";
UPDATE playerSTDBatting SET team="TBA" WHERE team="TBR";
UPDATE playerSTDBatting SET team="SDN" WHERE team="SDP";
UPDATE playerSTDBatting SET team="SLN" WHERE team="STL";
UPDATE playerSTDBatting SET team="CHN" WHERE team="CHC";
UPDATE playerSTDBatting SET team="CHA" WHERE team="CHW";
UPDATE playerSTDBatting SET team="KCA" WHERE team="KCR";
UPDATE playerSTDBatting SET team="SFN" WHERE team="SFG";

DELETE from bayesball.players WHERE player_debut < "1990-01-01";



/* ******************************** */
/* The only currently working query to get all
data from top 4 in line up. Now just insert into
new table according to columns and wrap it up*/



INSERT INTO yearBreakdownWithPlayerStats(
SELECT
	yearBreakdown.id,
	yearBreakdown.home_team,
	yearBreakdown.home_game_date,
	yearBreakdown.game_number,
	/*Home team stats*/
	yearBreakdown.home_score ,
	yearBreakdown.Rdiff,
	yearBreakdown.SRS, 
	yearBreakdown.R_G,
	yearBreakdown.R, 
	yearBreakdown.RBI,
	yearBreakdown.OBP, 
	yearBreakdown.OPSP,
	yearBreakdown.RA, 
	yearBreakdown.ERA, 
	yearBreakdown.SV, 
	yearBreakdown.HA, 
	yearBreakdown.ER, 
	yearBreakdown.ERAP, 
	yearBreakdown.WHIP, 
	/*Home player stats*/
	yearBreakdown.pos_1_id, 
	yearBreakdown.pos_2_id, 
	yearBreakdown.pos_3_id,
	yearBreakdown.pos_4_id,
	yearBreakdown.pos_5_id, 
	yearBreakdown.pos_6_id, 
	yearBreakdown.pos_7_id, 
	yearBreakdown.pos_8_id, 
	yearBreakdown.pos_9_id, 
	yearBreakdown.starting_pitcher_id, 
	
	p1.last_name,
	p1.age,
	p1.R,
	p1.H,
	p1.RBI,
	p1.BB,
	p1.OPSP,
	p1.TB,
	p2.last_name,
	p2.age,
	p2.R,
	p2.H,
	p2.RBI,
	p2.BB,
	p2.OPSP,
	p2.TB,
	p3.last_name,
	p3.age,
	p3.R,
	p3.H,
	p3.RBI,
	p3.BB,
	p3.OPSP,
	p3.TB,
	p4.last_name,
	p4.age,
	p4.R,
	p4.H,
	p4.RBI,
	p4.BB,
	p4.OPSP,
	p4.TB,
	
	yearBreakdown.opponent_team,
	/*Away team stats*/
	yearBreakdown.opponent_score ,
	yearBreakdown.opponent_Rdiff,
	yearBreakdown.opponent_SRS, 
	yearBreakdown.opponent_R_G,
	yearBreakdown.opponent_R, 
	yearBreakdown.opponent_RBI,
	yearBreakdown.opponent_OBP, 
	yearBreakdown.opponent_OPSP,
	yearBreakdown.opponent_RA, 
	yearBreakdown.opponent_ERA, 
	yearBreakdown.opponent_SV, 
	yearBreakdown.opponent_HA, 
	yearBreakdown.opponent_ER, 
	yearBreakdown.opponent_ERAP, 
	yearBreakdown.opponent_WHIP, 
	/*Away player stats*/
	yearBreakdown.opponent_pos_1_id, 
	yearBreakdown.opponent_pos_2_id, 
	yearBreakdown.opponent_pos_3_id,
	yearBreakdown.opponent_pos_4_id,
	yearBreakdown.opponent_pos_5_id, 
	yearBreakdown.opponent_pos_6_id, 
	yearBreakdown.opponent_pos_7_id, 
	yearBreakdown.opponent_pos_8_id, 
	yearBreakdown.opponent_pos_9_id, 
	yearBreakdown.opponent_starting_pitcher_id,
	
	p5.last_name,
	p5.age,
	p5.R,
	p5.H,
	p5.RBI,
	p5.BB,
	p5.OPSP,
	p5.TB,
	
	p6.last_name,
	p6.age,
	p6.R,
	p6.H,
	p6.RBI,
	p6.BB,
	p6.OPSP,
	p6.TB,
	p7.last_name,
	p7.age,
	p7.R,
	p7.H,
	p7.RBI,
	p7.BB,
	p7.OPSP,
	p7.TB,
	p8.last_name,
	p8.age,
	p8.R,
	p8.H,
	p8.RBI,
	p8.BB,
	p8.OPSP,
	p8.TB,
	
	yearBreakdown.Outcome
	
FROM yearBreakdown
LEFT JOIN playerSTDBatting p1
ON yearBreakdown.pos_1_id=p1.playerID AND yearBreakdown.home_team = p1.team
LEFT JOIN playerSTDBatting p2 
ON yearBreakdown.pos_2_id = p2.playerID AND yearBreakdown.home_team = p2.team
LEFT JOIN playerSTDBatting p3
ON yearBreakdown.pos_3_id = p3.playerID AND yearBreakdown.home_team = p3.team
LEFT JOIN playerSTDBatting p4
ON yearBreakdown.pos_4_id = p4.playerID AND yearBreakdown.home_team = p4.team

LEFT JOIN playerSTDBatting p5
ON yearBreakdown.opponent_pos_1_id=p5.playerID AND yearBreakdown.opponent_team = p5.team
LEFT JOIN playerSTDBatting p6 
ON yearBreakdown.opponent_pos_2_id=p6.playerID AND yearBreakdown.opponent_team = p6.team
LEFT JOIN playerSTDBatting p7
ON yearBreakdown.opponent_pos_3_id=p7.playerID AND yearBreakdown.opponent_team = p7.team
LEFT JOIN playerSTDBatting p8
ON yearBreakdown.opponent_pos_4_id=p8.playerID AND yearBreakdown.opponent_team = p8.team

ORDER BY yearBreakdown.id );



/* ***************************************** 
**************NOT IN USE********************
********************************************



SELECT last_name,age, playerSTDBatting.R, playerSTDBatting.H, 2B, 3B, playerSTDBatting.HR,playerSTDBatting.RBI,SB,CS,BB,SO,BA,playerSTDBatting.OBP,playerSTDBatting.OPS,playerSTDBatting.OPSP,TB
FROM playerSTDBatting
LEFT JOIN yearBreakdown on yearBreakdown.pos_1_id = playerSTDBatting.playerID




SELECT last_name,age, playerSTDBatting.R, playerSTDBatting.H, 2B, 3B, playerSTDBatting.HR,playerSTDBatting.RBI,SB,CS,BB,SO,BA,playerSTDBatting.OBP,playerSTDBatting.OPS,playerSTDBatting.OPSP,TB
FROM playerSTDBatting
RIGHT JOIN yearBreakdown on yearBreakdown.pos_2_id = playerSTDBatting.playerID
LIMIT 4;


SELECT last_name,age, playerSTDBatting.R, playerSTDBatting.H, 2B, 3B, playerSTDBatting.HR,playerSTDBatting.RBI,SB,CS,BB,SO,BA,playerSTDBatting.OBP,playerSTDBatting.OPS,playerSTDBatting.OPSP,TB
FROM playerSTDBatting
LEFT JOIN yearBreakdown on yearBreakdown.pos_3_id = playerSTDBatting.playerID
UNION
SELECT last_name,age, playerSTDBatting.R, playerSTDBatting.H, 2B, 3B, playerSTDBatting.HR,playerSTDBatting.RBI,SB,CS,BB,SO,BA,playerSTDBatting.OBP,playerSTDBatting.OPS,playerSTDBatting.OPSP,TB
FROM playerSTDBatting
LEFT JOIN yearBreakdown on yearBreakdown.pos_4_id = playerSTDBatting.playerID
LIMIT 4;




SELECT age, R, H, 2B, 3B, HR,RBI,SB,CS,BB,SO,BA,OBP,OPS,OPSP,TB from playerSTDBatting
LEFT JOIN yearBreakdown on yearBreakdown.pos_2_id = playerSTDBatting.playerID
UNION
SELECT age, R, H, 2B, 3B, HR,RBI,SB,CS,BB,SO,BA,OBP,OPS,OPSP,TB from playerSTDBatting
LEFT JOIN yearBreakdown on yearBreakdown.pos_3_id = playerSTDBatting.playerID
UNION
SELECT age, R, H, 2B, 3B, HR,RBI,SB,CS,BB,SO,BA,OBP,OPS,OPSP,TB from playerSTDBatting
LEFT JOIN yearBreakdown on yearBreakdown.pos_4_id = playerSTDBatting.playerID
LIMIT 4;


SELECT players.id FROM playerSTDBatting
RIGHT JOIN players on playerSTDBatting.first_name = players.First
AND playerSTDBatting.last_name = players.last
AND (playerSTDBatting.newPlayerID <> players.id );

SELECT  *
FROM    playerSTDBatting pstd1
WHERE   EXISTS
        (
        SELECT  1
        FROM    playerSTDBatting pstd2
        WHERE   pstd2.newPlayerID = pstd1.newPlayerID
        LIMIT 1, 1
        )
		
*/



