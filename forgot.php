<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Time Tracker Login</title>
  <link rel="stylesheet" type="text/css" href="style.css"?v=1.2>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100..700;1,100..700&display=swap" rel="stylesheet">
</head>
<body onload="checkIncorrect()">
  <div class='button2'>
    <h2>Enter Email:</h2>
      <form action="email.php" method="post">
          <input type="text" id="email" name="email" placeholder="Email" id='email'><br><br>
          <p style="display:none;" id="incorrect">Incorrect email</p>
          <input type="submit" value="Enter" id='enter'>
      </form>
  </div>
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
