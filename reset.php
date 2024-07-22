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
      New Password:<br />
      <input type="password" id="pword" name="pword" placeholder="Password"><br /><br />
      Re Enter Password:<br />
      <input type="password" id="repword" name="repword" placeholder="Password"><br /><br />
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
echo "input type='hidden' name='URLid' value=$params['id'] class='URLid'";
//echo $params['id'];
 
?>
      <input type="submit" value="Enter">
</form>

</body>
</html>
