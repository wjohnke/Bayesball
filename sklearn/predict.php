<?php

/* if(isset($_GET['submit'])){*/

	$team1 = empty($_GET['home_team']) ? "" : $_GET['home_team'];
	$team2 = empty($_GET['away_team']) ? "" : $_GET['away_team'];

	$command = escapeshellcmd("python sklearnBayesball.py $team1 $team2");
	$output = shell_exec($command);
	echo $output;	
	return $output;

?>
