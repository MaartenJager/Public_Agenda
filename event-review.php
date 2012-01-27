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
    $minsBegin = date("i", $row->beginDate);
    $hoursEnd = date("H", $row->endDate);
    $minsEnd = date("i", $row->endDate);
    $sth = $dbh->prepare("SELECT * FROM genre_event_koppeling WHERE eventId=:id");
    $sth->bindParam(':id'       , $_GET['id']);
    $sth->setFetchMode(PDO::FETCH_OBJ);
    $sth->execute();
    $i=1;
    $booleanArray = array_fill(0, 8, FALSE);
    while( $row2 = $sth->fetch() ) {
        while( $i != $row2->genreId ) {
            $i++;
        }
        booleanArray[$i-1] = TRUE;
    }
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
                <p>U kunt hieronder waar gewenst informatie over het event aanpassen en deze goedkeuren.</p>
                <form enctype="multipart/form-data" name="event-add" action="formhandler.php"  method="post">
                    <label>Naam evenement</label>
                    <input type="text" name="eventName" value="<?php echo $row->title; ?>" autofocus required>

                    <label>Begindatum (DD-MM-YYYY) en tijd</label>
                    <input type="text" name="eventBeginDate" placeholder="bv. 01-01-2012" value="<?php echo date("d-m-Y", $row->beginDate); ?>" required>

                    <select name="eventBeginTimeHours">
                        <option value="00" <?php if($hoursBegin==00){ echo "selected=\"selected\""; } ?>>00</option>
                        <option value="01" <?php if($hoursBegin==01){ echo "selected=\"selected\""; } ?>>01</option>
                        <option value="02" <?php if($hoursBegin==02){ echo "selected=\"selected\""; } ?>>02</option>
                        <option value="03" <?php if($hoursBegin==03){ echo "selected=\"selected\""; } ?>>03</option>
                        <option value="04" <?php if($hoursBegin==04){ echo "selected=\"selected\""; } ?>>04</option>
                        <option value="05" <?php if($hoursBegin==05){ echo "selected=\"selected\""; } ?>>05</option>
                        <option value="06" <?php if($hoursBegin==06){ echo "selected=\"selected\""; } ?>>06</option>
                        <option value="07" <?php if($hoursBegin==07){ echo "selected=\"selected\""; } ?>>07</option>
                        <option value="08" <?php if($hoursBegin==08){ echo "selected=\"selected\""; } ?>>08</option>
                        <option value="09" <?php if($hoursBegin==09){ echo "selected=\"selected\""; } ?>>09</option>
                        <option value="10" <?php if($hoursBegin==10){ echo "selected=\"selected\""; } ?>>10</option>
                        <option value="11" <?php if($hoursBegin==11){ echo "selected=\"selected\""; } ?>>11</option>
                        <option value="12" <?php if($hoursBegin==12){ echo "selected=\"selected\""; } ?>>12</option>
                        <option value="13" <?php if($hoursBegin==13){ echo "selected=\"selected\""; } ?>>13</option>
                        <option value="14" <?php if($hoursBegin==14){ echo "selected=\"selected\""; } ?>>14</option>
                        <option value="15" <?php if($hoursBegin==15){ echo "selected=\"selected\""; } ?>>15</option>
                        <option value="16" <?php if($hoursBegin==16){ echo "selected=\"selected\""; } ?>>16</option>
                        <option value="17" <?php if($hoursBegin==17){ echo "selected=\"selected\""; } ?>>17</option>
                        <option value="18" <?php if($hoursBegin==18){ echo "selected=\"selected\""; } ?>>18</option>
                        <option value="19" <?php if($hoursBegin==19){ echo "selected=\"selected\""; } ?>>19</option>
                        <option value="20" <?php if($hoursBegin==20){ echo "selected=\"selected\""; } ?>>20</option>
                        <option value="21" <?php if($hoursBegin==21){ echo "selected=\"selected\""; } ?>>21</option>
                        <option value="22" <?php if($hoursBegin==22){ echo "selected=\"selected\""; } ?>>22</option>
                        <option value="23" <?php if($hoursBegin==23){ echo "selected=\"selected\""; } ?>>23</option>
                    </select>

                    <select name="eventBeginTimeMinutes">
                        <option value="00" <?php if($minsBegin==00){ echo "selected=\"selected\""; } ?>>00</option>
                        <option value="15" <?php if($minsBegin==15){ echo "selected=\"selected\""; } ?>>15</option>
                        <option value="30" <?php if($minsBegin==30){ echo "selected=\"selected\""; } ?>>30</option>
                        <option value="45" <?php if($minsBegin==45){ echo "selected=\"selected\""; } ?>>45</option>
                    </select>

                    <label>Einddatum (DD-MM-YYYY) en tijd</label>
                    <input type="text" name="eventEndDate" placeholder="bv. 01-01-2012" value="<?php echo date("d-m-Y", $row->endDate); ?>" required>

                    <select name="eventEndTimeHours">
                        <option value="00" <?php if($hoursEnd==00){ echo "selected=\"selected\""; } ?>>00</option>
                        <option value="01" <?php if($hoursEnd==01){ echo "selected=\"selected\""; } ?>>01</option>
                        <option value="02" <?php if($hoursEnd==02){ echo "selected=\"selected\""; } ?>>02</option>
                        <option value="03" <?php if($hoursEnd==03){ echo "selected=\"selected\""; } ?>>03</option>
                        <option value="04" <?php if($hoursEnd==04){ echo "selected=\"selected\""; } ?>>04</option>
                        <option value="05" <?php if($hoursEnd==05){ echo "selected=\"selected\""; } ?>>05</option>
                        <option value="06" <?php if($hoursEnd==06){ echo "selected=\"selected\""; } ?>>06</option>
                        <option value="07" <?php if($hoursEnd==07){ echo "selected=\"selected\""; } ?>>07</option>
                        <option value="08" <?php if($hoursEnd==08){ echo "selected=\"selected\""; } ?>>08</option>
                        <option value="09" <?php if($hoursEnd==09){ echo "selected=\"selected\""; } ?>>09</option>
                        <option value="10" <?php if($hoursEnd==10){ echo "selected=\"selected\""; } ?>>10</option>
                        <option value="11" <?php if($hoursEnd==11){ echo "selected=\"selected\""; } ?>>11</option>
                        <option value="12" <?php if($hoursEnd==12){ echo "selected=\"selected\""; } ?>>12</option>
                        <option value="13" <?php if($hoursEnd==13){ echo "selected=\"selected\""; } ?>>13</option>
                        <option value="14" <?php if($hoursEnd==14){ echo "selected=\"selected\""; } ?>>14</option>
                        <option value="15" <?php if($hoursEnd==15){ echo "selected=\"selected\""; } ?>>15</option>
                        <option value="16" <?php if($hoursEnd==16){ echo "selected=\"selected\""; } ?>>16</option>
                        <option value="17" <?php if($hoursEnd==17){ echo "selected=\"selected\""; } ?>>17</option>
                        <option value="18" <?php if($hoursEnd==18){ echo "selected=\"selected\""; } ?>>18</option>
                        <option value="19" <?php if($hoursEnd==19){ echo "selected=\"selected\""; } ?>>19</option>
                        <option value="20" <?php if($hoursEnd==20){ echo "selected=\"selected\""; } ?>>20</option>
                        <option value="21" <?php if($hoursEnd==21){ echo "selected=\"selected\""; } ?>>21</option>
                        <option value="22" <?php if($hoursEnd==22){ echo "selected=\"selected\""; } ?>>22</option>
                        <option value="23" <?php if($hoursEnd==23){ echo "selected=\"selected\""; } ?>>23</option>
                    </select>

                    <select name="eventEndTimeMinutes">
                        <option value="00" <?php if($minsEnd==00){ echo "selected=\"selected\""; } ?>>00</option>
                        <option value="15" <?php if($minsEnd==15){ echo "selected=\"selected\""; } ?>>15</option>
                        <option value="30" <?php if($minsEnd==30){ echo "selected=\"selected\""; } ?>>30</option>
                        <option value="45" <?php if($minsEnd==45){ echo "selected=\"selected\""; } ?>>45</option>
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
                            <li><input name="genre_pop" id="formCheckbox" type="checkbox" <?php if($booleanArray[0]){ echo "checked=\"checked\""; } ?> /> Pop</li>
                            <li><input name="genre_rock" id="formCheckbox" type="checkbox" <?php if($booleanArray[1]){ echo "checked=\"checked\""; } ?> /> Rock</li>
                            <li><input name="genre_metal" id="formCheckbox" type="checkbox" <?php if($booleanArray[2]){ echo "checked=\"checked\""; } ?> /> Metal</li>
                            <li><input name="genre_hiphop" id="formCheckbox" type="checkbox" <?php if($booleanArray[3]){ echo "checked=\"checked\""; } ?> /> Hiphop</li>
                        </ul>
                    </div>
                    <div id="checkbox_list">
                        <ul>
                            <li><input name="genre_blues" id="formCheckbox" type="checkbox" <?php if($booleanArray[4]){ echo "checked=\"checked\""; } ?> /> Blues</li>
                            <li><input name="genre_classic" id="formCheckbox" type="checkbox" <?php if($booleanArray[5]){ echo "checked=\"checked\""; } ?> /> Klassiek</li>
                            <li><input name="genre_church" id="formCheckbox" type="checkbox" <?php if($booleanArray[6]){ echo "checked=\"checked\""; } ?> /> Kerk</li>
                            <li><input name="genre_other" id="formCheckbox" type="checkbox" <?php if($booleanArray[7]){ echo "checked=\"checked\""; } ?> /> Overig</li>
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





