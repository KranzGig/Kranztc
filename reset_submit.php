<?php
//echo "hi";
$servername = "127.0.0.1:3306";
$username = "u751975974_kranz";
$password = "Dradbgon12";
$dbname = "u751975974_TestDB";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
//echo ($_POST['pword'] == '');
$url = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
     
// Use parse_url() function to parse the URL 
// and return an associative array which
// contains its various components
$url_components = parse_url($url);
 
// Use parse_str() function to parse the
// string passed via URL
parse_str($url_components['query'], $params);
if ($_POST['pword'] == '' || $_POST['repword'] == '' ) {
	// Could not get the data that should have been sent.
	//echo "hi1";
        header('Location: $url&error=1');
} 
if ($_POST['pword'] != $_POST['repword']) {
	exit('Passwords do not match');
} 
if ($stmt = $conn->prepare('SELECT id FROM accounts WHERE code = ?')){
	//echo "hi";
        //echo md5($_POST['URLid']);
	$stmt->bind_param('s', md5($_POST['URLid']));
	$stmt->execute();
	$stmt->store_result();
	//echo "three";
	if ($stmt->num_rows > 0) {
		//echo "four";
		$stmt->bind_result($id);
    		$stmt->fetch();
		if ($stmt = $conn->prepare("UPDATE accounts SET password=? WHERE id=$id")) {
    	            $stmt->bind_param('s', password_hash($_POST['pword'],PASSWORD_DEFAULT));
	            $stmt->execute();
		     $stmt->execute();
	            session_regenerate_id();
    		    $_SESSION['loggedin'] = TRUE;
    		    $_SESSION['uname'] = $_POST['uname'];
    		    $_SESSION['id'] = $id;
		    //$_SESSION['name'] = $name;
		    if ($admin == 0) {
    		    	header('Location: enter_hours.php');
		    } else {
			header('Location: accounts.php');
		    }
	            
    	    }
	}
}
?>
