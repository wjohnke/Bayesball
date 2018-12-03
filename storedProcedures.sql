/* Stored Procedures */

DELIMITER $$ ;
CREATE PROCEDURE getModelWithPlayers()          
SELECT id, Rdiff, SRS, R_G, R, RBI, OBP, OPSP, RA, ERA, SV, HA, ER, ERAP, WHIP, pos_1_age, pos_1_R, pos_1_H, pos_1_RBI, pos_1_BB, pos_1_OPSP, pos_1_TB, pos_2_age, pos_2_R, pos_2_H, pos_2_RBI, pos_2_BB, pos_2_OPSP, pos_2_TB, pos_3_age, pos_3_R, pos_3_H, pos_3_RBI, pos_3_BB, pos_3_OPSP, pos_3_TB, pos_4_age, pos_4_R, pos_4_H, pos_4_RBI, pos_4_BB, pos_4_OPSP,  pos_4_TB,  starting_pitcher_age, starting_pitcher_W_L_Percentage, starting_pitcher_ERA, starting_pitcher_IP, starting_pitcher_ER, starting_pitcher_SO, starting_pitcher_ERAP, starting_pitcher_FIP, starting_pitcher_WHIP, starting_pitcher_HR9, starting_pitcher_BB9, starting_pitcher_SO9, opponent_Rdiff, opponent_SRS ,opponent_R_G ,opponent_R ,opponent_RBI, opponent_OBP ,opponent_OPSP ,opponent_RA,opponent_ERA ,opponent_SV ,opponent_HA, opponent_ER, opponent_ERAP,opponent_WHIP, opponent_pos_1_age, opponent_pos_1_R, opponent_pos_1_H, opponent_pos_1_RBI, opponent_pos_1_BB, opponent_pos_1_OPSP, opponent_pos_1_TB, opponent_pos_2_age, opponent_pos_2_R, opponent_pos_2_H, opponent_pos_2_RBI, opponent_pos_2_BB, opponent_pos_2_OPSP, opponent_pos_2_TB, opponent_pos_3_age, opponent_pos_3_R, opponent_pos_3_H, opponent_pos_3_RBI, opponent_pos_3_BB, opponent_pos_3_OPSP, opponent_pos_3_TB, opponent_pos_4_age, opponent_pos_4_R, opponent_pos_4_H, opponent_pos_4_RBI, opponent_pos_4_BB, opponent_pos_4_OPSP, opponent_pos_4_TB, opponent_starting_pitcher_age, opponent_starting_pitcher_W_L_Percentage, opponent_starting_pitcher_ERA, opponent_starting_pitcher_IP, opponent_starting_pitcher_ER, opponent_starting_pitcher_SO, opponent_starting_pitcher_ERAP, opponent_starting_pitcher_FIP, opponent_starting_pitcher_WHIP, opponent_starting_pitcher_HR9, opponent_starting_pitcher_BB9, opponent_starting_pitcher_SO9, Outcome FROM yearBreakdownWithPlayerStats;   
$$
DELIMITER ;

DELIMITER $$ ;
CREATE PROCEDURE getModelWithoutPlayers()          
SELECT id, Rdiff, SRS, R_G, R, RBI, OBP, OPSP, RA, ERA, SV, HA, ER, ERAP, WHIP, opponent_Rdiff, opponent_SRS ,opponent_R_G ,opponent_R ,opponent_RBI, opponent_OBP ,opponent_OPSP ,opponent_RA,opponent_ERA ,opponent_SV ,opponent_HA, opponent_ER, opponent_ERAP,opponent_WHIP, Outcome FROM yearBreakdown;   
$$
DELIMITER ;

DELIMITER $$ ;
CREATE PROCEDURE getGameHomeTeam(IN team1 varchar(32))          
SELECT id, Rdiff, SRS, R_G, R, RBI, OBP, OPSP, RA, ERA, SV, HA, ER, ERAP, WHIP FROM yearBreakdown WHERE home_team=team1;  
$$
DELIMITER ;

DELIMITER $$ ;
CREATE PROCEDURE getGameOpponentTeam(IN team2 varchar(32))
SELECT id as opponent_id, Rdiff as opponent_Rdiff, SRS as opponent_SRS, R_G as opponent_R_G, R as opponent_R, RBI as opponent_RBI, OBP as opponent_OBP, OPSP as opponent_OPSP, RA as opponent_RA, ERA as opponent_ERA, SV as opponent_SV, HA as opponent_HA, ER as opponent_ER, ERAP as opponent_ERAP, WHIP as opponent_WHIP, 0 FROM yearBreakdown WHERE home_team=team2; 
$$
DELIMITER ;

DELIMITER $$ ;
CREATE PROCEDURE getPlayerHomeTeam(IN team1 varchar(32))
SELECT id, Rdiff, SRS, R_G, R, RBI, OBP, OPSP, RA, ERA, SV, HA, ER, ERAP, WHIP, pos_1_age, pos_1_R, pos_1_H, pos_1_RBI, pos_1_BB, pos_1_OPSP, pos_1_TB, pos_2_age, pos_2_R, pos_2_H, pos_2_RBI, pos_2_BB, pos_2_OPSP, pos_2_TB, pos_3_age, pos_3_R, pos_3_H, pos_3_RBI, pos_3_BB, pos_3_OPSP, pos_3_TB, pos_4_age, pos_4_R, pos_4_H, pos_4_RBI, pos_4_BB, pos_4_OPSP,  pos_4_TB, starting_pitcher_age, starting_pitcher_W_L_Percentage, starting_pitcher_ERA, starting_pitcher_IP, starting_pitcher_ER, starting_pitcher_SO, starting_pitcher_ERAP, starting_pitcher_FIP, starting_pitcher_WHIP, starting_pitcher_HR9, starting_pitcher_BB9, starting_pitcher_SO9 FROM yearBreakdownWithPlayerStats WHERE home_team=team1;
$$
DELIMITER ;

DELIMITER $$ ;
CREATE PROCEDURE getPlayerOpponentTeam(IN team2 varchar(32))
SELECT id as opponent_id, Rdiff as opponent_Rdiff, SRS as opponent_SRS, R_G as opponent_R_G, R as opponent_R, RBI as opponent_RBI, OBP as opponent_OBP, OPSP as opponent_OPSP, RA as opponent_RA, ERA as opponent_ERA, SV as opponent_SV, HA as opponent_HA, ER as opponent_ER, ERAP as opponent_ERAP, WHIP as opponent_WHIP, pos_1_age as opponent_pos_1_age, pos_1_R as opponent_pos_1_R, pos_1_H as opponent_pos_1_H, pos_1_RBI as opponent_pos_1_RBI, pos_1_BB as opponent_pos_1_BB, pos_1_OPSP as opponent_pos_1_OPSP, pos_1_TB as opponent_pos_1_TB, pos_2_age as opponent_pos_2_age, pos_2_R as opponent_pos_2_R, pos_2_H as opponent_pos_2_H, pos_2_RBI as opponent_pos_2_RBI, pos_2_BB as opponent_pos_2_BB, pos_2_OPSP as opponent_pos_2_OPSP, pos_2_TB as opponent_pos_2_TB, pos_3_age as opponent_pos_3_age, pos_3_R as opponent_pos_3_R, pos_3_H as opponent_pos_3_H, pos_3_RBI as opponent_pos_3_RBI, pos_3_BB as opponent_pos_3_BB, pos_3_OPSP as opponent_pos_3_OPSP, pos_3_TB as opponent_pos_3_TB, pos_4_age as opponent_pos_4_age, pos_4_R as opponent_pos_4_R, pos_4_H as opponent_pos_4_H, pos_4_RBI as opponent_pos_4_RBI, pos_4_BB as opponent_pos_4_BB, pos_4_OPSP as opponent_pos_4_OPSP,  pos_4_TB as opponent_pos_4_TB, starting_pitcher_age as opponent_starting_pitcher_age, starting_pitcher_W_L_Percentage as opponent_starting_pitcher_W_L_Percentage, starting_pitcher_ERA as opponent_starting_pitcher_ERA, starting_pitcher_IP as opponent_starting_pitcher_IP, starting_pitcher_ER as opponent_starting_pitcher_ER, starting_pitcher_SO as opponent_starting_pitcher_SO, starting_pitcher_ERAP as opponent_starting_pitcher_ERAP, starting_pitcher_FIP as opponent_starting_pitcher_FIP, starting_pitcher_WHIP as opponent_starting_pitcher_WHIP, starting_pitcher_HR9 as opponent_starting_pitcher_HR9, starting_pitcher_BB9 as opponent_starting_pitcher_BB9, starting_pitcher_SO9 as opponent_starting_pitcher_SO9, 0 FROM yearBreakdownWithPlayerStats WHERE home_team=team2;
$$
DELIMITER ;

DELIMITER $$ ;
CREATE PROCEDURE getPlayerWithDate(IN team1 varchar(32), IN team2 varchar(32), IN game_date date)
SELECT id, Rdiff, SRS, R_G, R, RBI, OBP, OPSP, RA, ERA, SV, HA, ER, ERAP, WHIP, pos_1_age, pos_1_R, pos_1_H, pos_1_RBI, pos_1_BB, pos_1_OPSP, pos_1_TB, pos_2_age, pos_2_R, pos_2_H, pos_2_RBI, pos_2_BB, pos_2_OPSP, pos_2_TB, pos_3_age, pos_3_R, pos_3_H, pos_3_RBI, pos_3_BB, pos_3_OPSP, pos_3_TB, pos_4_age, pos_4_R, pos_4_H, pos_4_RBI, pos_4_BB, pos_4_OPSP,  pos_4_TB,  starting_pitcher_age, starting_pitcher_W_L_Percentage, starting_pitcher_ERA, starting_pitcher_IP, starting_pitcher_ER, starting_pitcher_SO, starting_pitcher_ERAP, starting_pitcher_FIP, starting_pitcher_WHIP, starting_pitcher_HR9, starting_pitcher_BB9, starting_pitcher_SO9,  opponent_Rdiff, opponent_SRS ,opponent_R_G ,opponent_R ,opponent_RBI, opponent_OBP ,opponent_OPSP ,opponent_RA,opponent_ERA ,opponent_SV ,opponent_HA, opponent_ER, opponent_ERAP,opponent_WHIP, opponent_pos_1_age, opponent_pos_1_R, opponent_pos_1_H, opponent_pos_1_RBI, opponent_pos_1_BB, opponent_pos_1_OPSP, opponent_pos_1_TB, opponent_pos_2_age, opponent_pos_2_R, opponent_pos_2_H, opponent_pos_2_RBI, opponent_pos_2_BB, opponent_pos_2_OPSP, opponent_pos_2_TB, opponent_pos_3_age, opponent_pos_3_R, opponent_pos_3_H, opponent_pos_3_RBI, opponent_pos_3_BB, opponent_pos_3_OPSP, opponent_pos_3_TB, opponent_pos_4_age, opponent_pos_4_R, opponent_pos_4_H, opponent_pos_4_RBI, opponent_pos_4_BB, opponent_pos_4_OPSP, opponent_pos_4_TB, opponent_starting_pitcher_age, opponent_starting_pitcher_W_L_Percentage, opponent_starting_pitcher_ERA, opponent_starting_pitcher_IP, opponent_starting_pitcher_ER, opponent_starting_pitcher_SO, opponent_starting_pitcher_ERAP, opponent_starting_pitcher_FIP, opponent_starting_pitcher_WHIP, opponent_starting_pitcher_HR9, opponent_starting_pitcher_BB9, opponent_starting_pitcher_SO9, 0 FROM yearBreakdownWithPlayerStats WHERE home_team=team1 AND opponent_team=team2 AND home_game_date LIKE game_date;
$$
DELIMITER ;

