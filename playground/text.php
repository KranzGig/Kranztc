<!DOCTYPE html>
<html>
<body>
    

<?php 

$courier = new Courier\Courier;

$courier->setRecipient('9705678863')->setBody('Hello World')->send();

/*$username = urlencode("Kranz Consulting");
 $password = urlencode("DragonSandd0gs-");
 $api_id = urlencode("493ca631ab174176a89e66f34c941c95");
 $to = urlencode("19705678863");
 $message = urlencode("Test Message");
 
 echo file_get_contents("https://api.clickatell.com/http/sendmsg"
 . "?user=$username&password=$password&api_id=$api_id&to=$to&text=$message"); */
 
 ?>
</body>
</html>