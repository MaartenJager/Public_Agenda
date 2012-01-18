<?php

$date = $_POST[eventDate];

function isDatumValide($date)
{

	if (date('d-m-Y', strtotime($date))
	{
		echo "date correct";
		return TRUE;
	}
	$stamp = strtotime($date);
	if (!is_numeric($stamp))
	{
		echo "date format is not correct = not numeric";
		return FALSE;
	}
	echo "geen kalender datum wel correcte format";
	return FALSE;
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
