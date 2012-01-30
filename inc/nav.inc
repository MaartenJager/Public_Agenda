
        <nav id="menu" role="navigation">
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="info.php">Info</a></li>
                <li><a href="agenda.php">Agenda</a></li>
                <li><a href="contact.php">Contact</a></li>
                <li><a href="event-add.php">Evenement toevoegen</a></li>
                <li><a href="event-accept.php">Evenementen controleren</a></li>
                <li><a href="admin.php">Gebruikersbeheer</a></li>
                <li><a href="#" onclick="toggleVisibility('loginBox');">Login</a></li>
            </ul>
        </nav>

        <div id="loginBox">
            <form name="login" action="login.php" method="post">
                <label>Inloggen</label>
                <input name="email" placeholder="Uw email" required>
                <input name="password" type="password" placeholder="Uw wachtwoord" required>
                <input id="button" name="login" type="submit" value="Login" />
            </form>
        </div>
