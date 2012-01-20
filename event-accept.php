<?php
/* Fetch all events from table EVENTS */
    require_once("inc-conf.php");
    require("inc-dbcon.php");

    $sth = $dbh->query("SELECT * FROM events WHERE approvedBy=0");
    $sth->setFetchMode(PDO::FETCH_OBJ);
    $sth->execute();
?>

<!DOCTYPE html>
<html lang="nl">
    <?php require_once("inc/header.inc"); ?>

    <body>
        <div id="container">
            <div id="header" role="banner">Paginatitel</div>
            <?php require_once("inc/nav.inc"); ?>

            <section id="main" role="main">
                <header class="pageTitle"><h1>Events Accepteren</h1></header>

                <table>
                    <thead>
                        <tr>
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
                            while($row = $sth->fetch() ){
                                echo "<tr>\n";
                                echo "  <td>" . $row->title . "</td>\n";
                                echo "  <td>" . $row->location . "</td>\n";
                                echo "  <td>" . $row->createdBy . "</td>\n";
                                echo "  <td>" . $row->creationDate . "</td>\n";
                                echo "  <td> \n";
                                echo "      <a class=\"button\" href=\"formhandler.pdo?action=delete&id=".$row->id."\"> \n";
                                echo "          <img src=\"img/btn-delete.png\" title=\"Delete\" alt=\"Delete\" width=\"16\" height=\"16\">\n";
                                echo "      </a> \n";
                                echo "      <a class=\"button\" href=\"formhandler.pdo?action=edit&id=".$row->id."\"> \n";
                                echo "          <img src=\"img/btn-edit.png\" title=\"Edit\" alt=\"Edit\" width=\"16\" height=\"16\">\n";
                                echo "      </a> \n";
                                echo "  </td>\n";
                                echo "</tr>\n";
                            }
                        ?>
                    </tbody>
                </table>                
            </section>

            <?php require_once("inc/sidebar.inc"); ?>
            <?php require_once("inc/footer.inc"); ?>
        </div>
    </body>
</html>

