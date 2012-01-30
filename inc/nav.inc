
        <nav id="menu" role="navigation">
            <ul>
                <li><a href="index.php?page=home.php">Home</a></li>
                <li><a href="index.php?page=info.php">Info</a></li>
                <li><a href="index.php?page=agenda.php">Agenda</a></li>
                <li><a href="index.php?page=contact.php">Contact</a></li>
                <li><a href="index.php?page=event-add.php">Evenement toevoegen</a></li>
                <li><a href="index.php?page=event-accept.php">Evenementen controleren</a></li>
                <li><a href="index.php?page=admin.php">Gebruikersbeheer</a></li>
                <li><a href="#" onclick="toggleVisibility('loginBox');">Login</a></li>
            </ul>
        </nav>

        <div id="loginBox">
            <div id="loginBoxContent">
                <form name="login" action="login.php" method="post">
                    <label>Inloggen</label>
                    <input name="email" placeholder="Uw email" required>
                    <input name="password" type="password" placeholder="Uw wachtwoord" required>
                    <input id="button" name="login" type="submit" value="Login" />
                </form>
            </div>
        </div>
