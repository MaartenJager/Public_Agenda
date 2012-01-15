<!DOCTYPE html>
<html lang="nl">
    <?php require_once("inc/header.inc"); ?>

    <body>
        <div id="container">
            <div id="header" role="banner">Paginatitel</div>
            <?php require_once("inc/nav.inc"); ?>

            <section id="main" role="main">
                <header class="pageTitle"><h1>Evenement toevoegen</h1></header>
                <p>Wilt u het volgende formulier invullen? Alle velden zijn verplicht. Kies tenminste één categorie.</p>

                <form name="event-add">
    		        <label>Naam evenement</label>
		        <input name="eventName" placeholder="Voer naam in" autofocus required>		
						
                        <label>Datum</label>
                        <input name="eventDate" placeholder="bv. 01-01-2012" required>
			
                        <label>Beschrijving van het event</label>
                        <textarea name="eventDescription" placeholder="Voer beschrijving in" required></textarea>			        		
			        
                        <label>Kies de categorieeen die bij het event horen</label>
                        <div>
                            <checkboxZone><input id="checkbox" type="checkbox" name="pop"/> Pop</checkboxZone>
                            <checkboxZone><input id="checkbox" type="checkbox" name="rock"/> Rock</label></checkboxZone>
                            <checkboxZone><input id="checkbox" type="checkbox" name="metal"/> Metal</label></checkboxZone>
                            <checkboxZone><input id="checkbox" type="checkbox" name="hiphop"/> Hip-hop</label></checkboxZone>
                            <checkboxZone><input id="checkbox" type="checkbox" name="blues"/> Blues</label></checkboxZone>
                            <checkboxZone><input id="checkbox" type="checkbox" name="classic"/> Klassiek</label></checkboxZone>
                            <checkboxZone><input id="checkbox" type="checkbox" name="church"/> Kerk</label></checkboxZone>
                            <checkboxZone><input id="checkbox" type="checkbox" name="other"/> Overig</label></checkboxZone>
                        </div>
		
                        <label>Voeg een afbeelding toe</label>
                        <input type="file" name="datafile" />

                        <input id="submit" name="submit" type="submit" value="Submit">
                    </form>

            </section>

            <?php require_once("inc/sidebar.inc"); ?>
            <?php require_once("inc/footer.inc"); ?>
        </div>
    </body>
</html>





