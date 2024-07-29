<?php
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
  $admin = 1;
  if (isset($_POST['caretaker'])) {
    $admin = 0;
  }
  //echo "Admin: ". $admin;
  $sql = "INSERT INTO accounts (email, admin)
  VALUES ('". $_POST['email'] . "'," . $admin . ")";
  //echo $sql;
  $conn->query($sql);
  header('Location: accounts.php');
?>
