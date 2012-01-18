<?php
    if (!empty($_POST) )
    {
        echo("test");

        $con = mysql_connect("localhost","webdb1241","qetha8ra");
        if (!$con)
        {
            die('Er is een fout opgetreden. Er kon geen verbinding met de server gemaakt worden.');
        }

        mysql_select_db("webdb1241", $con);

        $sql="INSERT INTO users (name, firstName, email, password, accessLevel)
            VALUES
            ('$_POST[name]','$_POST[firstName]','$_POST[email]','$_POST[password]','$_POST[accessLevel]')";

        if (!mysql_query($sql,$con))
        {
            die('Er is een fout opgetreden.');
        }
        
        echo "De gebruiker is succesvol toegevoegd.";

        mysql_close($con)
    }
?>


<!DOCTYPE html>
<html lang="nl">
    <?php require_once("inc/header.inc"); ?>

    <body>
        <div id="container">
            <div id="header" role="banner">Paginatitel</div>
            <?php require_once("inc/nav.inc"); ?>

            <section id="main" role="main">
                <header class="pageTitle"><h1>Gebruikers toevoegen</h1></header>
                <form action="admin_david.php" method="post">
                    <label>Voornaam</label>
                    <input name="firstName" placeholder="Voornaam" autofocus required>

                    <label>Achternaam (inclusief eventuele tussenvoegsels)</label>
                    <input name="name" placeholder="Achternaam" required>

                    <label>Email (tevens de login naam)</label>
                    <input name="email" type="email" placeholder="Email" required></textarea>

                    <label>Wachtwoord</label>
                    <input name="password" placeholder="Wachtwoord" required></textarea>

                    <label>Toegangsniveau</label>
                    <select name="accessLevel">
                        <option value="1">1 (Enkel evenementen toevoegen)</option>
                        <option value="2">2 (Volledige rechten)</option>
                    </select>

                    <input id="button" name="submit" type="submit" value="Voeg gebruiker toe">
                </form>

                <header class="pageTitle"><h1>Gebruiker zoeken op achternaam</h1></header>
                <form action="getuser.php" method="post">
                    <label>Welke naam?</label>
                    <input name="name" required>

                    <input id="button" name="submit" type="submit" value="Druk hier">
                </form>

                <header class="pageTitle"><h1>Alle gebruikers weergeven</h1></header>
                <form action="get_alluser.php" method="post">
                    <input id="button" name="submit" type="submit" value="Druk hier">
                </form>

            </section>

            <?php require_once("inc/sidebar.inc"); ?>
            <?php require_once("inc/footer.inc"); ?>
        </div>
    </body>
</html>





