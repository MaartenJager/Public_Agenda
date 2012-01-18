<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $con = mysql_connect("localhost","webdb1241","qetha8ra");
        if(!$con)
        {
            die('Er is een fout opgetreden. Er kon geen verbinding met de server gemaakt worden.');
        }

        /* addUser post action*/    
        if (isset($_POST['addUser'])) {
            echo("addUser form gebruikt");
        }
        
        /* getUser post action*/  
        if (isset($_POST['getUser'])) {
            echo("Get user form gebruikt");
        }

        /* getAllUsers post action*/
        if (isset($_POST['getAllUsers'])) {
            echo("Get user form gebruikt");
        }

    }
?>
