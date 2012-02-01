
        <nav id="menu" role="navigation">
            <ul>
                <li><a href="index.php?page=home">Home</a></li>
                <li><a href="index.php?page=info">Info</a></li>
                <li><a href="index.php?page=agenda">Agenda</a></li>
                <li><a href="index.php?page=contact">Contact</a></li>
                
                
<?php
session_start();
if (isset( $_SESSION['accessLevel'] ))
{
	
	if ($_SESSION['accessLevel'] == 1)
	{
		echo '
		<li><a href="index.php?page=event-add">Evenement toevoegen</a></li>
		<li><a href="index.php?page=logout">Logout</a></li>';
	}	
	if ($_SESSION['accessLevel'] == 2)
	{		
		echo '
		<li><a href="index.php?page=event-add">Evenement toevoegen</a></li>
		<li><a href="index.php?page=event-accept">Evenementen controleren</a></li>
		<li><a href="index.php?page=admin">Gebruikersbeheer</a></li>
		<li><a href="logout.php">Logout</a></li>';
	}
}
else
{
		echo '<li><a href="#" onclick="toggleVisibility(\'loginBox\');">Login</a></li>';
}
?>
                
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
