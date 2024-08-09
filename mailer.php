<!DOCTYPE html>
<html>
<body>    
  <?php
    //const now = Date.now();
    //echo date("d");
    //echo 'Now' . now;
   
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
    $week = 7*24*60*60;
    $firstdate = date("m/d",time()-2*$week);
    $seconddate = date("m/d",time());
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
    $sql = "Select email,name FROM accounts WHERE admin=1";
    $result = $conn->query($sql);
    while($row = $result->fetch_assoc()) {
      $mail->addAddress($row['email'], $row['name']);
      $mail->Subject = "Martha - Caretaker Hours Logged for Week of ".$firstdate;
      $mail->Body = "Hi ".$row['name'].",\nAttached is Martha's caretaker time-tracking report for the week of ".$firstdate.".\nIf you have any questions or concerns, please contact Cathy Limbach.\nThanks and Best Regards,\nDocument Hours Time Tracking Team";      $mail->addAttachment('result.csv');
      if (!$mail->send()) {
        echo 'Mailer Error: ' . $mail->ErrorInfo;
      } else {
        echo '<head>';
        echo '<meta charset="utf-8">';
        echo '<title>Time Tracker Mailer</title>';
        echo '<link rel="preconnect" href="https://fonts.googleapis.com">';
        echo '<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>';
        echo '<link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100..700;1,100..700&display=swap" rel="stylesheet">';
        echo '<meta name="viewport" content="width=device-width, initial-scale=1">';
        echo '<link rel="stylesheet" type="text/css" href="style.css">';
        echo '<link rel="icon" href="http://documenthours.com/favicon.png">';
        echo '</head>';
        echo '<p>The email message was sent.</p>';
      }
    }
  ?>
</body>
</html>
