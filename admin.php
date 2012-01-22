<?php
/* Fetch all users from table USERS */
    require_once("inc-conf.php");
    require("inc-dbcon.php");

    $sth = $dbh->query("SELECT * FROM users");
    $sth->setFetchMode(PDO::FETCH_OBJ);
    $sth->execute();
?>

<!DOCTYPE html>
<html lang="nl">
    <head>
        <title>The Roadhouse - Gebruikersbeheer</title>
        <?php require_once("inc/header.inc"); ?>

        <script language="JavaScript">
            function toggle(id) {
                var state = document.getElementById(id).style.display;
                    if (state == 'block') {
                        document.getElementById(id).style.display = 'none';
                    }
                    else {
                        document.getElementById(id).style.display = 'block';
                    }
                }
        </script>

    </head>
    <body>
        <div id="container">
            <div id="header" role="banner">Paginatitel</div>
            <?php require_once("inc/nav.inc"); ?>

            <section id="main" role="main">
                <header class="pageTitle"><h1>Gebruikersbeheer</h1></header>

                <table>
                    <thead>
                        <tr>
                            <th>Voornaam</th>
                            <th>Achternaam</th>
                            <th>E-mail</th>
                            <th>Toegansniveau</th>
                            <th></th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                            // showing the results
                            while($row = $sth->fetch() ){
                                echo "<tr>\n";
                                echo "  <td>" . $row->firstName . "</td>\n";
                                echo "  <td>" . $row->name . "</td>\n";
                                echo "  <td>" . $row->email . "</td>\n";
                                echo "  <td>" . $row->accessLevel . "</td>\n";
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

                <form>
                    <input type="button" value="google" onclick="toggle('addUser');" />
                </form>
                
                <div id="addUser">
                    <form action="formhandler.php" method="post">
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
