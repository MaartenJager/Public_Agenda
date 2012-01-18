<?php


$date = $_POST[eventDate];

function isDatumValide($date)
{
	$stamp = strtotime($date);
	if (!is_numeric($stamp))
	{
		return FALSE;
		echo "date format is not correct";
	}
	if (checkdate(date('d', $stamp), date('m', $stamp), date('Y', $stamp)))
	{
		return TRUE;
		echo "date correct";
	}
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

/*
if (!mysql_query($sql,$con))
{
	die('Error: ' . mysql_error());
}
*/
echo "werkt niet Igor!";
?> 
