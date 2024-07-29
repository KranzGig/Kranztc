<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Time Tracker Login</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100..700;1,100..700&display=swap" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <ul>
    <li><a href="accounts.html">Accounts</a></li>
    <li id="current_tab"><a href="history.html">History</a></li>
    <li id="right"><a href="login.html">Log Out</a></li>
  </ul>
  <h1>Caretaker History</h1>
  <div class="line">
  </div>
  <div class="long">
    <table>
       <tr>
        <th>Caretaker:</th>
       <td>
	<form>
	  <select name="caretakers" id="caretakers">
	    <?php
		$servername = "127.0.0.1:3306";
		$username = "u751975974_kranz";
		$password = "Dradbgon12";
		$dbname = "u751975974_TestDB";
	
		// Create connection
		$conn = new mysqli($servername, $username, $password, $dbname);
		$sql = 'SELECT name, admin FROM accounts';
		$result = $conn->query($sql);
		 if ($result->num_rows > 0) {
    			while($row = $result->fetch_assoc()) {
				$name = $row['name'];
				if (!$row['admin']) {
					echo "<option value ='".$name."'>".$name."</option>";
				}
			}
		 }
	    ?>
	</form>
      </td>
      </tr>
      <tr>
        <th>Pick Date:</th>
       <td>
	<form>
	  <select name="date" id="date">
	    <option value="date1">date1</option>
            <option value="date2">date2</option>
	</form>
      </td>
      </tr>
    </table>
  </div>
  <div class="line">
  </div>
  <table id="history_table">
    <tr>
      <th>Date:</th>
      <th>Hours:</th>
      <th>Paid Vacation:</th>
    </tr>
    <tr>
      <td>date1</td>
      <td>hours</td>
      <td>paidvaca?y/n</td>
    </tr>
    <tr>
      <td>date2</td>
      <td>hours</td>
      <td>paidvaca?y/n</td>
    </tr>
    <tr>
      <td>date3</td>
      <td>hours</td>
      <td>paidvaca?y/n</td>
    </tr>
    <tr>
      <td>date4</td>
      <td>hours</td>
      <td>paidvaca?y/n</td>
    </tr>
    <tr>
      <td>date5</td>
      <td>hours</td>
      <td>paidvaca?y/n</td>
    </tr>
    <tr>
      <td>date6</td>
      <td>hours</td>
      <td>paidvaca?y/n</td>
    </tr>
    <tr>
      <td>date7</td>
      <td>hours</td>
      <td>paidvaca?y/n</td>
    </tr>
  </table>
  <div class="button1">
  <button class="square" id="history_edit">
    /
  </button>
  Edit
  <button class="square_current" id="history_show">
    *
  </button>
  Show All
  </div>
</body>
</html>