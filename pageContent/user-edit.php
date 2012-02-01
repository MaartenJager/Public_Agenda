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
        if (isset( $_SESSION['accessLevel'] )){
            if ( ($_SESSION['accessLevel'] == 1) || ($_SESSION['accessLevel'] == 2) ){
                /* Fetch event with ID.. */
                require_once("inc-conf.php");
                require("inc-dbcon.php");

                $sth = $dbh->prepare("SELECT * FROM users WHERE id=:id");
                $sth->bindParam(':id', $id);
                $sth->setFetchMode(PDO::FETCH_OBJ);
                $sth->execute();
                $row = $sth->fetch();
            }
        }
    ?>

    <form action="formhandler.php" method="post">
        <label>Voornaam</label>
        <input type="text" name="firstName" value="<?php echo $row->firstName ?>" disabled="disabled">

        <label>Achternaam</label>
        <input type="text" name="name" value="<?php echo $row->name ?>" disabled="disabled">

        <label>Email (tevens de login naam)</label>
        <input type="email" name="email" value="<?php echo $row->email ?>" disabled="disabled">

        <label>Wachtwoord</label>
        <input type="password" name="password" value="" required>

        <label>Wachtwoord bevestigen</label>
        <input type="password" name="password2" value="" required>

        <input type="hidden" name="id" value="<? echo $id ?>">

        <input id="button" name="editUser" type="submit" value="Update">
    </form>


<?php else: ?>
    <p>U bent niet ingelogd, geen profiel om weer te geven!</p>
<?php endif; ?>
