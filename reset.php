<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Time Tracker Login</title>
  <link rel="stylesheet" type="text/css" href="style3.css?v=1.6">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100..700;1,100..700&display=swap" rel="stylesheet">
</head>
<body>
<form action="" method="post">
      <p>"New Password:"
      <input type="text" id="pword" name="pword">
      </p>
      <p>"Re Enter Password:"
      <input type="text" id="repword" name="repword">
      </p>
      <input type="submit" value="Enter">
</form>
<?php
// Initialize URL to the variable
$url = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
     
// Use parse_url() function to parse the URL 
// and return an associative array which
// contains its various components
$url_components = parse_url($url);
 
// Use parse_str() function to parse the
// string passed via URL
parse_str($url_components['query'], $params);

 
?>
</body>
</html>
