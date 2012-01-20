<?php
    /* http://net.tutsplus.com/tutorials/php/why-you-should-be-using-phps-pdo-for-database-access/
     * http://www.kitebird.com/articles/php-pdo.html
     * */

    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        /* Connect to DB */
        require("inc-dbcon.php");

        if (isset($_POST['deleteEvent'])) {
            try{
                //Prepare statement
                $event_id = &_post['event_id'];
                $sth = $dbh->prepare("DELETE FROM events WHERE `id` = " . $event_id]);

                $sth->execute();
            }

            catch(PDOException $e) {
                echo $e->getMessage();
            }

            $dbh = null;
        }
    }
?>


