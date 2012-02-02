<?php session_start(); ?>
<!DOCTYPE html>
<html lang="nl">
    <head>
        <?php require_once("inc/header.inc"); ?>
    </head>
   
    <body>
				<div id="header">            
                    <?php //Controleer of de gebruiker ingelogd is; zoja, geef dit weer in container ?>
                    <?php if(isset( $_SESSION['email'] )): ?>
                        <div id="loginStatus">
                            <div id="loginStatusContent">
                                <p>Ingelogd als <?php echo $_SESSION['email']; ?> <a href="index.php?page=user-edit">Wachtwoord wijzigen</a></p>
                            </div>
                        </div>
                    <?php endif; ?>
        
				</div>
	<?php require_once("inc/nav.inc");?>
		
        <div id="container">
            <section id="main">
                <?php
                    //Controleer of er een specifieke pagina opgevraagd wordt
                    if (isset($_GET['page'])) {
                        $page = $_GET['page'];
                        $page = "pageContent/" . $page . ".php";
                    }
                    else{
                        $page = "pageContent/home.php"; //Geen specifieke pagina? Laat dan homepage zien!
                    }

                    //Controleer of opgevraagde pagina daadwerkelijk bestaat
                    if (file_exists($page)){
                        require($page);
                    }
                    else{
                        echo "<h1>Oeps...</h1>";
                        echo "<p>404 - Opgevraagde pagina bestaat niet</p>";
                    }
                        
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
