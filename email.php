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
	   $mail->addAddress('kranz.amber1@gmail.com', 'Amber Kranz');
	   $mail->Subject = 'Reset Time Tracking Password';
	   $mail->Body = "kranztc.com/reset.php?id=".$code;
	   if (!$mail->send()) {
	       echo 'Mailer Error: ' . $mail->ErrorInfo;
	   }
	    echo "Check your email for a link to reset your password";
    } else {
	echo "Enter a valid email";
    }
  }
?>
