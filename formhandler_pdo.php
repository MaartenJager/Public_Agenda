<?php
    /* http://net.tutsplus.com/tutorials/php/why-you-should-be-using-phps-pdo-for-database-access/
     * http://www.kitebird.com/articles/php-pdo.html
     * */
    require_once("inc-conf.php");

    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        /* Connect to DB */
        require("inc-dbcon.php");


        try{
                echo("in tweede try..");

                /* Prepare statement */
                $STH = $DBH->prepare("INSERT INTO users (name, firstName, email, password, accessLevel)
                    values
                    (:name, :firstName, :email, :password, :accessLevel) ");

                /* Prepare data */
                $STH->bindParam(':name'       , $_POST[name]);
                $STH->bindParam(':firstName'  , $_POST[firstName]);
                $STH->bindParam(':email'      , $_POST[email]);
                $STH->bindParam(':password'   , $_POST[password]);
                $STH->bindParam(':accessLevel', $_POST[accessLevel]);

                $STH->execute();
            }

            catch(PDOException $e) {
                echo $e->getMessage();
            }

        /* addUser post action
        if (isset($_POST['addUser'])) {

        }
        */

        /* Close connection */
        $DBH = null;
    }
?>
