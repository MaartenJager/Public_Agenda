<?php
$con = mysql_connect("localhost","webdb1241","qetha8ra");
if (!$con)
    {
    die('Er is een fout opgetreden. Er kon geen verbinding met de server gemaakt worden.');
    }

mysql_select_db("webdb1241", $con);

$name = $_POST['name'];

$result = mysql_query("call test()");

while($row = mysql_fetch_array($result))
    {
    echo "   ";
    echo "ID/Voornaam/Achternaam: " . $row['id'] . "/" . $row['firstName'] . "/" . $row['name'];
    echo "   ";
    }
mysql_close($con);
?>
