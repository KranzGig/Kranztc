<?php
//echo $_POST['firstdate'];
//echo "<br/>";
//echo $_POST['firstname'];
$curdate = strtotime($_POST['firstdate']);
$mins = 24 * 60 * 60;
for ($x = date("w", $curdate); $x >= 0; $x--) {
	$time = $curdate - $x * $mins;
	$timestamp = date("m/d",$time);
	//$sql = "SELECT Hours,Vacation FROM Hours WHERE Date=' $timestamp' AND EmpID=$id";
	echo $timestamp;
  echo "<br/>";
      }
      for ($x = 1; $x < 7-date("w",$curdate); $x++) {
	$time = $curdate + $x * $mins;
	$timestamp = date("m/d",$time);
//	$sql = "SELECT Hours,Vacation FROM Hours WHERE Date=' $timestamp' AND EmpID=$id";
	echo $timestamp;
	echo "<br/>";
	}
      
?>
