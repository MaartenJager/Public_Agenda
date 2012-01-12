<!DOCTYPE html>
<html lang="nl">
    <?php require_once("header.inc"); ?>

    <body>
        <div id="container">
            <div id="header">Pagina titel</div>
            <?php require_once("nav.inc"); ?>

            <section id="main">
                <header class="pageTitle"><h1>Contact</h1></header>
                <p>Neem contact met ons op!</p>

                <form>
                    <label>Name</label>
                    <input name="name" placeholder="Type Here">

                    <label>Email</label>
                    <input name="email" type="email" placeholder="Type Here">

                    <label>Message</label>
                    <textarea name="message" placeholder="Type Here"></textarea>

                    <input id="submit" name="submit" type="submit" value="Submit">
                </form>

            </section>

            <?php require_once("sidebar.inc"); ?>
            <?php require_once("footer.inc"); ?>
        </div>
    </body>
</html>





