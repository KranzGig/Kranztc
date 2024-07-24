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
<body>
  <ul>
    <li id="current_tab"><a href="accounts.html">Accounts</a></li>
    <li><a href="history.html">History</a></li>
    <li id="right"><a href="login.html">Log Out</a></li>
  </ul>
  <h1>Account Management</h1>
<div class="line">
</div>
<div class="long">
<table class="table table-borderless table-responsive">
<?php
	session_start();
	
	$servername = "127.0.0.1:3306";
	$username = "u751975974_kranz";
	$password = "Dradbgon12";
	$dbname = "u751975974_TestDB";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	$sql = 'SELECT email, admin FROM accounts';
	$result = $conn->query($sql);
	 if ($result->num_rows > 0) {
    		while($row = $result->fetch_assoc()) {
			echo "<tr>";
			echo "<th>Email:</th>";
			echo "<td>";
			echo $row['email'];
			echo "</td></tr>";
			echo "<tr>";
			echo "<th>Caretaker:</th>";
			echo "<td>";
			if ($row['admin'] == 0) {
				echo "Yes";
			} else {
				echo "No";
			}
			echo "</td></tr>";
			echo "<tr><td>";
			echo "<button class='square' id='delete'>";
    			echo "X";
  			echo "</button>";
  			echo "Delete Profile<br>";
  			echo "</div>";
			echo "</tr></td>";
		}
	 }
?>
	<tr id="add" hidden>
		<form>
			<tr>
				<th>Email:</th>
				<td><input type="text" id="email" name="email"> </td>
			</tr>
			<tr>
				<th>Caretaker:</th>
				<td><input type="checkbox" id="caretaker" name="caretaker"> </td>
			</tr>
			<tr>
				 <td><input type="submit" value="Save"></td>
			</tr>
		</form>
	</tr>
</table>
</div>
  <div class="button1">
  <button class="square_current">
    /
  </button>
  Edit Profile<br>
  
  <div class="line">
  </div>
  <div class="button1">
  <button class="square">
    +
  </button>
  Add Profile
  </div>
</body>
</html>
