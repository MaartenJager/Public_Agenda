<meta charset="utf-8">
        <meta name="description" content="omschrijving" />
        <meta name="author" content="Projectgroep 1241" />
        <script language="JavaScript"> src="js/lib.js"></script>
        
<?php
    if (isset($_SESSION['accessLevel'])) {
        if ($_SESSION['accessLevel'] == 1) {
            if (isset($_GET['page'])) {
                $page = $_GET['page'];
                switch($page) {
                    case "admin":
                        echo "        <title>The Roadhouse - Fout</title>\n"; break;
                    case "agenda":
                        echo "        <title>The Roadhouse - Agenda</title>\n"; break;
                    case "contact":
                        echo "        <title>The Roadhouse - Contactformulier</title>\n"; break;
                    case "event-accept":
                        echo "        <title>The Roadhouse - Fout</title>\n"; break;
                    case "event-add":
                        echo "        <title>The Roadhouse - Evenement toevoegen</title>\n"; break;
                    case "event-review":
                        echo "        <title>The Roadhouse - Fout</title>\n"; break;
                    case "home":
                        echo "        <title>The Roadhouse - Home</title>\n"; break;
                    case "info":
                        echo "        <title>The Roadhouse - Informatie</title>\n"; break;
                    case "user-edit":
                        echo "        <title>The Roadhouse - Gegevens aanpassen</title>\n"; break;
                        
                }
            }
            else
                echo "        <title>The Roadhouse - Home</title>\n";
        }
    
        else if ($_SESSION['accessLevel'] == 2) {
            if (isset($_GET['page'])) {
                $page = $_GET['page'];
                switch($page) {
                    case "admin":
                        echo "        <title>The Roadhouse (admin) - Gebruikersbeheer</title>\n"; break;
                    case "agenda":
                        echo "        <title>The Roadhouse (admin) - Agenda</title>\n"; break;
                    case "contact":
                        echo "        <title>The Roadhouse (admin) - Contactformulier</title>\n"; break;
                    case "event-accept":
                        echo "        <title>The Roadhouse (admin) - Wachtrij evenementen</title>\n"; break;
                    case "event-add":
                        echo "        <title>The Roadhouse (admin) - Evenement toevoegen</title>\n"; break;
                    case "event-review":
                        echo "        <title>The Roadhouse (admin) - Evenement controleren</title>\n"; break;
                    case "home":
                        echo "        <title>The Roadhouse (admin) - Home</title>\n"; break;
                    case "info":
                        echo "        <title>The Roadhouse (admin) - Informatie</title>\n"; break;
                    case "user-edit":
                        echo "        <title>The Roadhouse (admin) - Gegevens aanpassen</title>\n"; break;
                        
                }
            }
            else
                echo "        <title>The Roadhouse (admin) - Home</title>\n";
        }
    }
    else {
        if (isset($_GET['page'])) {
            $page = $_GET['page'];
                switch($page) {
                    case "admin":
                        echo "        <title>The Roadhouse - Fout</title>\n"; break;
                    case "agenda":
                        echo "        <title>The Roadhouse - Agenda</title>\n"; break;
                    case "contact":
                        echo "        <title>The Roadhouse - Contactformulier</title>\n"; break;
                    case "event-accept":
                        echo "        <title>The Roadhouse - Fout</title>\n"; break;
                    case "event-add":
                        echo "        <title>The Roadhouse - Fout</title>\n"; break;
                    case "event-review":
                        echo "        <title>The Roadhouse - Fout</title>\n"; break;
                    case "home":
                        echo "        <title>The Roadhouse - Home</title>\n"; break;
                    case "info":
                        echo "        <title>The Roadhouse - Informatie</title>\n"; break;
                    case "user-edit":
                        echo "        <title>The Roadhouse - Gegevens aanpassen</title>\n"; break;
                        
                }
            }
            else
                echo "        <title>The Roadhouse - Home</title>\n";
    }
?>
        <link rel="stylesheet" href="style.css" />
