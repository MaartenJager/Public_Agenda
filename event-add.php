<!DOCTYPE html>
<html lang="nl">
    <head>
        <title>The Roadhouse - Evenement toevoegen</title>
        <?php require_once("inc/header.inc"); ?>
    </head>
    
    <body>
        <div id="header"></div>
        
        <?php require_once("inc/nav.inc"); ?>
        
        <div id="container">
            <section id="main">
                <h1>Evenement toevoegen</h1>
                <p>Wilt u het volgende formulier invullen? Alle velden, op de afbeelding na, zijn verplicht. Kies tenminste &#233;&#233;n categorie.</p>
                <form name="event-add" action="eventformadd.php" method="post">
                    <label>Naam evenement</label>
                    <input name="eventName" placeholder="Voer naam in" autofocus required>		

                    <label>Datum</label>
                    <input name="eventDate" placeholder="bv. 01-01-2012" required>

                    <label>Beschrijving van het evenement</label>
                    <textarea name="eventDescription" placeholder="Voer beschrijving in" required></textarea>			        		

                    <label>Kies de categorie&#235;n die bij het evenement horen</label>
                    <div id="checkbox_list">
                        <ul>
                            <li><input name="genre_pop" id="formCheckbox" type="checkbox" /> Pop</li>
                            <li><input name="genre_rock" id="formCheckbox" type="checkbox" /> Rock</li>
                            <li><input name="genre_metal" id="formCheckbox" type="checkbox" /> Metal</li>
                            <li><input name="genre_hiphop" id="formCheckbox" type="checkbox" /> Hiphop</li>
                        </ul>
                    </div>
                    <div id="checkbox_list">
                        <ul>
                            <li><input name="genre_blues" id="formCheckbox" type="checkbox" /> Blues</li>
                            <li><input name="genre_classic" id="formCheckbox" type="checkbox" /> Klassiek</li>
                            <li><input name="genre_church" id="formCheckbox" type="checkbox" /> Kerk</li>
                            <li><input name="genre_other" id="formCheckbox" type="checkbox" /> Overig</li>
                        </ul>
                    </div>

                    <div id="checkbox_below">
                         <label>Voeg een afbeelding toe</label>
                         <input type="file" name="datafile" />
                         <input id="button" name="submit" type="submit" value="Submit" />
                    </div>
                </form>
            </section>
			
            <?php require_once("inc/sidebar.inc"); ?>
            <?php require_once("inc/footer.inc"); ?>
	</div>
    </body>
</html>