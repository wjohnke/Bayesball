DROP TABLE IF EXISTS BattingPos;

-- CREATE TABLE bayesball.BattingPos (
-- 	id INT NOT NULL AUTO_INCREMENT,
--     first_name_1 varchar(255),
--     last_name_1 varchar(255),
--     playerID_1 varchar(255),
--     age_1 int,
--     team_1 varchar(255),
--     R_1 int,
--     H_1 int,
--     BA_1 decimal(8,3),
--     full_name_1 varchar(255),
--     RTID_1 varchar(255),
--     homeBattingPos_1 int,
--  first_name_2 varchar(255),
--     last_name_2 varchar(255),
--     playerID_2 varchar(255),
--     age_2 int,
--     team_2 varchar(255),
--     R_2 int,
--     H_2 int,
--     BA_2 decimal(8,3),
--     full_name_2 varchar(255),
--     RTID_2 varchar(255),
--     homeBattingPos_2 int,
--  first_name_3 varchar(255),
--     last_name_3 varchar(255),
--     playerID_3 varchar(255),
--     age_3 int,
--     team_3 varchar(255),
--     R_3 int,
--     H_3 int,
--     BA_3 decimal(8,3),
--     full_name_3 varchar(255),
--     RTID_3 varchar(255),
--     homeBattingPos_3 int,
--  first_name_4 varchar(255),
--     last_name_4 varchar(255),
--     playerID_4 varchar(255),
--     age_4 int,
--     team_4 varchar(255),
--     R_4 int,
--     H_4 int,
--     BA_4 decimal(8,3),
--     full_name_4 varchar(255),
--     RTID_4 varchar(255),
--     homeBattingPos_4 int,
--  first_name_5 varchar(255),
--     last_name_5 varchar(255),
--     playerID_5 varchar(255),
--     age_5 int,
--     team_5 varchar(255),
--     R_5 int,
--     H_5 int,
--     BA_5 decimal(8,3),
--     full_name_5 varchar(255),
--     RTID_5 varchar(255),
--     homeBattingPos_5 int,
--  first_name_6 varchar(255),
--     last_name_6 varchar(255),
--     playerID_6 varchar(255),
--     age_6 int,
--     team_6 varchar(255),
--     R_6 int,
--     H_6 int,
--     BA_6 decimal(8,3),
--     full_name_6 varchar(255),
--     RTID_6 varchar(255),
--     homeBattingPos_6 int,
--  first_name_7 varchar(255),
--     last_name_7 varchar(255),
--     playerID_7 varchar(255),
--     age_7 int,
--     team_7 varchar(255),
--     R_7 int,
--     H_7 int,
--     BA_7 decimal(8,3),
--     full_name_7 varchar(255),
--     RTID_7 varchar(255),
--     homeBattingPos_7 int,
--  first_name_8 varchar(255),
--     last_name_8 varchar(255),
--     playerID_8 varchar(255),
--     age_8 int,
--     team_8 varchar(255),
--     R_8 int,
--     H_8 int,
--     BA_8 decimal(8,3),
--     full_name_8 varchar(255),
--     RTID_8 varchar(255),
--     homeBattingPos_8 int,
--  first_name_9 varchar(255),
--     last_name_9 varchar(255),
--     playerID_9 varchar(255),
--     age_9 int,
--     team_9 varchar(255),
--     R_9 int,
--     H_9 int,
--     BA_9 decimal(8,3),
--     full_name_9 varchar(255),
--     RTID_9 varchar(255),
--     homeBattingPos_9 int,

-- 	CONSTRAINT NewTable_PK PRIMARY KEY (id)
-- )
DROP TABLE IF EXISTS BattingPos;


CREATE TABLE bayesball.BattingPos (
	id INT NOT NULL AUTO_INCREMENT,

    full_name_1 varchar(255),
    team_1 varchar(255),
    R_1 int,
    H_1 int,
    BA_1 decimal(8,3),
    RBI_1 int,
    homeBattingPos_1 int,
    game_date_1 date,

     full_name_2 varchar(255),
    team_2 varchar(255),
    R_2 int,
    H_2 int,
    BA_2 decimal(8,3),
    RBI_2 int,
    homeBattingPos_2 int,
        game_date_2 date,

 
        full_name_3 varchar(255),
    team_3 varchar(255),
    R_3 int,
    H_3 int,
    BA_3 decimal(8,3),
    RBI_3 int,
    homeBattingPos_3 int,
        game_date_3 date,

 
     full_name_4 varchar(255),   
    team_4 varchar(255),
    R_4 int,
    H_4 int,
    BA_4 decimal(8,3),
    RBI_4 int,
    homeBattingPos_4 int,
        game_date_4 date,

 
        full_name_5 varchar(255),
    team_5 varchar(255),
    R_5 int,
    H_5 int,
    BA_5 decimal(8,3),
    RBI_5 int,
    homeBattingPos_5 int,
        game_date_5 date,

 
        full_name_6 varchar(255),
    team_6 varchar(255),
    R_6 int,
    H_6 int,
    BA_6 decimal(8,3),
    RBI_6 int,
    homeBattingPos_6 int,
        game_date_6 date,

 
      full_name_7 varchar(255), 
    team_7 varchar(255),
    R_7 int,
    H_7 int,
    BA_7 decimal(8,3),
    RBI_7 int,
    homeBattingPos_7 int,
        game_date_7 date,

 
        full_name_8 varchar(255),
    team_8 varchar(255),
    R_8 int,
    H_8 int,
    BA_8 decimal(8,3),
    RBI_8 int,
    homeBattingPos_8 int,
        game_date_8 date,

 
       full_name_9 varchar(255),
    team_9 varchar(255),
    R_9 int,
    H_9 int,
    BA_9 decimal(8,3),
    RBI_9 int,
    homeBattingPos_9 int,
        game_date_9 date,


	CONSTRAINT NewTable_PK PRIMARY KEY (id)
)



INSERT INTO BattingPos (

SELECT 
p1.full_name,p1.team,p1.R,p1.H,p1.BA,p1.RBI, games.home_batter_1_pos,games.game_date ,
p2.full_name,p2.team,p2.R,p2.H,p2.BA,p2.RBI,games.home_batter_2_pos,games.game_date ,
p3.full_name,p3.team,p3.R,p3.H,p3.BA,p3.RBI,games.home_batter_3_pos,games.game_date ,
p4.full_name,p4.team,p4.R,p4.H,p4.BA,p4.RBI,games.home_batter_4_pos,games.game_date ,
p5.full_name,p5.team,p5.R,p5.H,p5.BA,p5.RBI,games.home_batter_5_pos,games.game_date ,
p6.full_name,p6.team,p6.R,p6.H,p6.BA,p6.RBI,games.home_batter_6_pos,games.game_date ,
p7.full_name,p7.team,p7.R,p7.H,p7.BA,p7.RBI,games.home_batter_7_pos,games.game_date ,
p8.full_name,p8.team,p8.R,p8.H,p8.BA,p8.RBI,games.home_batter_8_pos,games.game_date ,
p9.full_name,p9.team,p9.R,p9.H,p9.BA,p9.RBI,games.home_batter_9_pos,games.game_date 

FROM games
        LEFT JOIN bayesball.playerSTDBatting p1 ON games.home_batter_1_id = p1.RTID AND games.home = p1.team 
        LEFT JOIN bayesball.playerSTDBatting p2 ON games.home_batter_2_id  =  p2.RTID AND games.home = p2.team 
        LEFT JOIN bayesball.playerSTDBatting p3 ON games.home_batter_3_id  =  p3.RTID AND games.home = p3.team 
        LEFT JOIN bayesball.playerSTDBatting p4 ON games.home_batter_4_id  =  p4.RTID AND games.home = p4.team 
        LEFT JOIN bayesball.playerSTDBatting p5 ON games.home_batter_5_id  =  p5.RTID AND games.home = p5.team 
        LEFT JOIN bayesball.playerSTDBatting p6 ON games.home_batter_6_id  =  p6.RTID AND games.home = p6.team 
        LEFT JOIN bayesball.playerSTDBatting p7 ON games.home_batter_7_id  =  p7.RTID AND games.home = p7.team 
        LEFT JOIN bayesball.playerSTDBatting p8 ON games.home_batter_8_id  =  p8.RTID AND games.home = p8.team 
       
        LEFT JOIN bayesball.playerSTDBatting p9 ON games.home_batter_9_id  =  p9.RTID AND games.home = p9.team );


INSERT INTO BattingPos (       
       SELECT 
p1.full_name,p1.team,p1.R,p1.H,p1.BA,p1.RBI, games.visitor_batter_1_pos,games.game_date ,
p2.full_name,p2.team,p2.R,p2.H,p2.BA,p2.RBI,games.visitor_batter_2_pos,games.game_date ,
p3.full_name,p3.team,p3.R,p3.H,p3.BA,p3.RBI,games.visitor_batter_3_pos,games.game_date ,
p4.full_name,p4.team,p4.R,p4.H,p4.BA,p4.RBI,games.visitor_batter_4_pos,games.game_date ,
p5.full_name,p5.team,p5.R,p5.H,p5.BA,p5.RBI,games.visitor_batter_5_pos,games.game_date ,
p6.full_name,p6.team,p6.R,p6.H,p6.BA,p6.RBI,games.visitor_batter_6_pos,games.game_date ,
p7.full_name,p7.team,p7.R,p7.H,p7.BA,p7.RBI,games.visitor_batter_7_pos,games.game_date ,
p8.full_name,p8.team,p8.R,p8.H,p8.BA,p8.RBI,games.visitor_batter_8_pos,games.game_date ,
p9.full_name,p9.team,p9.R,p9.H,p9.BA,p9.RBI,games.visitor_batter_9_pos,games.game_date 

FROM games
        LEFT JOIN bayesball.playerSTDBatting p1 ON games.visitor_batter_1_id = p1.RTID AND  games.visitor = p1.team
        LEFT JOIN bayesball.playerSTDBatting p2 ON games.visitor_batter_2_id  =  p2.RTID AND  games.visitor = p2.team
        LEFT JOIN bayesball.playerSTDBatting p3 ON games.visitor_batter_3_id  =  p3.RTID AND  games.visitor = p3.team
        LEFT JOIN bayesball.playerSTDBatting p4 ON games.visitor_batter_4_id  =  p4.RTID AND games.visitor = p4.team
        LEFT JOIN bayesball.playerSTDBatting p5 ON games.visitor_batter_5_id  =  p5.RTID AND games.visitor = p5.team
        LEFT JOIN bayesball.playerSTDBatting p6 ON games.visitor_batter_6_id  =  p6.RTID AND  games.visitor = p6.team
        LEFT JOIN bayesball.playerSTDBatting p7 ON games.visitor_batter_7_id  =  p7.RTID AND games.visitor = p7.team
        LEFT JOIN bayesball.playerSTDBatting p8 ON games.visitor_batter_8_id  =  p8.RTID AND  games.visitor = p8.team
       
        LEFT JOIN bayesball.playerSTDBatting p9 ON games.visitor_batter_9_id  =  p9.RTID AND  games.visitor = p9.team
       );