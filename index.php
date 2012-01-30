<!DOCTYPE html>
<html lang="nl">
    <head>
        <?php require_once("inc/header.inc"); ?>
    </head>
    
    <body>
        <div id="header"></div>
        <?php require_once("inc/nav.inc"); ?>
        <div id="container">
            <section id="main">
                <?php
                    if (isset($_GET['page']))
                        $page = $_GET['page'];
                        $page = "pageContent/" . $page . ".php";
                    else
                        $page = "pageContent/home.php";
                    include $page;
                ?>
            </section>         
            <?php require_once("inc/sidebar.inc"); ?>
            <?php require_once("inc/footer.inc"); ?>
	</div>
    </body>
</html>