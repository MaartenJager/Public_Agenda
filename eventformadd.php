<?php

function isDatumValid()
{
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


$arrayCheckboxes = array_fill(0, 8, FALSE);


	if( isset($_POST['genre_pop']) )
	{
		$arrayCheckboxes[0] = TRUE;
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

if (isDatumValid())
{
    require("inc-dbcon.php");
	$sth=$dbh->prepare("INSERT INTO events (title, beginDate, endDate, description, approvedBy)
	VALUES
	('$_POST[eventName]', '$_POST[eventDate]', '$_POST[eventDate]', '$_POST[eventDescription]', NULL)");
        $sth->execute();

	for($i=0; $i<8; $i++)
	{
		if ($arrayCheckboxes[$i])
		{
			echo "EEN GENRE OPGESLAGEN <br/>";
			$sth=$dbh->prepare("SELECT id FROM events ORDER BY id DESC LIMIT 1");
			$sth->execute();
			$row = $sth->fetch();
			$event_id = $row['id'];
			$sth=$dbh->prepare("INSERT INTO genre_event_koppeling (`eventId`, `genreId`)
			VALUES ($event_id, $i)");
			$sth->execute();
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
