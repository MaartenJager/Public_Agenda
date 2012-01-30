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
                    if (isset($_GET['page'])) {
                        $page = $_GET['page'];
                        $page = "pageContent/" . $page . ".php";
                    }
                    else
                        $page = "pageContent/home.php";
                    include $page;
                ?>
            </section>
            
            <?php
                $sidebar = $_GET['page'];
                if ($sidebar == "agenda")
                    $sidebar = "inc/sidebar_agenda.inc";
                else
                    $sidebar = "inc/sidebar.inc";
                include $sidebar;
                }
            ?>
            <?php require_once("inc/footer.inc"); ?>
        </div>
    </body>
</html>