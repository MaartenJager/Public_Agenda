<h1>Profiel</h1>

<?php //Controleer of bezoeker ingelogd is ?>
<?php if (isset( $_SESSION['accessLevel'] )): ?>
    <?php if ($_SESSION['accessLevel'] == 1): ?>
        <?php
            //Gebruiker met niveau 1; kan alleen zijn eigen profiel inzien en bewerken
            echo "<p>Hieronder is uw profiel in te zien/te bewerken:</p>";
            $id = $_SESSION['userId'];
        ?>
       
        
    <?php elseif ($_SESSION['accessLevel'] == 2): ?>
        <?php
            //Gebruiker met niveau 2; kan zowel zijn eigen als iemand anders zijn profiel inzien en bewerken
            //Haal id uit URL
            if (isset($_GET['id']) ){       
                echo "<p>Hieronder is het opgevraagde profiel in te zien/te bewerken:</p>";
                $id = strip_tags($_GET['id']);
            }
            //Indien geen id meegegeven in URL geef dan huidige ingelogd gebruiker in
            //(gebruiker past eigen profiel aan)
            else{ 
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
