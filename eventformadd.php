<?php

function isDatumValid()
{
	$date = $_POST['eventBeginDate'];
	list($dd, $mm, $yyyy) = explode('-', $date);
	if (is_numeric($dd) && is_numeric($mm) && is_numeric($yyyy))
	{
		if (checkdate($mm,$dd,$yyyy))
		{
			$date = $_POST['eventEndDate'];
			list($dd, $mm, $yyyy) = explode('-', $date);
			if (is_numeric($dd) && is_numeric($mm) && is_numeric($yyyy))
			{
				if (checkdate($mm,$dd,$yyyy))
				{
					echo "Entry dates are correct<br/>";
					return TRUE;
				}
				else
				{
					echo "End date is numeric but not a valid date<br/>";
				}
			}
			else
			{
				echo "Begin date is not numeric or in format dd-mm-yyyy<br/>";
			}
		}
		else
		{
			echo "Begin date is numeric but not a valid date<br/>";
		}
	}
	else
	{
		echo "Begin date is not numeric or in format dd-mm-yyyy<br/>";
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
	//Image upload
	$targetPath = "img/";
	$imgFileName = mt_rand();
	  

	if ((($_FILES["file"]["type"] == "image/gif")
	|| ($_FILES["file"]["type"] == "image/jpeg")
	|| ($_FILES["file"]["type"] == "image/pjpeg")) // oude IE browsers zijn raar
	&& ($_FILES["file"]["size"] < 20000))
	{
		if ($_FILES["file"]["error"] > 0)
		{
			echo "Error: " . $_FILES["file"]["error"] . "<br />";
		}
		else
		{
			echo "Upload: " . $_FILES["file"]["name"] . "<br />";
			echo "Type: " . $_FILES["file"]["type"] . "<br />";
			echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
			echo "Will be temp stored in: " . $_FILES["file"]["tmp_name"];
			
			$extension= end(explode(".", $_FILES['name'])); 
			echo "<br/><br/>test $ variable extension!!!!<br/>";
			$targetPath = $targetPath . $imgFileName . $extension;
			$urlImage = "http://websec.science.uva.nl/webdb1241/img/". $imgFileName . $extension;
			
			if(move_uploaded_file($_FILES['file']['tmp_name'], $targetPath))
			{
				echo "The file".  basename( $_FILES['file']['name']). 
				" has been uploaded and moved to /img with name: ".$imgFileName 
				.$extension " and full path: ". $targetPath . "and URL" . $urlImage;
			}
			else
			{
				echo "There was an error uploading the file, please try again!";
			}			
		}
	}
	else
	{
		echo "Invalid file";
	}

	//dates


	
	$date = $_POST['eventBeginDate'];
	list($dd, $mm, $yyyy) = explode('-', $date);
	$beginDateTimeStamp = mktime($_POST['eventBeginTimeHours'], $_POST['eventBeginTimeMinutes'], 0, $mm, $dd, $yyyy, -1);
	$date = $_POST['eventEndDate'];
	list($dd, $mm, $yyyy) = explode('-', $date);
	$endDateTimeStamp = mktime($_POST['eventEndTimeHours'], $_POST['eventEndTimeMinutes'], 0, $mm, $dd, $yyyy, -1);
	require("inc-dbcon.php");
	$sth=$dbh->prepare("INSERT INTO events (title, beginDate, endDate, description, creationDate, approvedBy)
	VALUES
	('$_POST[eventName]', '$beginDateTimeStamp', '$endDateTimeStamp', '$_POST[eventDescription]', " . time() . ", NULL)");
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
			
			
			//image URL
			$sth=$dbh->prepare("INSERT INTO events ('image')
			VALUES ($urlImage)");
			$sth->execute();
			
		}
	}
}
else
{
	echo "incorrecte datum<br/>";
}

?> 
