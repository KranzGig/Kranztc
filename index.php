<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Time Tracker Login</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100..700;1,100..700&display=swap" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="style.css?v=4.2">
  <link rel="icon" href="http://documenthours.com/favicon.png">
</head>
<body onload="checkIncorrect()">
  <h1>Time Tracker</h1>
  <img src="clock.png" alt="clock icon">
  <form action="" method="post">
    <div class="form">
      Username:<br />
      <input type="text" id="uname" name="uname" placeholder="Email"><br /><br>
      <div id="pass">
        Password:<br />
        <input type="password" id="pword" name="pword" placeholder="Password"><br /><br />
      </div>
    </div>
    <p style="display:none;" id="incorrect">Incorrect email and/or password</p>
    <p style="display:none;" id="empty">Please enter a password</p>
    <p id="small"><a href="forgot.php">Forgot Password?</a></p>
    <div class="button2">
      <button id='enter'>
        Enter
      </button>
    </div>
  </form>

  <script type="text/javascript">
    function checkIncorrect() {
      const queryString = window.location.search;
      const urlParams = new URLSearchParams(queryString);
      if (urlParams.get("error") == "1") {
        document.getElementById("incorrect").style.removeProperty('display');
      }
      if (urlParams.get("error") == "2") {
        document.getElementById("empty").style.removeProperty('display');
      }
    }  
  </script>
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
    //echo "one";
    // Could not get the data that should have been sent.
    header('Location: index.php?error=1');
    exit;
  }
  if ($_POST['pword'] == '') {
    header('Location: index.php?error=2');
    exit;
  }
  if ($stmt = $conn->prepare('SELECT id, password, admin, name FROM accounts WHERE email = ?')) {
    // Bind parameters (s = string, i = int, b = blob, etc), in our case the username is a string so we use "s"
    $uname = strtolower($_POST['uname']);
    $stmt->bind_param('s', $uname);
    $stmt->execute();
    // Store the result so we can check if the account exists in the database.
    $stmt->store_result();
	
    if ($stmt->num_rows > 0) {
      $stmt->bind_result($id, $password, $admin, $name);
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
	  $_SESSION['name'] = $name;
	  //echo "two";
	  if ($admin == 0) {
    	    header('Location: enter_hours.php');
	    exit;
	  } else {
	    header('Location: accounts.php');
	    exit;
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
	$_SESSION['name'] = $name;
    	//echo "three";
	if ($admin == 0) {
    	  header('Location: enter_hours.php');
	  exit;
	} else {
	  header('Location: accounts.php');
	  exit;
	}
      } else {
    	//echo "four";
	// Incorrect password
    	header('Location: index.php?error=1');
	exit;
      }
    } else {
      //echo "five";
      // Incorrect username
      header('Location: index.php?error=1');
      exit;
    }
  }
?>
</body>
</html>
