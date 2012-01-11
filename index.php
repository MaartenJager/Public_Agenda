<!DOCTYPE html>
<html lang="nl">
    <head>
        <meta charset="utf-8">
        <title>Paginatitel</title>
        <link rel="shortcut icon" href="" />
        <meta name="description" content="omschrijving" />
        <meta name="copyright" content="Copyright (c) 2012" />
        <meta name="author" content="Projectgroep 1241" />

        <!-- Style sheets -->
        <link rel="stylesheet" href="style.css" />

        <script>
            // Create HTML5 tags for IE compatibility
            document.createElement('header');
            document.createElement('footer');
            document.createElement('section');
            document.createElement('aside');
            document.createElement('nav');
            document.createElement('article');
        </script>
    </head>

    <body>
        <div id="wrapper">
            <div id="header">Header</div>
            <nav id="topMenu">
                <ul>
                    <li><a href="#">Home</a></li>
                    <li><a href="info.html">Info</a></li>
                    <li><a href="#">Agenda</a></li>
                    <li><a href="#">Contact</a></li>
                    <li><a href="#">Event toevoegen</a></li>
                    <li><a href="#">Events accepteren</a></li>
                    <li><a href="#">Gebruikers beheren</a></li>
                    <li><a href="#">Login</a></li>
                </ul>
            </nav>
            <section id="content">
                <header><h1>Titel</h1></header>
                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit.
                Mauris vel magna. Mauris risus nunc, tristique varius, gravida
                in, lacinia vel, elit. Nam ornare, felis non faucibus molestie,
                nulla augue adipiscing mauris, a nonummy diam ligula ut risus.
                Praesent varius. Cum sociis natoque penatibus et magnis dis
                parturient montes, nascetur ridiculus mus.</p>
            </section>
            <div id="sidebar">sidebar</div>
            <div id="footer">&copy; 2012</div>
        </div>
    </body>
</html>
