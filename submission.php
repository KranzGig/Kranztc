<?php
	session_start();
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
	$days = array("Sun","Mon","Tue","Wed","Thu","Fri","Sat");
	foreach ($days as $day) {
		$date = $_POST[$day . 'date'];
		//echo $date;
		$date = substr($date, strpos($date, ' '));
		$id = $_SESSION['id'];
		$hours = $_POST[$day . 'hours'];
		if ($hours == '') {
			$hours = 0;
		}
		$vacation = $_POST[$day . 'pvacation'];
		$sql = "SELECT * FROM Hours WHERE Date=$date AND EmpID=$id;";
		//echo $sql;
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			echo "True";
		} else {
			$sql = "INSERT INTO Hours VALUES ($date, $hours, $vacation, $id)";
			echo $sql;
			//$conn->query($sql);
		}
	}
	echo $_POST[$days[0] . "date"];
?>
