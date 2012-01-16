<!DOCTYPE html>
<html lang="nl">
    <?php require_once("inc/header.inc"); ?>

    <body>
        <div id="container">
            <div id="header" role="banner">Paginatitel</div>
            <?php require_once("inc/nav.inc"); ?>

            <section id="main" role="main">
                <header class="pageTitle"><h1>Gebruikers toevoegen</h1></header>
                <form>
                    <label>Voornaam</label>
                    <input name="firstName" placeholder="Voornaam" autofocus required>

                    <label>Tussenvoegels, dan achternaam</label>
                    <input name="name" placeholder="Achternaam" required>

                    <label>Bericht</label>
                    <input name="email" type="email" placeholder="Email" required></textarea>

                    <label>Wachtwoord</label>
                    <input name="email" placeholder="Wachtwoord" required></textarea>

                    <label>Toegangsniveau</label>
                    <select name="accessLevel">
                    <option value="1">1 (Enkel evenementen toevoegen)</option>
                    <option value="2">2 (Volledige rechten)</option>
                    </select>

                    <input class="button" name="submit" type="submit" value="Verstuur bericht">
                </form>

            </section>

            <?php require_once("inc/sidebar.inc"); ?>
            <?php require_once("inc/footer.inc"); ?>
        </div>
    </body>
</html>





