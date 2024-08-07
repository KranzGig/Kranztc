<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Time Tracker Accounts</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100..700;1,100..700&display=swap" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="style.css?v3.0">
  <link rel="icon" href="http://documenthours.com/favicon.png">
</head>
<body>
  <ul>
    <li><a href="accounts.php">Accounts</a></li>
    <li><a href="history.php">History</a></li>
    <li id="current_tab"><a href="report.php">Manual Report</a></li>
    <li id="right"><a href="logout.php">Log Out</a></li>
  </ul>
  <h1>Manually Send Report</h1>
  <div class="line">
  </div><br>
  <div class="long">
    <table id='acc_mng'>
      <tr>
        <th>Week Of:</th>
        <td>
	  <input type="date" name="date" id="date" required>
        </td>
      </tr></select>
      <tr><th> </th>
        <td>
	  <input type="submit" value="Send" id='send'>
        </td>
      </tr>
      </form>
    </table>
  </div>
</body>
</html>
