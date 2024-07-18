<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Time Tracker Hours</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100..700;1,100..700&display=swap" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="style.css?v=1.6">
</head>
<body>
 <?php
	session_start();
	// If the user is not logged in redirect to the login page...
	if (!isset($_SESSION['loggedin'])) {
		header('Location: index.html');
		exit;
	}
?>
  <img id="clock2" src="clock.png" alt="clock icon"
   srcset="clock.png 2400w"
   sizes="80vw";
  >
  <h1>Enter Hours</h1>
<div class="container">
  <table class="table table-borderless table-responsive">
    <form action="submission.php" method="POST">
	<thead>
      <tr>
        <th>Date:</th>
        <th>Hours:</th>
	<th>Paid Vacation:</th>
      </tr>
	<?php
		$servername = "127.0.0.1:3306";
		$username = "u751975974_kranz";
		$password = "Dradbgon12";
		$dbname = "u751975974_TestDB";

		$conn = new mysqli($servername, $username, $password, $dbname);

		$name = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];
		$mins = 24 * 60 * 60;
		$time = time() - 4 * $mins;
		$day = $name[date("w",$time)];
		$date = $day." ".date("m/d",$time);
		for ($x = date("w",$time); $x >= 0; $x--) {
			$time = time() - $x * $mins;
			$day = $name[date("w",$time)];
			$date = $day." ".date("m/d",$time);
			echo $date;
		}
		echo "<tr><td class='$day'></td>";
		echo "<input type='hidden' name='$day.date' value='$date' class='$day'/>";
		echo "<td><select name='$day.hours' id='numhours'>";
		echo "<option value='0'></option>";
		for ($i=1;$i<=24;$i++) {
			echo "<option value='$i'>$i</option>";
		}
		echo "</td><td><input type='checkbox' id='pvacation' name='$day.pvacation' value='Paid'></td></tr>";
		
	?>
      
      <tr>
	<td class="Mon"></td>
	<input type="hidden" name="Mondate" value="" class="Mon"/>
	<td>
	    <select name="Monhours" id="numhours">
	      <option value="0"> </option>
	      <option value="1">1</option>
	      <option value="2">2</option>
	      <option value="3">3</option>
	      <option value="4">4</option>
              <option value="5">5</option>
	      <option value="6">6</option>
	      <option value="7">7</option>
	      <option value="8">8</option>
  	      <option value="9">9</option>
	      <option value="10">10</option>
	      <option value="11">11</option>
	      <option value="12">12</option>
              <option value="13">13</option>
	      <option value="14">14</option>
	      <option value="15">15</option>
	      <option value="16">16</option>
	      <option value="17">17</option>
	      <option value="18">18</option>
	      <option value="19">19</option>
	      <option value="20">20</option>
              <option value="21">21</option>
	      <option value="22">22</option>
	      <option value="23">23</option>
	      <option value="24">24</option>
	</td>
	<td>
	    <input type="checkbox" id="pvacation" name="Monpvacation" value="Paid">
	</td>
      </tr>
      <tr>
	<td class="Tue"></td>
	<input type="hidden" name="Tuedate" value="" class="Tue"/>
	<td>
	    <select name="Tuehours" id="numhours">
	      <option value="0"> </option>
	      <option value="1">1</option>
	      <option value="2">2</option>
	      <option value="3">3</option>
	      <option value="4">4</option>
              <option value="5">5</option>
	      <option value="6">6</option>
	      <option value="7">7</option>
	      <option value="8">8</option>
  	      <option value="9">9</option>
	      <option value="10">10</option>
	      <option value="11">11</option>
	      <option value="12">12</option>
              <option value="13">13</option>
	      <option value="14">14</option>
	      <option value="15">15</option>
	      <option value="16">16</option>
	      <option value="17">17</option>
	      <option value="18">18</option>
	      <option value="19">19</option>
	      <option value="20">20</option>
              <option value="21">21</option>
	      <option value="22">22</option>
	      <option value="23">23</option>
	      <option value="24">24</option>
	</td>
	<td>
	    <input type="checkbox" id="pvacation" name="Tuepvacation" value="Paid">
	</td>
      </tr>
      <tr>
	<td class="Wed"></td>
	<input type="hidden" name="Weddate" value="" class="Wed"/>
	<td>
	    <select name="Wedhours" id="numhours">
	      <option value="0"> </option>
	      <option value="1">1</option>
	      <option value="2">2</option>
	      <option value="3">3</option>
	      <option value="4">4</option>
              <option value="5">5</option>
	      <option value="6">6</option>
	      <option value="7">7</option>
	      <option value="8">8</option>
  	      <option value="9">9</option>
	      <option value="10">10</option>
	      <option value="11">11</option>
	      <option value="12">12</option>
              <option value="13">13</option>
	      <option value="14">14</option>
	      <option value="15">15</option>
	      <option value="16">16</option>
	      <option value="17">17</option>
	      <option value="18">18</option>
	      <option value="19">19</option>
	      <option value="20">20</option>
              <option value="21">21</option>
	      <option value="22">22</option>
	      <option value="23">23</option>
	      <option value="24">24</option>
	</td>
	<td>
	    <input type="checkbox" id="pvacation" name="Wedpvacation" value="Paid">
	</td>
      </tr>
      <tr>
	<td class="Thu"></td>
	<input type="hidden" name="Thudate" value="" class="Thu"/>
	<td>
	    <select name="Thuhours" id="numhours">
	      <option value="0"> </option>
	      <option value="1">1</option>
	      <option value="2">2</option>
	      <option value="3">3</option>
	      <option value="4">4</option>
              <option value="5">5</option>
	      <option value="6">6</option>
	      <option value="7">7</option>
	      <option value="8">8</option>
  	      <option value="9">9</option>
	      <option value="10">10</option>
	      <option value="11">11</option>
	      <option value="12">12</option>
              <option value="13">13</option>
	      <option value="14">14</option>
	      <option value="15">15</option>
	      <option value="16">16</option>
	      <option value="17">17</option>
	      <option value="18">18</option>
	      <option value="19">19</option>
	      <option value="20">20</option>
              <option value="21">21</option>
	      <option value="22">22</option>
	      <option value="23">23</option>
	      <option value="24">24</option>
	</td>
	<td>
	    <input type="checkbox" id="pvacation" name="Thupvacation" value="Paid">
	</td>
      </tr>
      <tr>
	<td class="Fri"></td>
	<input type="hidden" name="Fridate" value="" class="Fri"/>
	<td>
	    <select name="Frihours" id="numhours">
	      <option value="0"> </option>
	      <option value="1">1</option>
	      <option value="2">2</option>
	      <option value="3">3</option>
	      <option value="4">4</option>
              <option value="5">5</option>
	      <option value="6">6</option>
	      <option value="7">7</option>
	      <option value="8">8</option>
  	      <option value="9">9</option>
	      <option value="10">10</option>
	      <option value="11">11</option>
	      <option value="12">12</option>
              <option value="13">13</option>
	      <option value="14">14</option>
	      <option value="15">15</option>
	      <option value="16">16</option>
	      <option value="17">17</option>
	      <option value="18">18</option>
	      <option value="19">19</option>
	      <option value="20">20</option>
              <option value="21">21</option>
	      <option value="22">22</option>
	      <option value="23">23</option>
	      <option value="24">24</option>
	</td>
	<td>
	    <input type="checkbox" id="pvacation" name="Fripvacation" value="Paid">
	</td>
      </tr>
      <tr>
	<td class="Sat"></td>
	<input type="hidden" name="Satdate" value="" class="Sat"/>
	<td>
	    <select name="Sathours" id="numhours">
	      <option value="0"> </option>
	      <option value="1">1</option>
	      <option value="2">2</option>
	      <option value="3">3</option>
	      <option value="4">4</option>
              <option value="5">5</option>
	      <option value="6">6</option>
	      <option value="7">7</option>
	      <option value="8">8</option>
  	      <option value="9">9</option>
	      <option value="10">10</option>
	      <option value="11">11</option>
	      <option value="12">12</option>
              <option value="13">13</option>
	      <option value="14">14</option>
	      <option value="15">15</option>
	      <option value="16">16</option>
	      <option value="17">17</option>
	      <option value="18">18</option>
	      <option value="19">19</option>
	      <option value="20">20</option>
              <option value="21">21</option>
	      <option value="22">22</option>
	      <option value="23">23</option>
	      <option value="24">24</option>
	</td>
	<td>
	    <input type="checkbox" id="pvacation" name="Satpvacation" value="Paid">
	</td>
      </tr>
    </thead>
  </table>
</div>
<script>
    const name = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat']
    const now = Date.now();
    const DAY = 60 * 60 * 24 * 1000;
    const today = new Date(now).getDay();

    for (let i = today; i >= 0; i--) {
        const date = new Date(now - DAY * i);
        //console.log("*",name[date.getDay()], date.getDate());
	const days = document.getElementsByClassName(name[date.getDay()]);
	for (let j = 0; j < days.length; j++) {
  		days[j].value = name[date.getDay()].concat(" ", date.getMonth() + 1, "/", date.getDate());
		days[j].innerHTML = name[date.getDay()].concat(" ", date.getMonth() + 1, "/", date.getDate());
	}
    }
    for (let i = 1; i < 7 - today; i++) {
        const date = new Date(now + DAY * i);
        //console.log("*",name[date.getDay()], date.getDate());
	const days = document.getElementsByClassName(name[date.getDay()]);
	for (let j = 0; j < days.length; j++) {
  		days[j].value = name[date.getDay()].concat(" ", date.getMonth() + 1, "/", date.getDate());
		days[j].innerHTML = name[date.getDay()].concat(" ", date.getMonth() + 1, "/", date.getDate());
	}
    }
</script>
	
<div class="button">
    <input type="submit" value="Save">
    <input type="submit" value="Log Out" onclick="index.html">
	</div>
  </form>
</body>
</html>
