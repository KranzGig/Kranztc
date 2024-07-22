<?php
$servername = "127.0.0.1:3306";
$username = "u751975974_kranz";
$password = "Dradbgon12";
$dbname = "u751975974_TestDB";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
if ( !isset($_POST['pword'], $_POST['repword']) ) {
	// Could not get the data that should have been sent.
	exit('Please fill both fields!');
}
//if ($stmt = $conn->prepare('SELECT id FROM accounts WHERE code = ?')) {
echo $_POST['URLid'];
?>
