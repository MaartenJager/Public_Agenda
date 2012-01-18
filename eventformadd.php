<?php
$date = "INITIALIZE";

function isDatumValide()
{
	$arr=split("-", $_POST[eventDate]); // splitting the array
	
	$dd=$arr[0]; // first element is day
	$mm=$arr[1]; // second element of the array is month
	$yy=$arr[2]; // third element is year
	if (checkdate($mm,$dd,$yy) && is_numeric($dd) && is_numeric($mm) && is_numeric($yy))
	{
		echo "Entry date is correct";
		$date = $_POST[eventDate]	
	}
	else
	{
		echo "invalid date";
	}
}

if (isDatumVailde)
{
	$con = mysql_connect("localhost","webdb1241","qetha8ra");
	if (!$con)
	{
		die('Er is een fout opgetreden. Er kon geen verbinding met de server gemaakt worden.');
	}
	mysql_select_db("webdb1241", $con);	
	
	$sql="INSERT INTO events (title, beginDate, endDate, description)
	VALUES
	('$_POST[eventName]', '$date', '$date', '$_POST[eventDescription]')";
	
	echo "TESTEN LUL";
	
	mysql_close($con);
}
else
{
	echo "datumfoutttt";
}
/*
if (!mysql_query($sql,$con))
{
	die('Error: ' . mysql_error());
}
*/

?> 
