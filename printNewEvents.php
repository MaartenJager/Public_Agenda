<?php
$con = mysql_connect("localhost","webdb1241","qetha8ra");
if (!$con)
{
die('Er is een fout opgetreden. Er kon geen verbinding met de server gemaakt worden.');
}

mysql_select_db("webdb1241", $con);
$sql="SELECT * FROM events WHERE approvedBy=0";
$result=mysql_query($sql);
mysql_close();
$num=mysql_numrows($result);
$i=0;
while ($i < $num) {
$field1=mysql_result($result,$i,"title");
$field2=mysql_result($result,$i,"createdBy");
$field3=mysql_result($result,$i,"id");

echo "<tr>";
echo "<th>$field1</th>";
echo "<th>$field2</th>";
echo "<th><a href=event-review.php?event_id=$field3>Edit</th>";
echo "</tr>";
$i++;
}
?>