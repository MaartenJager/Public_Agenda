<h1>Profiel</h1>

<?php if (isset( $_SESSION['accessLevel'] )): ?>
    <?php
        /* Fetch event with ID.. */
        require_once("inc-conf.php");
        require("inc-dbcon.php");

        $sth = $dbh->prepare("SELECT * FROM users WHERE id=:id");
        $id = strip_tags($_GET['id']);
        $sth->bindParam(':id', $id);
        $sth->setFetchMode(PDO::FETCH_OBJ);
        $sth->execute();
    ?>

    <?php if ($_SESSION['accessLevel'] == 1): ?>
        <p>Hieronder worden uw gegevens weergegeven zoals deze bij ons bekend zijn:</p>
        
        
        
    <?php elseif ($_SESSION['accessLevel'] == 2): ?>
        <!--- ingelogd met level 2 -->
    <?php else: ?>
        Wel ingelogd, geen rechten!?
    <?php endif; ?>

<?php else: ?>
    <p>U bent niet ingelogd, geen profiel om weer te geven!</p>
<?php endif; ?>
