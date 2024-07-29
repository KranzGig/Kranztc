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
    <li><a href="accounts.html">Accounts</a></li>
    <li id="current_tab"><a href="history.html">History</a></li>
    <li id="right"><a href="login.html">Log Out</a></li>
  </ul>
  <h1>Weekly Caretaker History</h1>
  <div class="line">
  </div>
  <div class="long">
    <table>
       <tr>
        <th>Caretaker:</th>
       <td>
	<form method="post">
	  <select name="caretakers" id="caretakers">
	    <?php
		$servername = "127.0.0.1:3306";
		$username = "u751975974_kranz";
		$password = "Dradbgon12";
		$dbname = "u751975974_TestDB";
	
		// Create connection
		$conn = new mysqli($servername, $username, $password, $dbname);
		$sql = 'SELECT name, admin FROM accounts';
		$result = $conn->query($sql);
		 if ($result->num_rows > 0) {
    			while($row = $result->fetch_assoc()) {
				$name = $row['name'];
				if (!$row['admin']) {
					echo "<option value ='".$name."'>".$name."</option>";
				}
			}
		 }
	    ?>
      </td>
      </tr>
      <tr>
        <th>Pick Date:</th>
       <td>
	  <input type="date" name="date" id="date">
      </td>
      </tr>
      <tr><td>
	      <input type="submit" value="Go">
      </td></tr>
    </table>
  </div>
  <div class="line">
  </div>
  <table id="history_table">
	  <tr>
      <th>Date:</th>
      <th>Hours:</th>
      <th>Paid Vacation:</th>
    </tr>
    <?php
	session_start();
	$name = $_POST['caretakers'];
	$sql = "SELECT id FROM accounts WHERE name='$name'";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();
	$id = $row['id'];
	$name = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];
		$mins = 24 * 60 * 60;
		//$new_date = strtotime($_POST['date']);
		//echo $new_date;
		echo "<form action='history_submit.php' method='post'>";
		echo "<input type='hidden' name='id' value=$id>";
		for ($x = date("w"); $x >= 0; $x--) {
			$time = strtotime($_POST['date']) - $x * $mins;
			$day = $name[date("w",$time)];
			$timestamp = date("m/d",$time);
			$date = $day." ".date("m/d",$time);
			$sql = "SELECT Hours,Vacation FROM Hours WHERE Date=' $timestamp' AND EmpID=$id";
			//echo $timestamp;
			$result = $conn->query($sql);
			$num = 0;
			if ($result->num_rows > 0) {
				$row = $result->fetch_assoc();
				$num = $row["Hours"];
				$vacation = $row["Vacation"];
				echo "<tr><td><input type='hidden' name=$day-date value=$date>$date</td>";
				echo "<td><input type='text' name=$day-hours value=$num class='hidden' hidden><p class='unhidden'>$num</p></td>";
				if ($vacation) {
					echo "<td><input type='checkbox' class='hidden' name=$day-vacation checked hidden><p class='unhidden'>Yes</p></td></tr>";
				} else {
					echo "<td><input type='checkbox' class='hidden' name=$day-vacation hidden><p class='unhidden'>No</p></td></tr>";
				}
			}
			
		}
		for ($x = 1; $x < 7-date("w"); $x++) {
			$time = strtotime($_POST['date']) + $x * $mins;
			$day = $name[date("w",$time)];
			$timestamp = date("m/d",$time);
			$date = $day." ".date("m/d",$time);
			$sql = "SELECT Hours,Vacation FROM Hours WHERE Date=' $timestamp' AND EmpID=$id";
			//echo $timestamp;
			$result = $conn->query($sql);
			$num = 0;
			if ($result->num_rows > 0) {
				$row = $result->fetch_assoc();
				$num = $row["Hours"];
				$vacation = $row["Vacation"];
				echo "<tr><td><input type='hidden' name=$day-date value=$date>$date</td>";
				echo "<td><input type='text' name=$day-hours value=$num class='hidden' hidden><p class='unhidden'>$num</p></td>";
				if ($vacation) {
					echo "<td><input type='checkbox' class='hidden' name=$day-vacation checked hidden><p class='unhidden'>Yes</p></td></tr>";
				} else {
					echo "<td><input type='checkbox' class='hidden' name=$day-vacation hidden><p class='unhidden'>No</p></td></tr>";
				}
			}
		}
		echo "<tr><td><input type='submit' value='Save' class='hidden' hidden></td>";
		echo "</form>";
		echo "<td><button class='hidden' onclick=addHidden() hidden>Cancel</button></td></tr>";
    ?>
  </table>
  <div class="button1">
  <button class="square" id="history_edit" class="unhidden" onclick=removeHidden()>
    /
  </button>
  Edit
  </div>

<script>
	function removeHidden() {
		const hidden = document.getElementsByClassName("hidden");
		for (let j = 0; j < hidden.length; j++) {
	  		hidden[j].removeAttribute("hidden");
		}
		const unhidden = document.getElementsByClassName("unhidden");
		for (let j = 0; j < unhidden.length; j++) {
	  		unhidden[j].setAttribute("hidden","true");
		}
	}
	function addHidden() {
		const hidden = document.getElementsByClassName("hidden");
		for (let j = 0; j < hidden.length; j++) {
	  		hidden[j].setAttribute("hidden","true");
		}
		const unhidden = document.getElementsByClassName("unhidden");
		for (let j = 0; j < unhidden.length; j++) {
	  		unhidden[j].removeAttribute("hidden");
		}
	}
</script>
		  
</body>
</html>
