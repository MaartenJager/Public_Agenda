<?php
/* http://net.tutsplus.com/tutorials/php/why-you-should-be-using-phps-pdo-for-database-access/
 * http://www.kitebird.com/articles/php-pdo.html
 */

    function deleteEvent($id){
        try{
            /* Connect to DB */
            require("inc-dbcon.php");

            //Prepare statement
            $sth = $dbh->prepare("DELETE FROM events WHERE `id` = :id");

            //Prepare data
            $sth->bindParam(':id', $id);
            $sth->execute();
        }

        catch(PDOException $e) {
            echo $e->getMessage();
        }

        $dhb = null;
    }
    function approveEvent($id){
        try{
            /* Connect to DB */
            require("inc-dbcon.php");

            //Prepare statement
            $sth = $dbh->prepare("UPDATE `webdb1241`.`events` SET `approvedBy` = '0' WHERE `events`.`id` = :id");

            //Prepare data
            $sth->bindParam(':id', $id);
            $sth->execute();
        }

        catch(PDOException $e) {
            echo $e->getMessage();
        }

        $dhb = null;
    }


    /* Controleer op DELETE actie */
    if(isset($_GET['action'])){
        if( ($_GET['action']) == "delete" ){
            echo("action is DELETE");

            /* Controleer of er een EVENT verwijderd dient te worden */
            if(isset($_GET['type'])){
                if( ($_GET['type']) == "event" ){
                    echo("type is EVENT");

                    /* Controleer of er een ID is meegestuurd */
                    if(isset($_GET['id'])){
                        $id = ($_GET['id']);
                        deleteEvent($id);
                    }
                }
            }

            /* Controleer of er een USER verwijderd dient te worden */
            elseif(isset($_GET['type'])){
                if( ($_GET['type']) == "user" ){
                    echo("type is USER");

                    /* Controleer of er een ID is meegestuurd */
                    if(isset($_GET['id'])){
                        $id = ($_GET['id']);
                        echo $id;
                    }
                }
            }
        }

        /*controleer voor approves*/
        elseif( ($_GET['action']) == "approve" ){
            /* Controleer of er een EVENT geaccepteert dient te worden */
            if(isset($_GET['type'])){
                if( ($_GET['type']) == "event" ){
                    echo("type is EVENT");

                    /* Controleer of er een ID is meegestuurd */
                    if(isset($_GET['id'])){
                        $id = ($_GET['id']);
                        approveEvent($id);
                    }
                }
            }
        }
    }

    /* Delete *MULTIPLE* events (used with checkboxes) */
    elseif(isset($_POST['deleteEvents'])){
        //Prepare variables
        $i = 0;
        $continue = true;
        while($continue) {
            $i++;
            if(isset($_POST["event_id$i"])) {
                if(isset($_POST["deleteSelection$i"])) {
                    deleteEvent($_POST["event_id$i"]);
                }
            }
            else
            {
                $continue = false;
            }
        }
    }
?>


