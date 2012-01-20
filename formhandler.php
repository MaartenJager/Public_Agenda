<?php
    /* http://net.tutsplus.com/tutorials/php/why-you-should-be-using-phps-pdo-for-database-access/
     * http://www.kitebird.com/articles/php-pdo.html
     * */

    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        /* Connect to DB */
        require("inc-dbcon.php");

        /* addUser post action */
        if(isset($_POST['addUser'])){
            try{
                //Prepare statement
                $sth = $dbh->prepare("INSERT INTO users (name, firstName, email, password, accessLevel)
                    values
                    (:name, :firstName, :email, :password, :accessLevel) ");

                //Prepare data
                $sth->bindParam(':name'       , $_POST[name]);
                $sth->bindParam(':firstName'  , $_POST[firstName]);
                $sth->bindParam(':email'      , $_POST[email]);
                $sth->bindParam(':password'   , $_POST[password]);
                $sth->bindParam(':accessLevel', $_POST[accessLevel]);

                $sth->execute();
            }

            catch(PDOException $e) {
                echo $e->getMessage();
            }

            $dbh = null;
        }

        elseif(isset($_POST['addEvent'])){
            try{
                //Prepare statement
                $sth = $dbh->prepare("INSERT INTO users (name, firstName, email, password, accessLevel)
                    values
                    (:name, :firstName, :email, :password, :accessLevel) ");

                //Prepare data
                $sth->bindParam(':name'       , $_POST[name]);
                $sth->bindParam(':firstName'  , $_POST[firstName]);
                $sth->bindParam(':email'      , $_POST[email]);
                $sth->bindParam(':password'   , $_POST[password]);
                $sth->bindParam(':accessLevel', $_POST[accessLevel]);

                $sth->execute();
            }

            catch(PDOException $e) {
                echo $e->getMessage();
            }

            $dbh = null;

        }

        if (isset($_POST['deleteEvent'])) {
            try{
                //Prepare statement
                $sth = $dbh->prepare("DELETE FROM events WHERE `id` = " . &_POST['event_id']);

                $sth->execute();
            }

            catch(PDOException $e) {
                echo $e->getMessage();
            }

            $dbh = null;
        }
    }
?>


