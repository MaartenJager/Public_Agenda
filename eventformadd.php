<?php

function isDatumValid()
{
		echo "test3";
	$date = $_POST['eventDate'];
	list($dd, $mm, $yy) = explode('-', $date);
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



function vulCheckBoxes()
{
	if( isset($_POST['genre_pop']) )
	{
		$arrayCheckboxes[0] = TRUE;
		echo "test1";
	}
	if( isset($_POST['genre_rock']) )
	{
		$arrayCheckboxes[1] = TRUE;
	}
	if( isset($_POST['genre_metal']) )
	{
		$arrayCheckboxes[2] = TRUE;
	}
	if( isset($_POST['genre_hiphop']) )
	{
		$arrayCheckboxes[3] = TRUE;
	}
	if( isset($_POST['genre_blues']) )
	{
		$arrayCheckboxes[4] = TRUE;
	}
	if( isset($_POST['genre_classic']) )
	{
		$arrayCheckboxes[5] = TRUE;
	}
	if( isset($_POST['genre_church']) )
	{
		$arrayCheckboxes[6] = TRUE;
	}
	if( isset($_POST['genre_other']) )
	{
		$arrayCheckboxes[7] = TRUE;
	}
}

$arrayCheckboxes = array_fill(0, 8, FALSE);
		echo "test2";
vulCheckBoxes();
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
	

	
	for($i=0; $i<8; $i++)
	{
		echo $arrayCheckboxes[$i] . "test4<br/>";
		if ($arrayCheckboxes[$i])
		{
			echo "EEN GENRE OPGESLAGEN <br/>";
			$sql="SELECT LAST (id) FROM events";
			$result=mysql_query($sql);
			$sql="INSERT INTO genre_event_koppeling (eventId, genreId)
			VALUES
			('$result', '$i')";			
		}
	}
	
	if (!mysql_query($sql,$con))
	{
		die('Er is een fout opgetreden met de verbinding.');
	}	
	
	mysql_close($con);
}
else
{
	echo "het werkt niet<br/>";
}

?> 
