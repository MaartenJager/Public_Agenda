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
                $sth->bindParam(':name'       , $_POST['name']);
                $sth->bindParam(':firstName'  , $_POST['firstName']);
                $sth->bindParam(':email'      , $_POST['email']);
                $sth->bindParam(':password'   , $_POST['password']);
                $sth->bindParam(':accessLevel', $_POST['accessLevel']);

                $sth->execute();
            }

            catch(PDOException $e) {
                echo $e->getMessage();
            }

            $dbh = null;
        }


        /* addEvent post action */
        if(isset($_POST['addEvent'])){
            try{
                //Prepare statement
                $sth = $dbh->prepare("INSERT INTO event (title, beginDate, endDate, location, description, createdBy, image, creationDate, approvedBy)
                    values
                    (:title, :beginDate, :endDate, :location, :description, :createdBy, :image, :creationDate, :approvedBy) ");

                //Prepare data
                $sth->bindParam(':title'       , $_POST['title']);
                $sth->bindParam(':beginDate'   , $_POST['beginDate']);
                $sth->bindParam(':endDate'     , $_POST['endDate']);
                $sth->bindParam(':location'    , $_POST['location']);
                $sth->bindParam(':description' , $_POST['description']);
                $sth->bindParam(':createdBy'   , $_POST['createdBy']);
                $sth->bindParam(':image'       , $_POST['image']);
                $sth->bindParam(':creationDate', $_POST['creationDate']);
                $sth->bindParam(':approvedBy'  , $_POST['approvedBy']);

                $sth->execute();
            }

            catch(PDOException $e) {
                echo $e->getMessage();
            }

            $dbh = null;
        }

        /* addEvent post action */
        if(isset($_POST['editEvent'])){

            echo "in editEvent";

            /*
            try{
                //Prepare statement
                $sth = $dbh->prepare("INSERT INTO event (title, beginDate, endDate, location, description, createdBy, image, creationDate, approvedBy)
                    values
                    (:title, :beginDate, :endDate, :location, :description, :createdBy, :image, :creationDate, :approvedBy) ");

                //Prepare data
                $sth->bindParam(':title'       , $_POST['title']);
                $sth->bindParam(':beginDate'   , $_POST['beginDate']);
                $sth->bindParam(':endDate'     , $_POST['endDate']);
                $sth->bindParam(':location'    , $_POST['location']);
                $sth->bindParam(':description' , $_POST['description']);
                $sth->bindParam(':createdBy'   , $_POST['createdBy']);
                $sth->bindParam(':image'       , $_POST['image']);
                $sth->bindParam(':creationDate', $_POST['creationDate']);
                $sth->bindParam(':approvedBy'  , $_POST['approvedBy']);

                $sth->execute();
            }

            catch(PDOException $e) {
                echo $e->getMessage();
            }

            $dbh = null;
            */

        }










    }
?>


