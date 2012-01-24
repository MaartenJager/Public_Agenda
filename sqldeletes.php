<?php
/* http://net.tutsplus.com/tutorials/php/why-you-should-be-using-phps-pdo-for-database-access/
 * http://www.kitebird.com/articles/php-pdo.html
 */

    /* Connect to DB */
    require("inc-dbcon.php");


    function deleteEvent($id){
        try{
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

    /* Delete *ONE* event */
    if(isset($_GET['action'])){
        if( ($_GET['action']) == delete ){
            echo("action is DELETE");
        }
    }


    /* Delete *ONE* event */
    if(isset($_POST['deleteEvent'])){
        deleteEvent($_GET['event_id']);
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
            }
        }

        catch(PDOException $e) {
            echo $e->getMessage();
        }
    }

    $dbh = null;
?>


