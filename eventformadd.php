<?php
$date = $_POST['eventDate'];

function isDatumValid()
{
	list($dd, $mm $yy) = split('[-]', $date);
	if (is_numeric($dd) && is_numeric($mm) && is_numeric($yy))
	{
		if (checkdate($mm,$dd,$yy))
		{
			echo "Entry date is correct<br/>";
			return TRUE;
		}
		else
		{
			echo "date is numeric but not a valid date<br/>";
			return FALSE;
		}
	}
	else
	{
		echo "date is not numeric or in format dd-mm-yyyy<br/>";
		return FALSE;
	}
	return FALSE;
}

if (isDatumValid())
{
	$con = mysql_connect("localhost","webdb1241","qetha8ra");
	if (!$con)
	{
		die('Er is een fout opgetreden. Er kon geen verbinding met de server gemaakt worden.');
	}
	mysql_select_db("webdb1241", $con);	
	$sql="INSERT INTO events (title, beginDate, endDate, description)
	VALUES
	('$_POST[eventName]', '$_POST[eventDate]', '$_POST[eventDate]', '$_POST[eventDescription]')";
	
	if (!mysql_query($sql,$con))
	{
		die('Er is een fout opgetreden met de verbinding.');
	}	
	echo "het werkt<br/>";
	mysql_close($con);
}
else
{
	echo "het werkt niet<br/>";
}

?> 
