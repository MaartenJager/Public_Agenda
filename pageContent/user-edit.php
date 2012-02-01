<h1>Profiel</h1>

<?php if (isset( $_SESSION['accessLevel'] )): ?>
    <?php if ($_SESSION['accessLevel'] == 1): ?>
        <p>Hieronder worden uw gegevens weergegeven zoals deze bij ons bekend zijn:</p>
        <?php
            //Rechten om alleen eigen profiel aan te passen
            $id = $_SESSION['userId'];
        ?>
       
        
    <?php elseif ($_SESSION['accessLevel'] == 2): ?>
        <p>Hieronder is het opgevraagde profiel in te zien/te bewerken:</p>
        <?php
            //Rechten om iemand anders zijn profiel aan te passen, haal id uit G
            $id = strip_tags($_GET['id']);
        ?>
    <?php else: ?>
        Wel ingelogd, geen rechten!?
    <?php endif; ?>

    <?php
    /* Fetch event with ID.. */
        require_once("inc-conf.php");
        require("inc-dbcon.php");

        $sth = $dbh->prepare("SELECT * FROM users WHERE id=:id");
        $sth->bindParam(':id', $id);
        $sth->setFetchMode(PDO::FETCH_OBJ);
        $sth->execute();
    ?>

    
    <p>
        id: <?php echo $id; ?>
        <?php
            $row = $sth->fetch();
            print_r($row);
        ?>
    </p>
    

<?php else: ?>
    <p>U bent niet ingelogd, geen profiel om weer te geven!</p>
<?php endif; ?>
