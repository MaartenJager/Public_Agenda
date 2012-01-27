<?php
    /* Fetch event with ID.. */
    require_once("inc-conf.php");
    require("inc-dbcon.php");

    $sth = $dbh->prepare("SELECT * FROM events WHERE id=:id");
    $sth->bindParam(':id'       , $_GET['id']);
    $sth->setFetchMode(PDO::FETCH_OBJ);
    $sth->execute();
    $row = $sth->fetch();
    $hoursBegin = date("H", $row->beginDate);
    $hoursEnd = date("H", $row->endDate);
?>

<!DOCTYPE html>
<html lang="nl">
    <head>
        <title>Admin - Evenement bewerken</title>
        <?php require_once("inc/header.inc"); ?>
    </head>

    <body>
        <div id="header"></div>

        <?php require_once("inc/nav.inc"); ?>

        <div id="container">
            <section id="main">
                <header class="pageTitle"><h1>Evenement bewerken</h1></header>
                <p>U kunt hieronder waar gewenst informatie over het event aanpassen</p>
                <form enctype="multipart/form-data" name="event-add" action="formhandler.php"  method="post">
                    <label>Naam evenement</label>
                    <input type="text" name="eventName" value="<?php echo $row->title; ?>" autofocus required>

                    <label>Begindatum (DD-MM-YYYY) en tijd</label>
                    <input type="text" name="eventBeginDate" placeholder="bv. 01-01-2012" value="<?php echo date("d-m-Y", $row->beginDate); ?>" required>

                    <select name="eventBeginTimeHours">
                        <option <?php if($hoursBegin==00){ echo "selected=\"yes\""; } ?> value="00">00</option>
                        <option <?php if($hoursBegin==01){ echo "selected=\"yes\""; } ?>  value="01">01</option>
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
                        <option value="15">15</option>
                        <option value="30">30</option>
                        <option value="45">45</option>
                    </select>

                    <label>Einddatum (DD-MM-YYYY) en tijd</label>
                    <input type="text" name="eventEndDate" placeholder="bv. 01-01-2012" required>

                    (tmp)timestamp:<?php echo $row->endDate; ?>
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
                        <option value="15">15</option>
                        <option value="30">30</option>
                        <option value="45">45</option>
                    </select>

                    <label>Kies de locatie voor het event</label>
                    <select name="locationPicker">
                        <option value="1">Death Metal zaal: locatie 1</option>
                        <option value="2">Zaal voor bijbelstudie: locatie 2</option>
                        <option value="3">Gedichtenzaal: locatie 3</option>
                    </select>

                    <label>Beschrijving van het evenement</label>
                    <textarea name="eventDescription" placeholder="Voer beschrijving in" required><?php echo $row->description; ?></textarea>

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
                         <input type="file" name="file" id ="file" value="<?php echo $row->image; ?>"/>
                         <br />
                         <input id="button" name="editEvent" type="submit" value="Submit" />
                    </div>
                </form>

                <form action="sqlaction.php" method="get">
                    <input type="hidden" name="action" value="delete" />
                    <input type="hidden" name="type" value="event" />
                    <input type="hidden" name="id" value="<?php echo $row->id; ?>" />
                    <input id="button" type="submit" value="Verwijder" />
                </form>

            </section>

            <?php require_once("inc/sidebar.inc"); ?>
            <?php require_once("inc/footer.inc"); ?>
    </div>
    </body>
</html>





