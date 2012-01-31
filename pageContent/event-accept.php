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
    $eventsExistant = false;
    if ($sth->rowCount() > 0) {
        $eventsExistant = true;
    }
?>
<h1>Evenementen Accepteren</h1>
<?php
    if ($eventsExistant) {
echo <<<EOT
<form action="sqlaction.php" method="post">
    <table>
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
                $title = $row->title;
                $locationName = $row->locationName;
                $firstName = $row->firstName;
                $name = $row->name;
                $creationDate = date('d-m-Y G:i', $row->creationDate);
                $id = $row->id;
echo <<<EOT
            <tr>\n
                <td id="checkboxTable"><input name="deleteSelection$i" type="checkbox" S/></td>\n
                <td>$title</td>\n
              <td>$locationName</td>\n
                <td>$firstName $name</td>\n
                <td>$creationDate</td>\n
                <td> \n
                    <a class="button" href="sqlaction.php?id=$id&type=event&action=delete"name="deleteEvent"> \n
                        <img src="img/btn-delete.png" title="Verwijder" alt="Verwijder" width="16" height="16">\n
                    </a> \n
                    <a class="button" href="index.php?page=event-review&id=$id"> \n
                        <img src="img/btn-edit.png" title="Aanpassen" alt="Aanpassen" width="16" height="16">\n
                    </a> \n
                </td>\n
            </tr>\n
            <input name="event_id$i" value="$id" type="hidden">
EOT;
            }
        ?>
    <?php 
        if($eventsExistant){ 
            echo "    </tbody>";
            echo "</table>";
            echo "<input id=\"button\" name=\"deleteEvents\" type=\"submit\" value=\"Verwijder geselecteerden\" />";
            echo "</form>\n";
        }
        else
        {
            echo "Geen nieuwe events/n";
        }
    ?>