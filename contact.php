<!DOCTYPE html>
<html lang="nl">
    <?php require_once("inc/header.inc"); ?>

    <body>
        <div id="container">
            <div id="header" role="banner">Paginatitel</div>
            <?php require_once("inc/nav.inc"); ?>

            <section id="main" role="main">
                <header class="pageTitle"><h1>Contact</h1></header>
                <p>Neem contact met ons op!</p>

                <form>
                    <label>Uw naam</label>
                    <input name="name" placeholder="Type uw naam" autofocus required>

                    <label>Email</label>
                    <input name="email" type="email" placeholder="Type uw email" required>

                    <label>Bericht</label>
                    <textarea name="message" placeholder="Type uw bericht" required></textarea>

                    <input id="button" name="submit" type="submit" value="Verstuur bericht">
                </form>

            </section>

            <?php require_once("inc/sidebar.inc"); ?>
            <?php require_once("inc/footer.inc"); ?>
        </div>
    </body>
</html>





