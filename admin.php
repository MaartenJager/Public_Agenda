<!DOCTYPE html>
<html lang="nl">
    <?php require_once("inc/header.inc"); ?>

    <body>
        <div id="container">
            <div id="header" role="banner">Paginatitel</div>
            <?php require_once("inc/nav.inc"); ?>

            <section id="main" role="main">
                <header class="pageTitle"><h1>Gebruikersbeheer</h1></header>

                <table border="1">
                    <tr>
                        <th>Event title</th>
                        <th>Created by</th>
                        <th>Review</th>
                    </tr>
                </table>

                <?php
                    require_once("inc-conf.php");
                    require("inc-dbcon.php");

                    $sth = $dbh->query("SELECT * FROM events WHERE approvedBy=0");
                    //config fetch mode (return an object)
                    $sth->setFetchMode(PDO::FETCH_OBJ);

                    $sth->execute();

                    # showing the results
                    while($row = $sth->fetch() ){
                        echo $row->id . "\n";
                        echo $row->name . "\n";
                        echo $row->firstName . "\n";
                        echo $row->email . "\n";
                        echo $row->password . "\n";
                        echo $row->accessLevel . "\n";
                        echo "\n";
                        }

                ?>

                <div id="addUser">
                    <form action="formhandler_pdo.php" method="post">
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

                        <input id="button" name="addUser" type="submit" value="Voeg gebruiker toe">
                    </form>
                </div>

            </section>

            <?php require_once("inc/sidebar.inc"); ?>
            <?php require_once("inc/footer.inc"); ?>
        </div>
    </body>
</html>
