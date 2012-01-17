<?php
$con = mysql_connect("localhost","webdb1241","qetha8ra");
if (!$con)
{
die('Er is een fout opgetreden. Er kon geen verbinding met de server gemaakt worden.');
}

mysql_select_db("webdb1241", $con);
$sql="SELECT * FROM events WHERE approvedBy=0";
$result=mysql_query($query);
mysql_close();
$num=mysql_numrows($result);
$i=0;
while ($i < $num) {
$field1=mysql_result($result,$i,"title");
$field2=mysql_result($result,$i,"createdBy");
$field3=mysql_result($result,$i,"eventid");

echo "<tr>";
echo "<td>$field1</td>";
echo "<td>$field2</td>";
echo "<td>$field3</td>";
echo "</tr>";
$i++;
}
?>