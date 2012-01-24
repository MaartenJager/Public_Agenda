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
    }

    /* Delete *MULTIPLE* events (used with checkboxes) */
    if(isset($_POST['deleteEvents'])){
        try{
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

        catch(PDOException $e) {
            echo $e->getMessage();
        }
    }

    $dbh = null;
?>


