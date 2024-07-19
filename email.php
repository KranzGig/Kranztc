<?php
  $servername = "127.0.0.1:3306";
  $username = "u751975974_kranz";
  $password = "Dradbgon12";
  $dbname = "u751975974_TestDB";

  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);
  
  if ($stmt = $conn->prepare('SELECT id FROM accounts WHERE email = ?')) {
    $stmt->bind_param('s', $_POST['email']);
    $stmt->execute();
	  $stmt->store_result();
    if ($stmt->num_rows > 0) {

    } else {
      echo 'Incorrect email!';
    }
  }
?>
