<?php
    /* http://net.tutsplus.com/tutorials/php/why-you-should-be-using-phps-pdo-for-database-access/
     * http://www.kitebird.com/articles/php-pdo.html
     * */

        /* Connect to DB */
        require("inc-dbcon.php");

            try{
                //Prepare statement
                $event_id = $_POST['event_id'];
                $sth = $dbh->prepare("DELETE FROM events WHERE `id` = " . $event_id);

                $sth->execute();
            }

            catch(PDOException $e) {
                echo $e->getMessage();
            }

            $dbh = null;
?>


