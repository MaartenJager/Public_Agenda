<?php
/* http://net.tutsplus.com/tutorials/php/why-you-should-be-using-phps-pdo-for-database-access/
 * http://www.kitebird.com/articles/php-pdo.html
 */

    /* Connect to DB */
    require("inc-dbcon.php");

    if(isset($_POST['deleteEvent'])){
        try{
            //Prepare variables
            $event_id = $_GET['event_id'];

            //Prepare statement
            $sth = $dbh->prepare("DELETE FROM events WHERE `id` = " . $event_id);

            $sth->execute();
        }

        catch(PDOException $e) {
            echo $e->getMessage();
        }
    }

    if(isset($_POST['deleteEvents'])){
        try{
            //Prepare variables
            $i = 0;
            $continue = true;
            while($continue) {
                $i++;
                if(isset($_POST["event_id$i"])) {
echo " 1";
                    if(isset($_POST["deleteSelection$i"])) {
                        $event_id = $_POST["event_id$i"];
echo " 2";

                        //Prepare statement
                        $sth = $dbh->prepare("DELETE FROM events WHERE `id` = " . $event_id);

                        $sth->execute();
                    }
                }
                else
                {
                    $continue = false;
                }
/*
                if(defined($_POST["deleteSelection$i"])) {
                    if(isset($_POST["deleteSelection$i"])) {
                        $event_id = $_POST["event_id$i"];

                        //Prepare statement
                        $sth = $dbh->prepare("DELETE FROM events WHERE `id` = " . $event_id);

                        $sth->execute();
                    }
                }
                else
                {
                    $continue = false;
                }
*/
            }
        }

        catch(PDOException $e) {
            echo $e->getMessage();
        }
    }

    $dbh = null;
?>


