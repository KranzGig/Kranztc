<?php
//echo $_POST['firstdate'];
//echo "<br/>";
//echo $_POST['firstname'];
echo "hi";
$curdate = strtotime($_POST['firstdate']);
$mins = 24 * 60 * 60;
/*$myfile = fopen("result.csv", "w");
echo "hi";
fwrite($myfile, "Date, Hours, Vacation, EmpID\n");
for ($x = date("w", $curdate); $x >= 0; $x--) {
	$time = $curdate - $x * $mins;
	$timestamp = date("m/d",$time);
	$sql = "SELECT Hours.Date, Hours.Hours, Hours.Vacation, accounts.name FROM Hours INNER JOIN accounts ON Hours.EmpID=accounts.id WHERE Date=' $timestamp' ORDER BY EmpID, Date";
	echo $sql;
	$result = $conn->query($sql);
	 while($row = $result->fetch_assoc()) {
      //echo $row['Date'];
      fwrite($myfile, $row["Date"] . ", ");
		 echo "Date: $row['Date'] <br/>";
      fwrite($myfile, $row["Hours"] . ", ");
		 echo "Hours: $row['Hours'] <br/>";
      fwrite($myfile, $row["Vacation"] . ", ");
		 echo "Vacation: $row['Vacation'] <br/>";
      fwrite($myfile, $row["name"] . ", \n");
		 echo "Name: $row['Name'] <br/>";
    }
      }
      for ($x = 1; $x < 7-date("w",$curdate); $x++) {
	$time = $curdate + $x * $mins;
	$timestamp = date("m/d",$time);
	$sql = "SELECT Hours.Date, Hours.Hours, Hours.Vacation, accounts.name FROM Hours INNER JOIN accounts ON Hours.EmpID=accounts.id WHERE Date=' $timestamp' ORDER BY EmpID, Date";    	
	$result = $conn->query($sql);
	 while($row = $result->fetch_assoc()) {
      //echo $row['Date'];
      fwrite($myfile, $row["Date"] . ", ");
      fwrite($myfile, $row["Hours"] . ", ");
      fwrite($myfile, $row["Vacation"] . ", ");
      fwrite($myfile, $row["name"] . ", \n");
    }
	}

    fclose($myfile);*/
      
?>
