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
                <?php include ('printNewEvents.php'); ?>
                </table> 
            </section>

            <?php require_once("inc/sidebar.inc"); ?>
            <?php require_once("inc/footer.inc"); ?>
        </div>
    </body>
</html>

