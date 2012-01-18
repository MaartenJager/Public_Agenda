<?php
    $host   = "localhost";
    $dbname = "webdb1241";
    $user   = "webdb1241";
    $pass   = "qetha8ra";


    if ($_SERVER['REQUEST_METHOD'] == 'POST'){

        try{
            $DBH = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
            echo("Verbinding succesvol!");
        }

        catch(PDOException $e) {
            echo $e->getMessage();
        }

        /* addUser post action
        if (isset($_POST['addUser'])) {
            echo("addUser form gebruikt");

            $sql="INSERT INTO users (name, firstName, email, password, accessLevel)
            VALUES
            ('$_POST[name]','$_POST[firstName]','$_POST[email]','$_POST[password]','$_POST[accessLevel]')";

            if (!mysql_query($sql,$con))
            {
                die('Er is een fout opgetreden.');
            }

            echo "De gebruiker is succesvol toegevoegd.";
            mysql_close($con);
        }
        */
    }
?>
