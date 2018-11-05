DROP TABLE IF EXISTS playerSTDBatting;
CREATE TABLE playerSTDBatting(
	rowID int UNIQUE,
	name varchar(256),
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

LOAD DATA INFILE "/var/lib/mysql-files/playerSTDBatting.csv"
INTO table bayesball.playerSTDBatting
FIELDS TERMINATED BY ','
ENCLOSED BY ""
LINES TERMINATED BY '\r\n'
IGNORE 1 LINES;