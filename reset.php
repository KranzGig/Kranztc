<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Time Tracker Login</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100..700;1,100..700&display=swap" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="style.css?v=2.3">
</head>
<body onload="checkIncorrect()">
<form action="reset_submit.php" method="post">
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
echo "<input type='hidden' name='URLid' value='".$params['id']."'/>";
//echo $params['id'];
 
?> 
<div class='reset'>
    New Password:<br />
      <input type="password" id="pword" name="pword" placeholder="Password"><br /><br />
      Reenter Password:<br />
      <input type="password" id="repword" name="repword" placeholder="Password"><br /><br />
      <p id='incorrect' style="display:none;">Please input matching passwords</p>
      <input type="submit" value="Enter">
</div>
</form>

<script type="text/javascript">
	function checkIncorrect() {
        const queryString = window.location.search;
        const urlParams = new URLSearchParams(queryString);
        if (urlParams.get("error") == "1") {
            document.getElementById("incorrect").style.removeProperty('display');
        }
    }
    
</script>
    
</body>
</html>
