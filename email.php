s<?php
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
	$stmt->bind_result($id);
	$stmt->fetch();
	$code = uniqid();
	if ($stmt = $conn->prepare("UPDATE accounts SET code=? WHERE id=$id")) {
		$stmt->bind_param('s', md5($code));
		$stmt->execute();
	}
	echo "kranztc.com/reset.php?id=".$code;
    } else {
      echo 'Incorrect email!';
    }
  }
?>
