<?php
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
	die('Error: ' . mysql_error());
}
echo "TESTEN LUL";

mysql_close($con)
?> 
