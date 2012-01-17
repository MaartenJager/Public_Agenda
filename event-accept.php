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
                <? 
                include("printNewEvents.php"); 
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

