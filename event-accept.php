<!DOCTYPE html>
<html lang="nl">
    <?php require_once("inc/header.inc"); ?>

    <body>
        <div id="container">
            <div id="header" role="banner">Paginatitel</div>
            <?php require_once("inc/nav.inc"); ?>

            <section id="main" role="main">
                <header class="pageTitle"><h1>Events Accepteren</h1></header>
                <table border="1">
                <tr>
                    <th>Event title</th>
                    <th>Created by</th>
                    <th>Review</th>
                </tr>
                <?php
                $con = mysql_connect("localhost","webdb1241","qetha8ra");
                if (!$con)
                    {
                    die('Er is een fout opgetreden. Er kon geen verbinding met de server gemaakt worden.');
                    }

                mysql_select_db("webdb1241", $con);
                $sql="SELECT * FROM tablename WHERE acceptedBy=0";
                $result=mysql_query($query);
                mysql_close();
                $num=mysql_numrows($result);
                $i=0;
                while ($i < $num) {
                    $field1=mysql_result($result,$i,"title");
                    $field2=mysql_result($result,$i,"createdBy");
                    $field3=mysql_result($result,$i,"eventid");

                    echo "<tr>";
                    echo "<td>$field1</td>"
                    echo "<td>$field2</td>"
                    echo "<td>$field3</td>"
                    echo "</tr>";
                    $i++
                }
                ?>
                <tr>
                    <td>Grand opening The Roadhouse</td>
                    <td>Maarten Jager</td>
                    <td><a href="event-review.php">Review</a></td>
                </tr>
                <tr>
                    <td>2nd party n stuffs</td>
                    <td>Maarten Jager</td>
                    <td><a href="event-review.php">Review</a></td>
                </tr>
                </table> 
            </section>

            <?php require_once("inc/sidebar.inc"); ?>
            <?php require_once("inc/footer.inc"); ?>
        </div>
    </body>
</html>

