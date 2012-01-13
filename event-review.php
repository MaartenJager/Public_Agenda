<!DOCTYPE html>
<html lang="nl">
    <?php require_once("inc/header.inc"); ?>

    <body>
        <div id="container">
            <div id="header" role="banner">Paginatitel</div>
            <?php require_once("inc/nav.inc"); ?>

            <section id="main" role="main">
                <header class="pageTitle"><h1>Evenement accepteren</h1></header>
                <p>Neem contact met ons op!</p>

                <form name="event-add">
    		        <label>Naam event</label>
		            <input name="naamEvent" />		
						
			        <label>Datum</label>
			        <input name="datumEvent" />
			
			        <label>Beschrijving van het event</label>
			        <textarea id="beschrijvingEvent"></textarea>	
			        		
			        
			        <label>Kies de categorieeen die bij het event horen</label>
			        <ul id="checkbox">
				        <li><input type="checkbox" name="pop" />pop</li>
				        <li><input type="checkbox" name="blues" />blues</li>
				        <li><input type="checkbox" name="metal" />metal</li>
				        <li><input type="checkbox" name="klassiek" />klassiek</li>
				        <li><input type="checkbox" name="jazz" />jazz</li>
				        <li><input type="checkbox" name="hiphop" />hip-hop</li>
				        <li><input type="checkbox" name="kerkmuziek" />kerkmuziek</li>				
			        </ul>	
		
			        <label>Blader hier voor het toevoegen van een plaatje</label>
			        <input type="file" name="datafile" />
			        
			        <input type="submit" value="Submit" class="button" />

		        </form>   

            </section>

            <?php require_once("inc/sidebar.inc"); ?>
            <?php require_once("inc/footer.inc"); ?>
        </div>
    </body>
</html>





