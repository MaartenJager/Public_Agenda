<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $con = mysql_connect("localhost","webdb1241","qetha8ra");
        if(!$con)
        {
            die('Er is een fout opgetreden. Er kon geen verbinding met de server gemaakt worden.');
        }
        mysql_select_db("webdb1241", $con);

        /* addUser post action*/    
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
        
        /* getUser post action*/  
        if (isset($_POST['getUser'])) {
            echo("Get user form gebruikt");

            $name = $_POST['name'];
            $result = mysql_query("SELECT * FROM users WHERE name='$name'");

            while($row = mysql_fetch_array($result))
                {
                echo "   ";
                echo "ID/Voornaam/Achternaam: " . $row['id'] . "/" . $row['firstName'] . "/" . $row['name'];
                echo "   ";
                }
            mysql_close($con);
        }

        /* getAllUsers post action*/
        if (isset($_POST['getAllUsers'])) {
            echo("Get user form gebruikt");
            
            $name = $_POST['name'];
            $result = mysql_query("call test()");
            while($row = mysql_fetch_array($result))
                {
                echo "   ";
                echo "ID/Voornaam/Achternaam: " . $row['id'] . "/" . $row['firstName'] . "/" . $row['name'];
                echo "   ";
                }
            mysql_close($con);
        }

    }
?>
