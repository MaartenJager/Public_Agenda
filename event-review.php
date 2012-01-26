<?php
    /* Fetch event with ID.. */
    require_once("inc-conf.php");
    require("inc-dbcon.php");

    $sth = $dbh->prepare("SELECT * FROM events WHERE id=:id");
    $sth->bindParam(':id'       , $_GET['id']);
    $sth->setFetchMode(PDO::FETCH_OBJ);
    $sth->execute();
    $row = $sth->fetch()
?>

<!DOCTYPE html>
<html lang="nl">
    <head>
        <title>Admin - Evenement bewerken</title>
        <?php require_once("inc/header.inc"); ?>
    </head>

    <body>
        <div id="container">
            <div id="header" role="banner"></div>
            <?php require_once("inc/nav.inc"); ?>

            <section id="main" role="main">
                <header class="pageTitle"><h1>Evenement bewerken</h1></header>

                <form name="event" action="formhandler.php" method="post">

                    <label>Naam evenement</label>
                    <input type="text" name="eventName" value="<?php echo $row->title; ?>" required>

                    <label>Begindatum/-tijd</label>
                    <input type="text" name="beginDate" placeholder="Unixtimestamp (tmp)" value="<?php echo $row->beginDate; ?>"required>
                    <div id="beginDateUnixButton">
                        <input id="buttonSmall" value="Bereken Timestamp" onclick="beginDateAndUnix();" />
                    </div>

                    <div id="beginDateUnixCalc">
                        <p id="beginDate"></p>
                        <p>Nieuwe datum invoeren:</p>
                        <input type="text" name="beginDateReal" value="vb: 12/31/2013 23:59:59">
                        <input type="text" id="buttonSmall" value="Vul timestamp in" onclick="beginDateAutoFill();" />
                    </div>


                    <label>Einddatum/-tijd</label>
                    <input type="text" name="endDate" placeholder="Unixtimestamp (tmp)" value="<?php echo $row->endDate; ?>"required>
                    <div id="endDateUnixButton">
                        <input id="buttonSmall" value="Bereken Timestamp" onclick="endDateAndUnix();" />
                    </div>

                    <div id="endDateUnixCalc">
                        <p id="endDate"></p>
                        <p>Nieuwe datum invoeren:</p>
                        <input type="text" name="endDateReal" value="vb: 12/31/2013 23:59:59">
                        <input type="text" id="buttonSmall" value="Vul timestamp in" onclick="endDateAutoFill();" />
                    </div>

                    <label>Beschrijving van het event</label>
                    <textarea name="description" placeholder="Voer beschrijving in" required><?php echo $row->description; ?></textarea>

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
                    <input type="file" name="datafile" value="<?php echo $row->image; ?>" />
                    <br />
                    <input type="hidden" name="action" value="approve" />
                    <input type="hidden" name="type" value="event" />
                    <input type="hidden" name="id" value="<?php echo $row->id; ?>" />
                    <input id="button" name="editEvent" type="submit" value="Goekeuren" />
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





