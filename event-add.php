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
                <form enctype="multipart/form-data" name="event-add" action="eventformadd.php"  method="post">
                    <label>Naam evenement</label>
                    <input type="text" name="eventName" placeholder="Voer naam in" autofocus required>

                    <label>Begindatum (DD-MM-YYYY) en tijd</label>
                    <input type="text" name="eventBeginDate" placeholder="bv. 01-01-2012" required>

                    <select name="eventBeginTimeHours">
                        <option value="00">00</option>
                        <option value="01">01</option>
                        <option value="02">02</option>
                        <option value="03">03</option>
                        <option value="04">04</option>
                        <option value="05">05</option>
                        <option value="06">06</option>
                        <option value="07">07</option>
                        <option value="08">08</option>
                        <option value="09">09</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                        <option value="13">13</option>
                        <option value="14">14</option>
                        <option value="15">15</option>
                        <option value="16">16</option>
                        <option value="17">17</option>
                        <option value="18">18</option>
                        <option value="19">19</option>
                        <option value="20">20</option>
                        <option value="21">21</option>
                        <option value="22">22</option>
                        <option value="23">23</option>
                    </select>

                    <select name="eventBeginTimeMinutes">
                        <option value="00">00</option>
                        <option value="05">05</option>
                        <option value="10">10</option>
                        <option value="15">15</option>
                        <option value="20">20</option>
                        <option value="25">25</option>
                        <option value="30">30</option>
                        <option value="35">35</option>
                        <option value="40">40</option>
                        <option value="45">45</option>
                        <option value="50">50</option>
                        <option value="55">55</option>
                    </select>

                    <label>Einddatum (DD-MM-YYYY) en tijd</label>
                    <input type="text" name="eventEndDate" placeholder="bv. 01-01-2012" required>
                    
                    <label> Kies de locatie voor het event</label>
                    <select name="eventEndTimeHours">
                        <option value="00">00</option>
                        <option value="01">01</option>
                        <option value="02">02</option>
                        <option value="03">03</option>
                        <option value="04">04</option>
                        <option value="05">05</option>
                        <option value="06">06</option>
                        <option value="07">07</option>
                        <option value="08">08</option>
                        <option value="09">09</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                        <option value="13">13</option>
                        <option value="14">14</option>
                        <option value="15">15</option>
                        <option value="16">16</option>
                        <option value="17">17</option>
                        <option value="18">18</option>
                        <option value="19">19</option>
                        <option value="20">20</option>
                        <option value="21">21</option>
                        <option value="22">22</option>
                        <option value="23">23</option>
                    </select>
                    
                    <select name="eventEndTimeMinutes">
                        <option value="00">00</option>
                        <option value="05">05</option>
                        <option value="10">10</option>
                        <option value="15">15</option>
                        <option value="20">20</option>
                        <option value="25">25</option>
                        <option value="30">30</option>
                        <option value="35">35</option>
                        <option value="40">40</option>
                        <option value="45">45</option>
                        <option value="50">50</option>
                        <option value="55">55</option>
                    </select>
                    
                    <select name="locationPicker">
						<option value="deathMetal">Death Metal zaal: locatie 1</option>
						<option value="bijbelSchool">Zaal voor bijbelstudie: locatie 2</option>
						<option value="gedichtenZaal">Gedichtenzaal: locatie 3</option>
                    </select>

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
                         <input type="file" name="file" id ="file" />

                         <input id="button" name="addUser" type="submit" value="Submit" />
                    </div>
                </form>
            </section>

            <?php require_once("inc/sidebar.inc"); ?>
            <?php require_once("inc/footer.inc"); ?>
    </div>
    </body>
</html>
