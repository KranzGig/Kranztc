<?php
$servername = "127.0.0.1:3306";
$username = "u751975974_kranz";
$password = "Dradbgon12";
$dbname = "u751975974_TestDB";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
if ( !isset($_POST['pword']) || !isset($_POST['repword'])) {
	// Could not get the data that should have been sent.
	exit('Please fill both fields!');
}
if ($_POST['pword'] != $_POST['repword']) {
	exit('Passwords do not match');
}
echo "one";
if ($stmt = $conn->prepare('SELECT id FROM accounts WHERE code = ?')) {
	echo md5($_POST['URLid']);
	/*$stmt->bind_param('s', md5($_POST['URLid']));
	$stmt->execute();
	$stmt->store_result();
	echo "three";
	if ($stmt->num_rows > 0) {
		echo "four";
		$stmt->bind_result($id);
    		$stmt->fetch();
		if ($stmt = $conn->prepare("UPDATE accounts SET password=? WHERE id=$id")) {
    	            $stmt->bind_param('s', password_hash($_POST['pword'],PASSWORD_DEFAULT));
	            $stmt->execute();
	            session_regenerate_id();
    		    $_SESSION['loggedin'] = TRUE;
    		    $_SESSION['uname'] = $_POST['uname'];
    		    $_SESSION['id'] = $id;
			echo "five";
    		    header('Location: enter_hours.php');
    	    }
	}*/
}
//echo $_POST['URLid'];
?>
