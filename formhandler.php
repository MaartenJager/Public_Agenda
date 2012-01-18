<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $con = mysql_connect("localhost","webdb1241","qetha8ra");
        if(!$con)
        {
            die('Er is een fout opgetreden. Er kon geen verbinding met de server gemaakt worden.');
        }
            
        if (isset($_POST['addUser'])) {
            mysql_select_db("webdb1241", $con);

            $sql="INSERT INTO users (name, firstName, email, password, accessLevel)
            VALUES
            ('$_POST[name]','$_POST[firstName]','$_POST[email]','$_POST[password]','$_POST[accessLevel]')";

            if (!mysql_query($sql,$con))
            {
                die('Er is een fout opgetreden.');
            }

            echo "De gebruiker is succesvol toegevoegd.";
            mysql_close($con)
        }
        
        if (isset($_POST['getUser'])) {
            echo("Get user form gebruikt");
        }

        if (isset($_POST['getAllUsers'])) {
            echo("Get user form gebruikt");
        }
    }
?>
