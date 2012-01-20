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
    <?php require_once("inc/header.inc"); ?>

    <body>
        <div id="container">
            <div id="header" role="banner">Paginatitel</div>
            <?php require_once("inc/nav.inc"); ?>

            <section id="main" role="main">
                <header class="pageTitle"><h1>Evenement bewerken</h1></header>
                <p>Wilt u het volgende formulier invullen? Alle velden zijn verplicht. Kies tenminste &#233;&#233;n categorie.</p>

                <form action="sqlaction.php" method="post">

                    <input type="hidden" name="event_id" value="<?php $row->id; ?>">

                    <label>Naam evenement</label>
                    <input name="eventName" value="<?php echo $row->title; ?>" required>		

                    <label>Begindatum/-tijd</label>
                    <input name="beginDate" placeholder="Unixtimestamp (tmp)" value="<?php echo $row->beginDate; ?>"required>

                    <label>Einddatum/-tijd</label>
                    <input name="endDate" placeholder="Unixtimestamp (tmp)" value="<?php echo $row->endDate; ?>"required>

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
                    <input id="button" name="editEvent" type="submit" value="Submit" />
                </form>
                <form action="sqldeletes.php?event_id=<?php $row->id; ?>" method="post">
                    <input id="button" name="deleteEvent" type="submit" value="Delete" />
                </form>
            </section>

            <?php require_once("inc/sidebar.inc"); ?>
            <?php require_once("inc/footer.inc"); ?>
        </div>
    </body>
</html>





