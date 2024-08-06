<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Time Tracker Login</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100..700;1,100..700&display=swap" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="style.css?v=4.2">
  <link rel="icon" href="http://documenthours.com/favicon.png">
</head>
<body onload="checkIncorrect()">
  <h1>Time Tracker</h1>
  <img src="clock.png" alt="clock icon">
  <form action="authenticate.php" method="post">
    <div class="form">
      Username:<br />
      <?php
        if (isset($_SESSION['unameset'])) {
          echo "<input type='text' id='uname' name='uname' placeholder='Email'><br /><br>";
        } else {?>
      <input type="text" id="uname" name="uname" placeholder="Email"><br /><br>
                <?php } ?>
      <div id="pass">
        Password:<br />
        <input type="password" id="pword" name="pword" placeholder="Password"><br /><br />
      </div>
    </div>
    <p style="display:none;" id="incorrect">Incorrect email and/or password</p>
    <p style="display:none;" id="empty">Please enter a password</p>
    <p id="small"><a href="forgot.php">Forgot Password?</a></p>
    <div class="button2">
      <button id='enter'>
        Enter
      </button>
    </div>
  </form>

  <script type="text/javascript">
    function checkIncorrect() {
      const queryString = window.location.search;
      const urlParams = new URLSearchParams(queryString);
      if (urlParams.get("error") == "1") {
        document.getElementById("incorrect").style.removeProperty('display');
      }
      if (urlParams.get("error") == "2") {
        document.getElementById("empty").style.removeProperty('display');
      }
    }  
  </script>
  
</body>
</html>
