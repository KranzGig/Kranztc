<?php
$servername = "127.0.0.1:3306";
$username = "u751975974_kranz";
$password = "Dradbgon12";
$dbname = "u751975974_TestDB";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
if ( !isset($_POST['pword'], $_POST['repword']) ) {
	// Could not get the data that should have been sent.
	echo "one";
	//header('Location:reset.php?error=1');
	//exit;
	
}
if ($_POST['pword'] != $_POST['repword']) {
	//header('Location:reset.php?error=1');
	//exit;
	echo "two";
}
if ($stmt = $conn->prepare('SELECT id FROM accounts WHERE code = ?')) {
	echo "three";
	$stmt->bind_param('s', md5($_POST['URLid']));
	$stmt->execute();
	$stmt->store_result();
	if ($stmt->num_rows > 0) {
		$stmt->bind_result($id);
    		$stmt->fetch();
		if ($stmt = $conn->prepare("UPDATE accounts SET password=? WHERE id=$id")) {
    	            $stmt->bind_param('s', password_hash($_POST['pword'],PASSWORD_DEFAULT));
	            $stmt->execute();
	            session_regenerate_id();
    		    $_SESSION['loggedin'] = TRUE;
    		    $_SESSION['uname'] = $_POST['uname'];
    		    $_SESSION['id'] = $id;
    		    //header('Location: enter_hours.php');
    	    }
	}
}
//echo $_POST['URLid'];
?>
