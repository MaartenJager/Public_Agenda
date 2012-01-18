<!DOCTYPE html>
<html lang="nl">
    <?php require_once("inc/header.inc"); ?>

    <body>
        <div id="container">
            <div id="header" role="banner">Paginatitel</div>
            <?php require_once("inc/nav.inc"); ?>

            <section id="main" role="main">
                <header class="pageTitle"><h1>Evenement bewerken</h1></header>
                <p>Wilt u het volgende formulier invullen? Alle velden zijn verplicht. Kies tenminste &#233;&#233;n categorie.</p>

                <form name="event-add" action="eventformadd.php" method="post">
                    <label>Naam evenement</label>
                    <input name="eventName" placeholder="Voer naam in" autofocus required>		

                    <label>Datum</label>
                    <input name="eventDate" placeholder="bv. 01-01-2012" required>

                    <label>Beschrijving van het event</label>
                    <textarea name="eventDescription" placeholder="Voer beschrijving in" required></textarea>			        		

                    <label>Kies de categorie&#235;n die bij het event horen</label>
                    <div>
                        <checkboxlabel><input id="formCheckbox" type="checkbox" /> Pop</checkboxlabel>
                        <checkboxlabel><input id="formCheckbox" type="checkbox" /> Rock</checkboxlabel>
                        <checkboxlabel><input id="formCheckbox" type="checkbox" /> Metal</checkboxlabel>
                        <checkboxlabel><input id="formCheckbox" type="checkbox" /> Hiphop</checkboxlabel>
                        <checkboxlabel><input id="formCheckbox" type="checkbox" /> Blues</checkboxlabel>
                        <checkboxlabel><input id="formCheckbox" type="checkbox" /> Klassiek</checkboxlabel>
                        <checkboxlabel><input id="formCheckbox" type="checkbox" /> Kerk</checkboxlabel>
                        <checkboxlabel><input id="formCheckbox" type="checkbox" /> Overig</checkboxlabel>
                    </div>

                    <label>Voeg een afbeelding toe</label>
                    <input type="file" name="datafile" />
                    <input id="button" name="submit" type="submit" value="Submit" />
                    <input id="button" name="delete" type="delete" value="Delete" />
                </form>
            </section>

            <?php require_once("inc/sidebar.inc"); ?>
            <?php require_once("inc/footer.inc"); ?>
        </div>
    </body>
</html>





