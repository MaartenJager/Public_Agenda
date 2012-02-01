<h1>Profiel</h1>

<?php if (isset( $_SESSION['accessLevel'] )): ?>
    <?php if ($_SESSION['accessLevel'] == 1): ?>
        <?php
            echo "<p>DBG: lvl1, (GEEN id in URL):</p>"; 
            echo "<p>Hieronder is uw profiel in te zien/te bewerken:</p>";
            $id = $_SESSION['userId'];
        ?>
       
        
    <?php elseif ($_SESSION['accessLevel'] == 2): ?>
        <?php
            //Rechten om iemand anders zijn profiel aan te passen, haal id uit URL
            if (isset($_GET['id']) ){
                echo "<p>DBG: lvl2, id in URL:</p>";                
                echo "<p>Hieronder is het opgevraagde profiel in te zien/te bewerken:</p>";
                $id = strip_tags($_GET['id']);
            }
            //Indien geen id meegegeven in URL geef dan huidige ingelogd gebruiker in
            else{
                print_r($_GET);
                echo "<p>DBG: lvl2, GEEN id in URL:</p>";   
                echo "<p>Hieronder is uw profiel in te zien/te bewerken:</p>";
                $id = $_SESSION['userId'];
            }
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
