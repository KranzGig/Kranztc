<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Time Tracker Login</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100..700;1,100..700&display=swap" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="style.css?v2.9">
</head>
<body onload="checkIncorrect()">
  <ul>
    <li id="current_tab"><a href="accounts.php">Accounts</a></li>
    <li><a href="history.php">History</a></li>
    <li id="right"><a href="logout.php">Log Out</a></li>
    <?php
	session_start();
	$name = $_SESSION['name'];
	echo "<li id='joe'>".$name."</li>";
    ?>
  </ul>
  <h1>Account Management</h1>
<div class="line">
</div><br /><br>
<div class="long">
<table id="acc_mng">
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
			echo "<form action='delete_submit.php' method='post'><tr>";
			echo "<th>Name:</th>";
			echo "<td>";
			echo $row['name'];
			echo "</td></tr>";
			echo "<tr><th>Email:</th>";
			echo "<td>";
			echo "<input type='hidden' name='email' value='".$row['email']."'/>";
			echo $row['email'];
			echo "</td></tr>";
			echo "<tr><th>Phone:</th>";
			echo "<td>";
			echo "<input type='hidden' name='phone' value='".$row['phone']."'/>";
			echo $row['phone'];
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
			$name = $row['name'];
			echo "<input type='submit' value='Delete' class='delete' onclick=\"return confirm('Are you sure you want to delete $name?');\"><br/>";
  			echo "</div>";
			echo "</tr></form></td>";
		}
	 }
?>
	<tr id="add">
		<form action="add_submit.php" method="post">
			<tr class="hidden" style="display:none;">
				<th class="hidden" style="display:none;">Name:</th>
				<td><input type="text" id="name" name="name" class="hidden" style="display:none;"> </td>
			</tr>
			<tr class="hidden" style="display:none;">
				<th class="hidden" style="display:none;">Email:</th>
				<td><input type="text" id="email" name="email" class="hidden" style="display:none;"> </td>
			</tr>
			<tr class="hidden" style="display:none;">
				<th class="hidden" style="display:none;">Phone Number:</th>
				<td><input type="text" id="phone" name="phone" class="hidden" style="display:none;"> </td>
			</tr>
			<tr class="hidden" style="display:none;">
				<th class="hidden" style="display:none;">Caretaker:</th>
				<td><input type="checkbox" id="caretaker" name="caretaker" class="hidden" style="display:none;"> </td>
			</tr>
			<tr class="hidden" style="display:none;">
				<p id='incorrect'>Fill out all fields</p> 
				<td><input type="submit" value="Save" class="hidden" id='enter' style="display:none;"></td>
				 </form>
				 <td><button onclick="addHidden()" class="hidden" id='save' style="display:none;">Cancel</button></td>
			</tr>
		
	</tr>
</table>
</div>
  <div class="button1">
  <button class="square_current" onclick="window.location.href='accounts_edit.php'">
    /
  </button>
  <a href="#" onclick="window.location.href='accounts_edit.php'">Edit Profile</a>
  <br>
  </div>
  <div class="button1">
  <button class="square" onclick="removeHidden()">
    +
  </button>
  <a href="#" onclick=removeHidden()>Add Profile</a>
  </div><br /><br />

<script type="text/javascript">
	function checkIncorrect() {
	        const queryString = window.location.search;
	        const urlParams = new URLSearchParams(queryString);
	        if (urlParams.get("error") == "1") {
	            document.getElementById("incorrect").style.removeProperty('display');
		    removeHidden();
	        }
       }
	function removeHidden() {
		const hidden = document.getElementsByClassName("hidden");
		for (let j = 0; j < hidden.length; j++) {
	  		hidden[j].style.removeProperty('display');
		}
	}
	function addHidden() {
		const hidden = document.getElementsByClassName("hidden");
		for (let j = 0; j < hidden.length; j++) {
	  		//hidden[j].setAttribute("display","none");
			hidden[j].style.display = 'none';
			
		}
	}
</script>

	  
</body>
</html>
