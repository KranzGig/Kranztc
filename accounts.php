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
			echo "<form action='delete_submit.php' method='post'><tr>";
			echo "<th>Email:</th>";
			echo "<td>";
			echo "<input type='hidden' name='email' value='".$row['email']."'/>";
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
			echo "<input type='submit' value='Delete'><br/>";
  			echo "</div>";
			echo "</tr></form></td>";
		}
	 }
?>
	<tr id="add">
		<form action="add_submit.php" method="post">
			<tr>
				<th class="hidden" hidden>Email:</th>
				<td><input type="text" id="email" name="email" class="hidden" hidden> </td>
			</tr>
			<tr>
				<th class="hidden" hidden>Caretaker:</th>
				<td><input type="checkbox" id="caretaker" name="caretaker" class="hidden" hidden> </td>
			</tr>
			<tr>
				 <td><input type="submit" value="Save" class="hidden" hidden></td>
				 </form>
				 <td><button onclick="addHidden()" class="hidden" hidden>Cancel</button></td>
			</tr>
		
	</tr>
</table>
</div>
  <div class="button1">
  <button class="square_current" onclick="window.location.href='accounts_edit.php'">
    /
  </button>
  Edit Profile<br>
  
  <div class="line">
  </div>
  <div class="button1">
  <button class="square" onclick="removeHidden()">
    +
  </button>
  Add Profile
  </div>

<script>
	function removeHidden() {
		const hidden = document.getElementsByClassName("hidden");
		for (let j = 0; j < hidden.length; j++) {
	  		hidden[j].removeAttribute("hidden");
		}
	}
	function addHidden() {
		const hidden = document.getElementsByClassName("hidden");
		for (let j = 0; j < hidden.length; j++) {
	  		hidden[j].setAttribute("hidden","true");
		}
	}
</script>

	  
</body>
</html>
