<!DOCTYPE html>
<html lang="nl">
    <head>
        <?php require_once("inc/header.inc"); ?>
    </head>
   
    <body>
    <?php
		require_once("inc/nav.inc");
		echo '
			<div id="header">
				<div id="loginStatus">
					<div id="loginStatusContent">
						<p>Ingelogd als ' . $_SESSION['email'] . ' <---> <a href="#">Wachtwoord wijzigen</a></p>
					</div>
				</div>
			</div>';
    ?>
        

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
                if (isset($_GET['page'])) {
                    $sidebar = $_GET['page'];
                    if ($sidebar == "agenda")
                        $sidebar = "inc/sidebar_agenda.inc";
                    else
                        $sidebar = "inc/sidebar.inc";
                }
                else
                {
                    $sidebar = "inc/sidebar.inc";
                }
                $footer = "inc/footer.inc";
                include $sidebar;
                include $footer
?>
        </div>
    </body>
</html>