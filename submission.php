<?php
	//header('Location: index.html');
	//exit;
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
	echo $_SESSION['id'];
?>
