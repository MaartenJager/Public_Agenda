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

<!DOCTYPE html>
<html lang="nl">
    <?php require_once("inc/header.inc"); ?>

    <body>
        <div id="container">
            <div id="header" role="banner"></div>
            <?php require_once("inc/nav.inc"); ?>

            <section id="main" role="main">
                <header class="pageTitle"><h1>Evenementen Accepteren</h1></header>

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
                            <?php
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
                                    echo "          <img src=\"img/btn-delete.png\" title=\"Delete\" alt=\"Delete\" width=\"16\" height=\"16\">\n";
                                    echo "      </a> \n";
                                    echo "      <a class=\"button\" href=\"event-review.php?id=".$row->id."\"> \n";
                                    echo "          <img src=\"img/btn-edit.png\" title=\"Edit\" alt=\"Edit\" width=\"16\" height=\"16\">\n";
                                    echo "      </a> \n";
                                    echo "  </td>\n";
                                    echo "</tr>\n";
                                    echo "<input name=\"event_id" . $i . "\" value=\"" . $row->id . "\" type=\"hidden\">";
                                }
                            ?>
                        </tbody>
                    </table>
                    <input id="button" name="deleteEvents" type="submit" value="Delete Selection" />
                </form>
            </section>

            <?php require_once("inc/sidebar.inc"); ?>
            <?php require_once("inc/footer.inc"); ?>
        </div>
    </body>
</html>

