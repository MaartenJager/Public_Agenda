<?php

function isDatumValid()
{
	$date = $_POST['eventBeginDate'];
	list($dd, $mm, $yyyy) = explode('-', $date);
	if (is_numeric($dd) && is_numeric($mm) && is_numeric($yyyy))
	{
		if (checkdate($mm,$dd,$yyyy))
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
{	$date = $_POST['eventBeginDate'];
	list($dd, $mm, $yyyy) = explode('-', $date);
	$beginDateTimeStamp = mktime($_POST[eventBeginTimeHours], $_POST[eventBeginTimeMinutes], 0, $mm, $dd, $yyyy, -1);
	require("inc-dbcon.php");
	$sth=$dbh->prepare("INSERT INTO events (title, beginDate, endDate, description, creationDate, approvedBy)
	VALUES
	('$_POST[eventName]', '$beginDateTimeStamp', '$_POST[eventDate]', '$_POST[eventDescription]', " . time() . ", NULL)");
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
			$genreId = $i + 1;
			$sth=$dbh->prepare("INSERT INTO genre_event_koppeling (`eventId`, `genreId`)
			VALUES ($event_id, $genreId)");
			$sth->execute();
		}
	}
}
else
{
	echo "incorrecte datum<br/>";
}

?> 
