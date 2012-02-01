<?php
/* Fetch all users from table USERS */
    require_once("inc-conf.php");
    require("inc-dbcon.php");

    $sth = $dbh->query("SELECT * FROM users");
    $sth->setFetchMode(PDO::FETCH_OBJ);
    $sth->execute();
?>

<script language="JavaScript">
    function makeVisible() {
        document.getElementById('addUser').style.display = 'block';
        document.getElementById('addUserButton').style.display = 'none';
    }
</script>

<h1>Gebruikersbeheer</h1>
<?php if (isset( $_SESSION['accessLevel'] )): ?>
    <?php if ($_SESSION['accessLevel'] == 2): ?>
                
                <form action="sqlaction.php" method="post">
                    <table>
                        <thead>
                            <tr>
                                <th></th>
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
                                $i = 0;
                                while($row = $sth->fetch() ){
                                    $i++;
                                    echo "<tr>\n";
                                    echo "  <td id=\"checkboxTable\"><input name=\"deleteSelection" . $i . "\" type=\"checkbox\" S/></td>\n";
                                    echo "  <td>" . $row->firstName . "</td>\n";
                                    echo "  <td>" . $row->name . "</td>\n";
                                    echo "  <td>" . $row->email . "</td>\n";
                                    echo "  <td>" . $row->accessLevel . "</td>\n";
                                    echo "  <td> \n";
                                    echo "      <a class=\"button\" href=\"sqlaction.php?type=user&action=delete&id=".$row->id."\"> \n";
                                    echo "          <img src=\"img/btn-delete.png\" title=\"Verwijder\" alt=\"Verwijder\" width=\"16\" height=\"16\">\n";
                                    echo "      </a> \n";
                                    echo "      <a class=\"button\" href=\"index.php?page=user-edit&id=".$row->id."\"> \n";
                                    echo "          <img src=\"img/btn-edit.png\" title=\"Aanpassen\" alt=\"Aanpassen\" width=\"16\" height=\"16\">\n";
                                    echo "      </a> \n";
                                    echo "  </td>\n";
                                    echo "</tr>\n";
                                }
                            ?>
                        </tbody>
                    </table>
                <input id="button" name="deleteEvents" type="submit" value="Verwijder geselecteerden" />
                </form>

                <div id="addUserButton">
                    <input id="button" type="submit" value="Gebruiker toevoegen" onclick="makeVisible();" />
                </div>

                <div id="addUser">
                    <header class="pageTitle"><h1>Nieuwe gebruiker toevoegen</h1></header>
                    <form action="formhandler.php" method="post">
                        <label>Voornaam</label>
                        <input type="text" name="firstName" placeholder="Voornaam" autofocus required>

                        <label>Achternaam (inclusief eventuele tussenvoegsels)</label>
                        <input type="text" name="name" placeholder="Achternaam" required>

                        <label>Email (tevens de login naam)</label>
                        <input type="email" name="email" placeholder="Email" required>

                        <label>Wachtwoord</label>
                        <input type="password" name="password" placeholder="Wachtwoord" required>

                        <label>Toegangsniveau</label>
                        <select name="accessLevel">
                            <option value="1">1 (Enkel evenementen toevoegen)</option>
                            <option value="2">2 (Volledige rechten)</option>
                        </select>

                        <input id="button" name="addUser" type="submit" value="Voeg gebruiker toe">
                    </form>
                </div>
    
    <?php else: ?>
        <p>U bent wel ingelogd maar hebt niet de juiste permissies om deze admin-pagina te bekijken!</p>
    <?php endif; ?>
<?php else: ?>
    <p>U bent niet ingelogd en hebt dus niet de juiste permissies om deze admin-pagina te bekijken!</p>
<?php endif; ?>
