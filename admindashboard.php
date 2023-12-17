
<?php
  
// Username is root
$user = 'root';
$password = 'root'; 
  
// Database name is gfg
$database = 'register'; 
  
// Server is localhost with
// port number 3308
$servername='localhost';
$mysqli = new mysqli($servername, $user, 
                $password, $database);
  
// Checking for connections
if ($mysqli->connect_error) {
    die('Connect Error (' . 
    $mysqli->connect_errno . ') '. 
    $mysqli->connect_error);
}
  
// SQL query to select data from database
$sql = "SELECT * FROM data ORDER BY Phone DESC ";
$result = $mysqli->query($sql);
$mysqli->close(); 
?>
<!DOCTYPE html>
<html lang="en">
  
<head>
    <meta charset="UTF-8">
    <title> User Details</title>
    <!-- CSS FOR STYLING THE PAGE -->
    <style>
        table {
            margin: 0 auto;
            font-size: large;
            border: 1px solid purple;
        }
  
        h1 {
            text-align: center;
            color: #16f5f5;
            font-size: xx-large;
            font-family: 'Gill Sans', 'Gill Sans MT', 
            ' Calibri', 'Trebuchet MS', 'sans-serif';
        }
  
        td {
            background-image: linear-gradient(to right, rgb(255, 71, 231), rgb(71, 249, 255));
            border: 1px solid black;
        }
  
        th,
        td {
            font-weight: bold;
            border: 1px solid purple;
            padding: 10px;
            text-align: center;
        }
  
        td {
            font-weight: lighter;
        }
    </style>
</head>
  
<body>

    <section>
        <h1>User details</h1>
        <!-- TABLE CONSTRUCTION-->
        <table>
            <tr>
                <th>Firstname</th>
                <th>Lastname</th>
                <th>Username</th>
                <th>Phone</th>
            </tr>
            <!-- PHP CODE TO FETCH DATA FROM ROWS-->
            <?php   // LOOP TILL END OF DATA 
                while($rows=$result->fetch_assoc())
                {
             ?>
            <tr>
                <!--FETCHING DATA FROM EACH 
                    ROW OF EVERY COLUMN-->
                <td><?php echo $rows['Firstname'];?></td>
                <td><?php echo $rows['Lastname'];?></td>
                <td><?php echo $rows['Username'];?></td>
                <td><?php echo $rows['Phone'];?></td>
            </tr>
		
            <?php
                }
				echo "<center><h3><a href='admindashboard.html'> ← Back</h3></a><center>";	
				echo "<center><h3><a href='feedback.php'>View feedback →</h3></a><center>";	
             ?>
        </table>
    </section>
</body>
  
</html>