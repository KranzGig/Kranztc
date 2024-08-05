<?php
  require 'vendor/autoload.php';
   use PHPMailer\PHPMailer\PHPMailer;
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
        $email = $_POST['email'];
	$mail = new PHPMailer;
	  $mail->isSMTP();
	  //$mail->SMTPDebug = 2;
	  $mail->Host = 'smtp.hostinger.com';
	  $mail->Port = 587;
	  $mail->SMTPAuth = true;
	  $mail->Username = 'automail@kranztc.com';
	  $mail->Password = 'DragonSandd0gs-';
	  $mail->setFrom('automail@kranztc.com', 'Kranz Tech Consulting');
	  $mail->addReplyTo('automail@kranztc.com', 'Kranz Tech Consulting');
	  $mail->addAddress($email);
	  $mail->Subject = 'Reset Time Tracking Password';
	  $mail->Body = "Use the following link to reset your password: documenthours.com/reset.php?id=".$code;
	  if (!$mail->send()) {
	      echo 'Mailer Error: ' . $mail->ErrorInfo;
	  }
	  echo '<head>';
  	  echo '<meta charset="utf-8">';
  	  echo '<title>Time Tracker Email</title>';
  	  echo '<link rel="preconnect" href="https://fonts.googleapis.com">';
  	  echo '<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>';
  	  echo '<link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100..700;1,100..700&display=swap" rel="stylesheet">';
  	  echo '<meta name="viewport" content="width=device-width, initial-scale=1">';
 	  echo '<link rel="stylesheet" type="text/css" href="style.css">';
  	  echo '<link rel="icon" href="http://documenthours.com/favicon.png">';
	  echo '</head>';
	  echo '<p>Check your email for a link to reset your password</p>';
    } else {
	header('Location:forgot.php?error=1');
    }
  }
?>
