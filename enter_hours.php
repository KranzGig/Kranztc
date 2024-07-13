<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Time Tracker Login</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100..700;1,100..700&display=swap" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="style.css?v=1.6">
</head>
<body>
  <img id="clock2" src="clock.png" alt="clock icon"
   srcset="clock.png 2400w"
   sizes="80vw";
  >
  <h1>Enter Hours</h1>
<div class="container">
  <table class="table table-borderless table-responsive">
    <form action="" method="POST">
	<thead>
      <tr>
        <th>Date:</th>
        <th>Hours:</th>
	<th>Paid Vacation:</th>
      </tr>
      <tr>
	<td><label id="Sun" name="Date"></label></td>
	<td>
	  
	    <select name="hours" id="numhours">
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
	    <input type="checkbox" id="pvacation" name="pvacation" value="Paid">
	</td>
      </tr>
      <tr>
	<td><label id="Mon"></label></td>
	<td>
	    <select name="hours" id="numhours">
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
	    <input type="checkbox" id="pvacation" name="pvacation" value="Paid">
	</td>
      </tr>
      <tr>
	<td><label id="Tue"></label></td>
	<td>
	    <select name="hours" id="numhours">
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
	    <input type="checkbox" id="pvacation" name="pvacation" value="Paid">
	</td>
      </tr>
      <tr>
	<td id="Wed"></td>
	<td>
	    <select name="hours" id="numhours">
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
	    <input type="checkbox" id="pvacation" name="pvacation" value="Paid">
	</td>
      </tr>
      <tr>
	<td id="Thu"></td>
	<td>
	    <select name="hours" id="numhours">
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
	    <input type="checkbox" id="pvacation" name="pvacation" value="Paid">
	</td>
      </tr>
      <tr>
	<td id="Fri"></td>
	<td>
	    <select name="hours" id="numhours">
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
	    <input type="checkbox" id="pvacation" name="pvacation" value="Paid">
	</td>
      </tr>
      <tr>
	<td id="Sat"></td>
	<td>
	    <select name="hours" id="numhours">
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
	    <input type="checkbox" id="pvacation" name="pvacation" value="Paid">
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
        document.getElementById(name[date.getDay()]).innerHTML = name[date.getDay()].concat(" ", date.getMonth() + 1, "/", date.getDate());
    }
    for (let i = 1; i < 7 - today; i++) {
        const date = new Date(now + DAY * i);
        //console.log(name[date.getDay()], date.getDate());
        document.getElementById(name[date.getDay()]).innerHTML = name[date.getDay()].concat(" ", date.getMonth() + 1, "/", date.getDate());
    }
</script>
	
<div class="button">
    <input type="submit" value="Save">
   
	</div>
  </form>
<?php
	header('Location: index.html');
	echo $_POST['Date'];
?>
</body>
</html>
