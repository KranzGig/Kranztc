<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Time Tracker Hours</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100..700;1,100..700&display=swap" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="style.css?v=1.6">
</head>
<body>
 <?php
	session_start();
	// If the user is not logged in redirect to the login page...
	if (!isset($_SESSION['loggedin'])) {
		header('Location: index.html');
		exit;
	}
?>
  <img id="clock2" src="clock.png" alt="clock icon"
   srcset="clock.png 2400w"
   sizes="80vw";
  >
  <h1>Enter Hours</h1>
<div class="container">
  <table class="table table-borderless table-responsive">
    <form action="submission.php" method="POST">
	<thead>
      <tr>
        <th>Date:</th>
        <th>Hours:</th>
	<th>Paid Vacation:</th>
      </tr>
	<?php
		$servername = "127.0.0.1:3306";
		$username = "u751975974_kranz";
		$password = "Dradbgon12";
		$dbname = "u751975974_TestDB";

		$conn = new mysqli($servername, $username, $password, $dbname);

		$name = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];
		$mins = 24 * 60 * 60;

		for ($x = date("w"); $x >= 0; $x--) {
			$time = time() - $x * $mins;
			$day = $name[date("w",$time)];
			$date = $day." ".date("m/d",$time);
			echo "<tr><td class='$day'></td>";
			echo "<input type='hidden' name='$day.date' value='$date' class='$day'/>";
			echo "<td><select name='$day.hours' id='numhours'>";
			echo "<option value='0'></option>";
			for ($i=1;$i<=24;$i++) {
				echo "<option value='$i'>$i</option>";
			}
			echo "</td><td><input type='checkbox' id='pvacation' name='$day.pvacation' value='Paid'></td></tr>";
		}
		
		
	?>
      
    </thead>
  </table>
</div>

	
<div class="button">
    <input type="submit" value="Save">
    <input type="submit" value="Log Out" onclick="index.html">
	</div>
  </form>
</body>
</html>
