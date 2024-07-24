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
if ( !isset($_POST['uname'], $_POST['pword']) ) {
	// Could not get the data that should have been sent.
	exit('Please fill both the username and password fields!');
}
if ($stmt = $conn->prepare('SELECT id, password, admin FROM accounts WHERE email = ?')) {
	// Bind parameters (s = string, i = int, b = blob, etc), in our case the username is a string so we use "s"
	$stmt->bind_param('s', $_POST['uname']);
	$stmt->execute();
	// Store the result so we can check if the account exists in the database.
	$stmt->store_result();
	
    if ($stmt->num_rows > 0) {
    	$stmt->bind_result($id, $password, $admin);
    	$stmt->fetch();
    	// Account exists, now we verify the password.
    	// Note: remember to use password_hash in your registration file to store the hashed passwords.
    	if ($password == '') {
    	    if ($stmt = $conn->prepare("UPDATE accounts SET password=? WHERE id=$id")) {
    	        $stmt->bind_param('s', password_hash($_POST['pword'],PASSWORD_DEFAULT));
	            $stmt->execute();
	            session_regenerate_id();
    		    $_SESSION['loggedin'] = TRUE;
    		    $_SESSION['uname'] = $_POST['uname'];
    		    $_SESSION['id'] = $id;
		    if ($admin == 0) {
    		    	header('Location: enter_hours.php');
		    } else {
			header('Location: accounts.html');
		    }
    	    }
    	    
    	}
    	if (password_verify($_POST['pword'], $password)) {
    	//if($_POST['password'] === $password) {
    		// Verification success! User has logged-in!
    		// Create sessions, so we know the user is logged in, they basically act like cookies but remember the data on the server.
    		session_regenerate_id();
    		$_SESSION['loggedin'] = TRUE;
    		$_SESSION['uname'] = $_POST['uname'];
    		$_SESSION['id'] = $id;
    		if ($admin == 0) {
    		    	header('Location: enter_hours.php');
		    } else {
			header('Location: accounts.html');
		    }
    	} else {
    		// Incorrect password
    		echo 'Incorrect email and/or password!';
    	}
    } else {
	// Incorrect username
	echo 'Incorrect email and/or password!';
    }
}
?>
