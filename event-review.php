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
        
        <script language="JavaScript">
            function toggle(id) {
                var id = document.getElementById(id)
                if (id.style.display == 'none')
                    id.style.display = 'block');
                else
                    id.style.display = 'none');
            }
        </script>
    </head>
    
    <body>
        <div id="container">
            <div id="header" role="banner"></div>
            <?php require_once("inc/nav.inc"); ?>

            <section id="main" role="main">
                <header class="pageTitle"><h1>Evenement bewerken</h1></header>

                <form action="sqlaction.php" method="post">

                    <input type="hidden" name="event_id" value="<?php $row->id; ?>">

                    <label>Naam evenement</label>
                    <input name="eventName" value="<?php echo $row->title; ?>" required>		

                    <label>Begindatum/-tijd</label>
                    <input name="beginDate" placeholder="Unixtimestamp (tmp)" value="<?php echo $row->beginDate; ?>"required>
                    <input id="button" value="Timestamp Calculator" onclick="toggle('beginDateCalc')" />
                    <div id="beginDateCalc">
                        Blablabla
                    </div>

                    <label>Einddatum/-tijd</label>
                    <input name="endDate" placeholder="Unixtimestamp (tmp)" value="<?php echo $row->endDate; ?>"required>
                    <input id="button" value="Timestamp Calculator" onclick="toggle('endDateCalc')" />
                    <div id="endDateCalc">
                        Blablabla
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
                    <input id="button" name="editEvent" type="submit" value="Submit" />
                </form>
                <form action="sqldeletes.php?event_id=<?php echo $row->id; ?>" method="post">
                    <input id="button" name="deleteEvent" type="submit" value="Delete" />
                </form>
            </section>

            <?php require_once("inc/sidebar.inc"); ?>
            <?php require_once("inc/footer.inc"); ?>
        </div>
    </body>
</html>





