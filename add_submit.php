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
  if ($_POST['name'] == '' || $_POST['phone'] == '' || $_POST['email'] == '') {
    header('Location: accounts.php?error=1');
    exit;
  }
  $admin = 1;
  if (isset($_POST['caretaker'])) {
    $admin = 0;
  }
  //echo "Admin: ". $admin;
  $email = $_POST['email'];
  $name = $_POST['name'];
  $phone = $_POST['phone'];
  $sql = "INSERT INTO accounts (email, name, admin, phone)
  VALUES ('$email','$name',$admin,'$phone')";
  //echo $sql;
  $conn->query($sql);
  header('Location: accounts.php');
?>
