<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Time Tracker Login</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100..700;1,100..700&display=swap" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body onload="checkIncorrect()">
  <ul>
    <li id="current_tab"><a href="accounts.php">Accounts</a></li>
    <li><a href="history.php">History</a></li>
	  <?php
	session_start();
	$name = $_SESSION['name'];
	echo "<li>".$name."</li>";
    ?>
    <li id="right"><a href="logout.php">Log Out</a></li>
  </ul>
  <h1>Account Management</h1>
<div class="line">
</div>
<div class="long">
<form action='edit_submit.php' method='post'>
<table class="table table-borderless table-responsive">
<?php
	session_start();
	
	$servername = "127.0.0.1:3306";
	$username = "u751975974_kranz";
	$password = "Dradbgon12";
	$dbname = "u751975974_TestDB";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	$sql = 'SELECT email, admin, name, phone FROM accounts';
	$result = $conn->query($sql);
	 if ($result->num_rows > 0) {
    		while($row = $result->fetch_assoc()) {
			echo "<tr>";
			echo "<th>Name:</th>";
			echo "<td><input type='text' name='name-".$row['email']." 'value='".$row['name']."'></td>";
			//echo $row['email'];
			echo "</td></tr>";
			echo "<tr>";
			echo "<th>Email:</th>";
			echo "<td><input type='text' name='email-".$row['email']." 'value='".$row['email']."'></td>";
			//echo $row['email'];
			echo "</td></tr>";
			echo "<tr>";
			echo "<th>Phone Number:</th>";
			echo "<td><input type='text' name='phone-".$row['email']." 'value='".$row['phone']."'></td>";
			echo "</td></tr>";
			echo "<tr>";
			echo "<th>Caretaker:</th>";
			echo "<td>";
			if ($row['admin'] == 0) {
				echo "<input type=checkbox name='admin-".$row['email']."' checked>";
			}
			if ($row['admin'] == 1) {
				echo "<input type=checkbox name='admin-".$row['email']."'>";
			}
			echo "</td></tr>";
  			echo "</div>";
		}
		 echo "<tr><p style='display:none;' id='incorrect'>Incorrect email and/or password</p></tr>";
		 echo "<tr><td>";
			
		 	echo "<input type=submit value='Save' id='enter'>";
			echo "</td></tr>";
	 }
?>
</table></form>
</div>
  <script type="text/javascript">
	function checkIncorrect() {
        const queryString = window.location.search;
        const urlParams = new URLSearchParams(queryString);
        if (urlParams.get("error") == "1") {
            document.getElementById("incorrect").style.removeProperty('display');
        }
    }
    
</script>
</body>
</html>
