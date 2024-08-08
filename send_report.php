<?php
//echo $_POST['firstdate'];
//echo "<br/>";
//echo $_POST['firstname'];
$curdate = strtotime($_POST['firstdate']);
$mins = 24 * 60 * 60;
//$myfile = fopen("result.csv", "w");
//fwrite($myfile, "Date, Hours, Vacation, EmpID\n");
$firstdate = date("m/d",$curdate - date("w",$curdate) * $mins);
$seconddate = date("m/d",$curdate + date("w",$curdate) * $mins);

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
    //$sql = "SELECT * FROM Hours INTO OUTFILE '/usr/bin/php /home/u751975974/public_html/result.csv' FIELDS TERMINATED BY ',' LINES TERMINATED BY '\n'";
    $sql = "SELECT Hours.Date, Hours.Hours, Hours.Vacation, accounts.name FROM Hours INNER JOIN accounts ON Hours.EmpID=accounts.id WHERE Date>=' $firstdate' AND Date<=' $seconddate' ORDER BY EmpID, Date";
    //echo $sql;
    $result = $conn->query($sql);
    $myfile = fopen("result.csv", "w");
    fwrite($myfile, "Date, Hours, Vacation, Name\n");
    while($row = $result->fetch_assoc()) {
      //echo $row['Date'];
      fwrite($myfile, $row["Date"] . ", ");
      fwrite($myfile, $row["Hours"] . ", ");
      fwrite($myfile, $row["Vacation"] . ", ");
      fwrite($myfile, $row["name"] . ", \n");
    }
    
    fclose($myfile);
   
    require 'vendor/autoload.php';
    use PHPMailer\PHPMailer\PHPMailer;
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
    $mail->Subject = 'Caretaker hours';
    $mail->Body = 'Caretaker hours';
    $mail->addAttachment('result.csv');
    if (!$mail->send()) {
      echo 'Mailer Error: ' . $mail->ErrorInfo;
    } else {?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Time Tracker Accounts</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100..700;1,100..700&display=swap" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="style.css?v3.0">
  <link rel="icon" href="http://documenthours.com/favicon.png">
</head>
<body onload="checkIncorrect()">
  <ul>
    <li><a href="accounts.php">Accounts</a></li>
    <li><a href="history.php">History</a></li>
    <li id="current_tab"><a href="report.php">Manual Report</a></li>
    <li id="right"><a href="logout.php">Log Out</a></li>
    <?php
	session_start();
	$name = $_SESSION['name'];
	echo "<li id='joe'>".$name."</li>";
    ?>
  </ul>
	<h1>The report has been sent</h1>
	<button><a href="report.php">Back</a></button>
</body>
</html>
   <?php }
      
?>
