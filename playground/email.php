 <!DOCTYPE html>
<html>

<body>

<h1>Email PHP</h1>
 <?php
// the message
$msg = "First line of text\nSecond line of text";

// use wordwrap() if lines are longer than 70 characters
//$msg = wordwrap($msg,70);

// send email
mail("kranz.amber1@gmail.com","My subject",$msg);
?> 
</body>
</html>