<?php
/* Fetch all events from table EVENTS */
    require_once("inc-conf.php");
    require("inc-dbcon.php");

    $sth = $dbh->query("SELECT  events.*,
                                users.name,
                                users.firstName,
                                locations.name AS locationName
                            FROM events
                            INNER JOIN users ON (
                                events.createdBy = users.id
                                )
                            INNER JOIN locations ON (
                                events.location = locations.id
                                )
                            WHERE approvedBy is NULL
                            ORDER BY events.creationDate ASC");
    $sth->setFetchMode(PDO::FETCH_OBJ);
    $sth->execute();
?>

<h1>Evenementen Accepteren</h1>

                <form action="sqlaction.php" method="post">
                    <table>
                        <?php
                            if ($sth->rowCount() > 0) {
echo <<<EOT
                        <thead>
                            <tr>
                                <th></th>
                                <th>Titel</th>
                                <th>Locatie</th>
                                <th>Door</th>
                                <th>Aanmaakdatum</th>
                                <th></th>
                            </tr>
                        </thead>

                        <tbody>
EOT;
                            }
                                // showing the results
                                $i=0;
                                while($row = $sth->fetch() ){
                                    $i++;
                                    echo "<tr>\n";
                                    echo "  <td id=\"checkboxTable\"><input name=\"deleteSelection" . $i . "\" type=\"checkbox\" S/></td>\n";
                                    echo "  <td>" . $row->title . "</td>\n";
                                    echo "  <td>" . $row->locationName . "</td>\n";
                                    echo "  <td>" . $row->firstName . " " . $row->name . "</td>\n";
                                    echo "  <td>" . date('d-m-Y G:i', $row->creationDate) . "</td>\n";
                                    echo "  <td> \n";
                                    echo "      <a class=\"button\" href=\"sqlaction.php?id=".$row->id."&type=event&action=delete\"name=\"deleteEvent\"> \n";
                                    echo "          <img src=\"img/btn-delete.png\" title=\"Verwijder\" alt=\"Verwijder\" width=\"16\" height=\"16\">\n";
                                    echo "      </a> \n";
                                    echo "      <a class=\"button\" href=\"index.php?page=event-review&id=".$row->id."\"> \n";
                                    echo "          <img src=\"img/btn-edit.png\" title=\"Aanpassen\" alt=\"Aanpassen\" width=\"16\" height=\"16\">\n";
                                    echo "      </a> \n";
                                    echo "  </td>\n";
                                    echo "</tr>\n";
                                    echo "<input name=\"event_id" . $i . "\" value=\"" . $row->id . "\" type=\"hidden\">";
                                }
                            ?>
                        </tbody>
                    </table>
                    <?php 
if($i!=0){ 
    echo "<input id=\"button\" name=\"deleteEvents\" type=\"submit\" value=\"Verwijder geselecteerden\" />"; 
}
else
{
    echo "Geen nieuwe events";
}
?>
                </form>