<!DOCTYPE html>
<html>
<body>    
  <?php
   
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
    $sql = "Select email,name FROM accounts WHERE admin=0";
    echo "zero";
    $result = $conn->query($sql);
    echo "one";
    while($row = $result->fetch_assoc()) {
      echo $row['email'];
      $mail->addAddress($row['email'], $row['name']);
      $mail->Subject = "REMINDER:  Log Care-taking Hours";
      $mail->Body = "Hi ".$row['name'].",\This is a quick reminder to log all of your care-taking hours for this week before the end of the day on Saturday.\n 
                    To log your hours, go to:  DocumentHours.com\n
                    You will be able to enter and change your hours for this week up through today.  Hours for future days this week can be entered on or after those days.\n
                    If you have any questions or problems, please contact Cathy Limbach.\n
                    Thanks and Best Regards,\n
                    - Document Hours Time Tracking Team"; 
      echo "two";
      if (!$mail->send()) {
        echo 'Mailer Error: ' . $mail->ErrorInfo;
      } else {
        echo "Email sent";
          }
    }
  ?>
</body>
</html>
