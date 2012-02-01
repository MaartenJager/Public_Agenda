<meta charset="utf-8">
        <meta name="description" content="omschrijving" />
        <meta name="author" content="Projectgroep 1241" />
        
<?php
    if (isset($_SESSION['accessLevel'])) {
        if ($_SESSION['accessLevel'] == 2) {
            <title>Admin - Home</title>
        }
    }
    else {
        <title>The Roadhouse - Home</title>
    }
?>
        <link rel="stylesheet" href="style.css" />
