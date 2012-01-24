<?php
    require("inc-conf.php");

    try{
        $dbh = new PDO("mysql:host=$DB_host;dbname=$DB_name", $DB_user, $DB_pass);

        /* Set error mode. Fire an exception in case of errors */
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    catch(PDOException $e){
        echo $e->getMessage();
    }
?>
