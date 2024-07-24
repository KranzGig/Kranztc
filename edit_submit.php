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
  $sql = 'SELECT email FROM accounts';
	$result = $conn->query($sql);
	 if ($result->num_rows > 0) {
    		while($row = $result->fetch_assoc()) {
          $email_orig = $row['email'];
	echo "email-".$email_orig;
	//echo $_POST['email-'.$email_orig];
	echo $_POST;
          $email = $_POST["email-".$email_orig];
          $admin = 1;
          if (isset($_POST["admin-".$email])) {
			      $admin = 0;
		      }
          $sql = "UPDATE accounts SET email=$email, admin=$admin WHERE email=$email_orig";
          //echo $sql;
        }
   }
?>
