<?php
    /* http://net.tutsplus.com/tutorials/php/why-you-should-be-using-phps-pdo-for-database-access/ */
    require_once("inc-conf.php");

    if ($_SERVER['REQUEST_METHOD'] == 'POST'){

        /* Try to create a new DB connection
         * DBH: Database Handle
         */


        try{
            # STH: "Statement Handle"
            echo("in tweede try..");
            $STH = $DBH->prepare("INSERT INTO users (name, firstName, email, password, accessLevel)
                values
                ('$_POST[name]','$_POST[firstName]','$_POST[email]','$_POST[password]','$_POST[accessLevel]') ");
            $STH->execute();
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

        /* Close connection */
        $DBH = null;
    }
?>
