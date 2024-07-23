<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Time Tracker Hours</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100..700;1,100..700&display=swap" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="style.css?v=1.7">
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
		session_start();
		$servername = "127.0.0.1:3306";
		$username = "u751975974_kranz";
		$password = "Dradbgon12";
		$dbname = "u751975974_TestDB";

		$conn = new mysqli($servername, $username, $password, $dbname);

		$id = $_SESSION['id'];
		

		$name = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];
		$mins = 24 * 60 * 60;

		for ($x = date("w"); $x >= 0; $x--) {
			$time = time() - $x * $mins;
			$day = $name[date("w",$time)];
			$timestamp = date("m/d",$time);
			$date = $day." ".date("m/d",$time);
			$sql = "SELECT Hours,Vacation FROM Hours WHERE Date=' $timestamp' AND EmpID=$id";
			
			$result = $conn->query($sql);
			$num = 0;
			if ($result->num_rows > 0) {
				$row = $result->fetch_assoc();
				$num = $row["Hours"];
				$vacation = $row["Vacation"];
			}
			echo "<tr><td class='$day'>$date</td>";
			echo "<input type='hidden' name='".$day."date' value='".$date."' class='$day'/>";
			echo "<td><select name='".$day."hours' id='numhours'>";
			echo "<option value='0'></option>";
			for ($i=1;$i<=24;$i++) {
				if ($i == $num) {
					echo "<option value='$i' selected>$i</option>";
				} else {
					echo "<option value='$i'>$i</option>";
				}
			}
			if ($vacation) {
				echo "</td><td><input type='checkbox' id='pvacation' name='".$day."pvacation' value='Paid' checked></td></tr>";
			} else {
				echo "</td><td><input type='checkbox' id='pvacation' name='".$day."pvacation' value='Paid'></td></tr>";
			}
		}
		for ($x = 1; $x < 7-date("w"); $x++) {
			$time = time() + $x * $mins;
			$day = $name[date("w",$time)];
			$timestamp = date("m/d",$time);
			$date = $day." ".date("m/d",$time);
			$sql = "SELECT Hours FROM Hours WHERE Date=' $timestamp' AND EmpID=$id";
			
			$result = $conn->query($sql);
			$num = 0;
			if ($result->num_rows > 0) {
				$row = $result->fetch_assoc();
				$num = $row["Hours"];
			}
			echo "<tr><td class='$day'>$date</td>";
			echo "<input type='hidden' name='".$day."date' value='".$date."' class='$day'/>";
			echo "<td><select name='".$day."hours' id='numhours' disabled>";
			echo "<option value='0'></option>";
			for ($i=1;$i<=24;$i++) {
				if ($i == $num) {
					echo "<option value='$i' selected>$i</option>";
				} else {
					echo "<option value='$i'>$i</option>";
				}
			}
			if ($vacation) {
				echo "</td><td><input type='checkbox' id='pvacation' name='".$day."pvacation' value='Paid' checked disabled></td></tr>";
			} else {
				echo "</td><td><input type='checkbox' id='pvacation' name='".$day."pvacation' value='Paid' disabled></td></tr>";
			}
		}
		
		
	?>
      
    </thead>
  </table>
</div>

	
<div class="button">
    <input type="submit" value="Save">
    <a href="logout.php"><input type="button" value="Logout"></a>
	</div>
  </form>
</body>
</html>
