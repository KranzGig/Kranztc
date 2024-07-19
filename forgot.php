<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Time Tracker Login</title>
  <link rel="stylesheet" type="text/css" href="style.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100..700;1,100..700&display=swap" rel="stylesheet">
</head>
<body>
  <p>
      <form action="" method="post">
          <input type="text" id="email" name="email" placeholder="email">
          <input type="submit" value="Enter">
      </form>
  </p>
</body>
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
</html>
