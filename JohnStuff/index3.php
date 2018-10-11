<!DOCTYPE html>
<html>
    <head>
        <title>Home Page</title>
<!--        <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>-->
        <!--<script type="text/javascript" src="js/jquery.js"></script>
        <script type="text/javascript" src="js/jquery-ui.js"></script>-->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		
        
        <link href="references/js/jquery-ui.theme.css" rel="stylesheet" type="text/css">
        <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
        <!-- Bootstrap core CSS -->
        <link href="references/startbootstrap-simple-sidebar-gh-pages/startbootstrap-simple-sidebar-gh-pages/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

        <!-- Bootstrap core JavaScript -->
<!--        <script src="startbootstrap-simple-sidebar-gh-pages/startbootstrap-simple-sidebar-gh-pages/vendor/jquery/jquery.min.js"></script>-->
        <script src="references/startbootstrap-simple-sidebar-gh-pages/startbootstrap-simple-sidebar-gh-pages/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        
        <script>
            $(function() 
            {
                $("#selectedDate").datepicker();
            });
        </script>
    </head>
    <body>
        <h1>Games</h1>
        <form action="index3.php" method="GET" class="col-md-4 col-md-offset-5">
            <p>Date: <input type="text" name="selectedDate" id="selectedDate"></p>
            <input class="btn btn-primary" type="submit" name="submit" value="Execute">
        </form>
    </body>
</html>

<?php
if(isset($_GET['submit']))
{
	printGamesOfDay();
}


function printGamesOfDay(){	
	
    $hostname = 'ec2-52-6-86-207.compute-1.amazonaws.com';
    $username = 'capstoneAdmin';
    $password = '12345678';
    $database = 'bayesball'; 
    
    $mysqli = new mysqli($hostname, $username, $password, $database);
    if($mysqli->connect_error){
        die("$mysqli->connect_errno: $mysqli->connect_error");
    }
    $query = "SELECT visitor, home FROM games WHERE game_date LIKE ?";
    $stmt = $mysqli->stmt_init();
    if(!$stmt->prepare($query)){
        echo "Failed to prepare statement";
    }
    else{
        $dateSelected = empty($_GET['selectedDate']) ? "" : $_GET['selectedDate'];    
        
		if($dateSelected!=""){
		
			$formatted = DateTime::createFromFormat('m/d/Y', $dateSelected);
			
			$stmt->bind_param("s",$formatted->format('Y-m-d'));
			$stmt->execute();
			$result=$stmt->get_result();
			$numRows = $result->num_rows;
			echo "<br><br>There are " . $numRows . " Games on " . $_GET['selectedDate'];
			if($numRows>0)
            {
                echo "<table class='table table-striped'>";
				echo "<thead><tr><th>Home</th><th>Away</th><th></th><tr></thead>";
                echo "<tbody>";
				while($row=$result->fetch_array(MYSQLI_NUM))
                {
                    echo "<tr>";
					foreach($row as $r)
                    { 
						echo "<td>" . $r . "</td>";
					}
                    echo "<td><input class='btn btn-primary' type='submit' name='getPrediction' value='Get Prediction'></td>";
                    echo "</tr>";
				}
                echo "</tbody>";
                echo "</table>";
			}
		}
        
    }
    
    $stmt->close();
    $mysqli->close();
} 
?>