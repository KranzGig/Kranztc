<?php
//echo $_POST['firstdate'];
//echo "<br/>";
//echo $_POST['firstname'];
$curdate = strtotime($_POST['firstdate']);
$mins = 24 * 60 * 60;
//$myfile = fopen("result.csv", "w");
//fwrite($myfile, "Date, Hours, Vacation, EmpID\n");
$timeone = $curdate - date("w",$curdate) * $mins;
$timetwo = $curdate + date("w",$curdate) * $mins;
echo $timeone;
echo "<br/>";
echo $timetwo;
      
?>
