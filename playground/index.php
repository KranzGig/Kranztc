<!DOCTYPE html>
<html>
    <style>
table, th, td {
  border:1px solid black;
}
</style>
<body>

<h1>My first PHP page</h1>

<form action="" method="POST">
Date: <input type="date" name="date"><br>
Hours: <input type="number" name="hours"><br>
Vacation: <input type="text" name="vacation"><br>
EmpID: <input type="text" name="empid"><br>
<input type="submit">
</form>

<p id="Sun"></p>
<p id="Mon"></p>
<p id="Tue"></p>
<p id="Wed"></p>
<p id="Thu"></p>
<p id="Fri"></p>
<p id="Sat"></p>

<script>
    const name = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat']
    const now = Date.now();
    const DAY = 60 * 60 * 24 * 1000;
    const today = new Date(now).getDay();

    for (let i = today; i >= 0; i--) {
        const date = new Date(now - DAY * i);
        //console.log("*",name[date.getDay()], date.getDate());
        document.getElementById(name[date.getDay()]).innerHTML = name[date.getDay()].concat(" ", date.getMonth() + 1, "/", date.getDate());
    }
    for (let i = 1; i < 7 - today; i++) {
        const date = new Date(now + DAY * i);
        //console.log(name[date.getDay()], date.getDate());
        document.getElementById(name[date.getDay()]).innerHTML = name[date.getDay()].concat(" ", date.getMonth() + 1, "/", date.getDate());
    }
</script>



 <?php
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
	header('Location: login.html');
	exit;
}

$servername = "127.0.0.1:3306";
$username = "u751975974_kranz";
$password = "Dradbgon12";
$dbname = "u751975974_TestDB";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully <br>";
$sql = "INSERT INTO Hours (Date, Hours, Vacation, EmpID)
VALUES ('". $_POST['date'] . "','" . $_POST['hours'] . "','" . $_POST['vacation'] . "','" . $_POST['empid'] ."')";
$conn->query($sql);

$sql = "SELECT Date, Hours, Vacation, EmpID FROM Hours";
$result = $conn->query($sql);

echo "<table>\n<tr>\n";
echo "<th>Date</th>\n";
echo "<th>Hours</th>\n";
echo "<th>Vacation</th>\n";
echo "<th>EmpID</th>\n";
echo "</tr>\n";
if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "<tr>\n";
    echo "<td>" . $row["Date"]. "</td>\n";
    echo "<td>" . $row["Hours"] . "</td>\n";
    echo "<td>" . $row["Vacation"] . "</td>\n";
    echo "<td>" . $row["EmpID"] . "</td>\n";
    echo "</tr>\n";
    #echo "Date: " . $row["Date"]. " - Hours: " . $row["Hours"]. " - Vacation: " . $row["Vacation"]. " - EmpID: " . $row["EmpID"]. "<br>";
  }
  echo "</table>\n";
} else {
  echo "0 results";
}
$conn->close();
?> 


</body>
</html>

