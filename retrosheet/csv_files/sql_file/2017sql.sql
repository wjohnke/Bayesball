--
-- This table is suitable for storing the output of 'cwgame,' a Retrosheet
-- event log parser, part of Chadwick (http://chadwick.sourceforge.net).
-- Game logs ready for input may also be downloaded from:
--   http://www.retrosheet.org/gamelogs
--
-- For column descriptions see:
--   http://chadwick.sourceforge.net/chapter1.html#cwgame-game-information-extractor
--
-- This script is written for MySQL (it is not database-agnostic).
--
DROP TABLE IF EXISTS games;
CREATE TABLE `games` (
  `date` date NOT NULL default '0000-00-00',
  `game_number` char(1) NOT NULL default '',
  `day` char(3) NOT NULL default '',
  `visitor` char(3) NOT NULL default '',
  `visitor_lg` char(2) NOT NULL default '',
  `visitor_game_number` tinyint(3) NOT NULL default '0',
  `home` char(3) NOT NULL default '',
  `home_lg` char(2) NOT NULL default '',
  `home_game_number` tinyint(3) NOT NULL default '0',
  `visitor_score` tinyint(3) NOT NULL default '0',
  `home_score` tinyint(3) NOT NULL default '0',
  `outs` smallint(5) NOT NULL default '0',
  `daynight` char(1) NOT NULL default '',
  `completion` varchar(255) NOT NULL default '',
  `forfeit` varchar(1) NOT NULL default '',
  `protest` varchar(2) NOT NULL default '',
  `park` varchar(5) NOT NULL default '',
  `attendance` int(10) NOT NULL default '0',
  `game_minutes` smallint(5) NOT NULL default '0',
  `visitor_linescore` varchar(255) NOT NULL default '',
  `home_linescore` varchar(255) NOT NULL default '',
  `visitor_ab` tinyint(3) NOT NULL default '0',
  `visitor_h` tinyint(3) NOT NULL default '0',
  `visitor_2b` tinyint(3) NOT NULL default '0',
  `visitor_3b` tinyint(3) NOT NULL default '0',
  `visitor_hr` tinyint(3) NOT NULL default '0',
  `visitor_rbi` tinyint(3) NOT NULL default '0',
  `visitor_sh` tinyint(3) NOT NULL default '0',
  `visitor_sf` tinyint(3) NOT NULL default '0',
  `visitor_hbp` tinyint(3) NOT NULL default '0',
  `visitor_bb` tinyint(3) NOT NULL default '0',
  `visitor_ibb` tinyint(3) NOT NULL default '0',
  `visitor_so` tinyint(3) NOT NULL default '0',
  `visitor_sb` tinyint(3) NOT NULL default '0',
  `visitor_cs` tinyint(3) NOT NULL default '0',
  `visitor_gidp` tinyint(3) NOT NULL default '0',
  `visitor_ci` tinyint(3) NOT NULL default '0',
  `visitor_lob` tinyint(3) NOT NULL default '0',
  `visitor_pitchers_used` tinyint(3) NOT NULL default '0',
  `visitor_individual_er` tinyint(3) NOT NULL default '0',
  `visitor_team_er` tinyint(3) NOT NULL default '0',
  `visitor_wp` tinyint(3) NOT NULL default '0',
  `visitor_balks` tinyint(3) NOT NULL default '0',
  `visitor_putouts` tinyint(3) NOT NULL default '0',
  `visitor_assists` tinyint(3) NOT NULL default '0',
  `visitor_errors` tinyint(3) NOT NULL default '0',
  `visitor_passed_balls` tinyint(3) NOT NULL default '0',
  `visitor_double_plays` tinyint(3) NOT NULL default '0',
  `visitor_triple_plays` tinyint(3) NOT NULL default '0',
  `home_ab` tinyint(3) NOT NULL default '0',
  `home_h` tinyint(3) NOT NULL default '0',
  `home_2b` tinyint(3) NOT NULL default '0',
  `home_3b` tinyint(3) NOT NULL default '0',
  `home_hr` tinyint(3) NOT NULL default '0',
  `home_rbi` tinyint(3) NOT NULL default '0',
  `home_sh` tinyint(3) NOT NULL default '0',
  `home_sf` tinyint(3) NOT NULL default '0',
  `home_hbp` tinyint(3) NOT NULL default '0',
  `home_bb` tinyint(3) NOT NULL default '0',
  `home_ibb` tinyint(3) NOT NULL default '0',
  `home_so` tinyint(3) NOT NULL default '0',
  `home_sb` tinyint(3) NOT NULL default '0',
  `home_cs` tinyint(3) NOT NULL default '0',
  `home_gidp` tinyint(3) NOT NULL default '0',
  `home_ci` tinyint(3) NOT NULL default '0',
  `home_lob` tinyint(3) NOT NULL default '0',
  `home_pitchers_used` tinyint(3) NOT NULL default '0',
  `home_individual_er` tinyint(3) NOT NULL default '0',
  `home_team_er` tinyint(3) NOT NULL default '0',
  `home_wp` tinyint(3) NOT NULL default '0',
  `home_balks` tinyint(3) NOT NULL default '0',
  `home_putouts` tinyint(3) NOT NULL default '0',
  `home_assists` tinyint(3) NOT NULL default '0',
  `home_errors` tinyint(3) NOT NULL default '0',
  `home_passed_balls` tinyint(3) NOT NULL default '0',
  `home_double_plays` tinyint(3) NOT NULL default '0',
  `home_triple_plays` tinyint(3) NOT NULL default '0',
  `hp_ump_id` varchar(8) NOT NULL default '',
  `hp_ump_name` varchar(255) NOT NULL default '',
  `1b_ump_id` varchar(8) NOT NULL default '',
  `1b_ump_name` varchar(255) NOT NULL default '',
  `2b_ump_id` varchar(8) NOT NULL default '',
  `2b_ump_name` varchar(255) NOT NULL default '',
  `3b_ump_id` varchar(8) NOT NULL default '',
  `3b_ump_name` varchar(255) NOT NULL default '',
  `lf_ump_id` varchar(8) NOT NULL default '',
  `lf_ump_name` varchar(255) NOT NULL default '',
  `rf_ump_id` varchar(8) NOT NULL default '',
  `rf_ump_name` varchar(255) NOT NULL default '',
  `visitor_manager_id` varchar(8) NOT NULL default '',
  `visitor_manager_name` varchar(255) NOT NULL default '',
  `home_manager_id` varchar(8) NOT NULL default '',
  `home_manager_name` varchar(255) NOT NULL default '',
  `winning_pitcher_id` varchar(8) NOT NULL default '',
  `winning_pitcher_name` varchar(255) NOT NULL default '',
  `losing_pitcher_id` varchar(8) NOT NULL default '',
  `losing_pitcher_name` varchar(255) NOT NULL default '',
  `saving_pitcher_id` varchar(8) NOT NULL default '',
  `saving_pitcher_name` varchar(255) NOT NULL default '',
  `gwrbi_batter_id` varchar(8) NOT NULL default '',
  `gwrbi_batter_name` varchar(255) NOT NULL default '',
  `visitor_starting_pitcher_id` varchar(8) NOT NULL default '',
  `visitor_starting_pitcher_name` varchar(255) NOT NULL default '',
  `home_starting_pitcher_id` varchar(8) NOT NULL default '',
  `home_starting_pitcher_name` varchar(255) NOT NULL default '',
  `visitor_batter_1_id` varchar(8) NOT NULL default '',
  `visitor_batter_1_name` varchar(255) NOT NULL default '',
  `visitor_batter_1_pos` tinyint(3) NOT NULL default '0',
  `visitor_batter_2_id` varchar(8) NOT NULL default '',
  `visitor_batter_2_name` varchar(255) NOT NULL default '',
  `visitor_batter_2_pos` tinyint(3) NOT NULL default '0',
  `visitor_batter_3_id` varchar(8) NOT NULL default '',
  `visitor_batter_3_name` varchar(255) NOT NULL default '',
  `visitor_batter_3_pos` tinyint(3) NOT NULL default '0',
  `visitor_batter_4_id` varchar(8) NOT NULL default '',
  `visitor_batter_4_name` varchar(255) NOT NULL default '',
  `visitor_batter_4_pos` tinyint(3) NOT NULL default '0',
  `visitor_batter_5_id` varchar(8) NOT NULL default '',
  `visitor_batter_5_name` varchar(255) NOT NULL default '',
  `visitor_batter_5_pos` tinyint(3) NOT NULL default '0',
  `visitor_batter_6_id` varchar(8) NOT NULL default '',
  `visitor_batter_6_name` varchar(255) NOT NULL default '',
  `visitor_batter_6_pos` tinyint(3) NOT NULL default '0',
  `visitor_batter_7_id` varchar(8) NOT NULL default '',
  `visitor_batter_7_name` varchar(255) NOT NULL default '',
  `visitor_batter_7_pos` tinyint(3) NOT NULL default '0',
  `visitor_batter_8_id` varchar(8) NOT NULL default '',
  `visitor_batter_8_name` varchar(255) NOT NULL default '',
  `visitor_batter_8_pos` tinyint(3) NOT NULL default '0',
  `visitor_batter_9_id` varchar(8) NOT NULL default '',
  `visitor_batter_9_name` varchar(255) NOT NULL default '',
  `visitor_batter_9_pos` tinyint(3) NOT NULL default '0',
  `home_batter_1_id` varchar(8) NOT NULL default '',
  `home_batter_1_name` varchar(255) NOT NULL default '',
  `home_batter_1_pos` tinyint(3) NOT NULL default '0',
  `home_batter_2_id` varchar(8) NOT NULL default '',
  `home_batter_2_name` varchar(255) NOT NULL default '',
  `home_batter_2_pos` tinyint(3) NOT NULL default '0',
  `home_batter_3_id` varchar(8) NOT NULL default '',
  `home_batter_3_name` varchar(255) NOT NULL default '',
  `home_batter_3_pos` tinyint(3) NOT NULL default '0',
  `home_batter_4_id` varchar(8) NOT NULL default '',
  `home_batter_4_name` varchar(255) NOT NULL default '',
  `home_batter_4_pos` tinyint(3) NOT NULL default '0',
  `home_batter_5_id` varchar(8) NOT NULL default '',
  `home_batter_5_name` varchar(255) NOT NULL default '',
  `home_batter_5_pos` tinyint(3) NOT NULL default '0',
  `home_batter_6_id` varchar(8) NOT NULL default '',
  `home_batter_6_name` varchar(255) NOT NULL default '',
  `home_batter_6_pos` tinyint(3) NOT NULL default '0',
  `home_batter_7_id` varchar(8) NOT NULL default '',
  `home_batter_7_name` varchar(255) NOT NULL default '',
  `home_batter_7_pos` tinyint(3) NOT NULL default '0',
  `home_batter_8_id` varchar(8) NOT NULL default '',
  `home_batter_8_name` varchar(255) NOT NULL default '',
  `home_batter_8_pos` tinyint(3) NOT NULL default '0',
  `home_batter_9_id` varchar(8) NOT NULL default '',
  `home_batter_9_name` varchar(255) NOT NULL default '',
  `home_batter_9_pos` tinyint(3) NOT NULL default '0',
  `additional_info` varchar(255) NOT NULL default '',
  `acquisition` char(1) NOT NULL default '',
  PRIMARY KEY  (`date`,`game_number`,`visitor`,`home`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;


--
-- Load game data.
-- The following is generated using load_csv_gls script.
--

  LOAD DATA LOCAL INFILE '/home/ubuntu/retrosheets/baseball_data/retrosheet/csv_files/tmp26349/*.TXT.fixed'
    INTO TABLE games
    FIELDS TERMINATED BY ','
    OPTIONALLY ENCLOSED BY '"'
    LINES TERMINATED BY '\\n'
    IGNORE 0 LINES;
  
