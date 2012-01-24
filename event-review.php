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
            function beginDateAndUnix() {
                document.getElementById('beginDateUnixCalc').style.display = 'block';
                document.getElementById('beginDateUnixButton').style.display = 'none';
                var temp = document.event.beginDate.value;
                var date = new Date(temp * 1000);       
                document.getElementById('beginDate').innerHTML="Datum: " + date;
            }
        
            function endDateAndUnix() {
                document.getElementById('endDateUnixCalc').style.display = 'block';
                document.getElementById('endDateUnixButton').style.display = 'none';
                var temp = document.event.endDate.value;
                var date = new Date(temp * 1000);       
                document.getElementById('endDate').innerHTML="Datum: " + date;
            }
        
            function beginDateAutoFill() {
                var temp = document.event.beginDateReal.value;
                var date = new Date(temp);
                var string = date.valueOf() / 1000; 
                document.event.beginDate.value = string;
            }
            
            function endDateAutoFill() {
                var temp = document.event.endDateReal.value;
                var date = new Date(temp);
                var string = date.valueOf() / 1000; 
                document.event.endDate.value = string;
            }
        </script>
    </head>
    
    <body>
        <div id="container">
            <div id="header" role="banner"></div>
            <?php require_once("inc/nav.inc"); ?>

            <section id="main" role="main">
                <header class="pageTitle"><h1>Evenement bewerken</h1></header>

                <form name="event" action="sqlaction.php" method="post">

                    <input type="hidden" name="event_id" value="<?php $row->id; ?>">

                    <label>Naam evenement</label>
                    <input name="eventName" value="<?php echo $row->title; ?>" required>		

                    <label>Begindatum/-tijd</label>
                    <input name="beginDate" placeholder="Unixtimestamp (tmp)" value="<?php echo $row->beginDate; ?>"required>
                    <div id="beginDateUnixButton">
                        <input id="buttonSmall" value="Timestamp Calc" onclick="beginDateAndUnix();" />
                    </div>
                    
                    <div id="beginDateUnixCalc">
                        <p id="beginDate"></p>
                        <p>Nieuwe datum invoeren:</p>
                        <input name="beginDateReal" value="vb: 12/31/2013 23:59:59">
                        <input id="buttonSmall" value="Vul timestamp in" onclick="beginDateAutoFill();" />
                    </div>


                    <label>Einddatum/-tijd</label>
                    <input name="endDate" placeholder="Unixtimestamp (tmp)" value="<?php echo $row->endDate; ?>"required>
                    <div id="endDateUnixButton">
                        <input id="buttonSmall" value="Timestamp Calc" onclick="endDateAndUnix();" />
                    </div>

                    <div id="endDateUnixCalc">
                        <p id="endDate"></p>
                        <p>Nieuwe datum invoeren:</p>
                        <input name="endDateReal" value="vb: 12/31/2013 23:59:59">
                        <input id="buttonSmall" value="Vul timestamp in" onclick="endDateAutoFill();" />
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





