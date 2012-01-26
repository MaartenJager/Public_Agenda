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
        if(isset($_POST['editEvent'])){

            echo "in editEvent";

            /* TODO !!!!!!! */

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


        /* addEvent post action */
        if(isset($_POST['addEvent'])){
            $arrayCheckboxes = array_fill(0, 8, FALSE);

            if( isset($_POST['genre_pop']) )
            {
                $arrayCheckboxes[0] = TRUE;
            }
            if( isset($_POST['genre_rock']) )
            {
                $arrayCheckboxes[1] = TRUE;
            }
            if( isset($_POST['genre_metal']) )
            {
                $arrayCheckboxes[2] = TRUE;
            }
            if( isset($_POST['genre_hiphop']) )
            {
                $arrayCheckboxes[3] = TRUE;
            }
            if( isset($_POST['genre_blues']) )
            {
                $arrayCheckboxes[4] = TRUE;
            }
            if( isset($_POST['genre_classic']) )
            {
                $arrayCheckboxes[5] = TRUE;
            }
            if( isset($_POST['genre_church']) )
            {
                $arrayCheckboxes[6] = TRUE;
            }
            if( isset($_POST['genre_other']) )
            {
                $arrayCheckboxes[7] = TRUE;
            }

            if (isDatumValid())
            {
                //Image upload
                $targetPath = "uploads/";

                //random filename between 0 and 1 billion - 1 for final storage
                $imgFileName = mt_rand(0, 99999999);

                $orgFileName = $_FILES['file']['name'];
                //get fileextension.. somehow causes a warning but works perfectly
                $fileExtension = end(explode(".", $orgFileName));
                //define final path for storage of img
                $targetPath = $targetPath . $imgFileName . ".". $fileExtension;

                if ((($_FILES["file"]["type"] == "image/gif")
                || ($_FILES["file"]["type"] == "image/jpeg")
                || ($_FILES["file"]["type"] == "image/pjpeg")) // oude IE browsers zijn raar
                && ($_FILES["file"]["size"] < 20000))
                {
                    if ($_FILES["file"]["error"] > 0)
                    {
                        echo "Error: " . $_FILES["file"]["error"] . "<br />";
                    }
                    else
                    {
                        echo "Upload: " . $_FILES["file"]["name"] . "<br />";
                        echo "Type: " . $_FILES["file"]["type"] . "<br />";
                        echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
                        echo "Will be temp stored in: " . $_FILES["file"]["tmp_name"] . "<br />";


                        if(move_uploaded_file($_FILES['file']['tmp_name'], $targetPath))
                        {
                            echo "The file with original name ".  basename( $_FILES['file']['name']).
                            " has been uploaded in and with new file name: ". $targetPath . "<br />";
                        }
                        else
                        {
                            echo "There was an error uploading the file, please try again!<br />";
                        }
                    }
                }
                else
                {
                    echo "Invalid file<br />";
                }


                //correct
                $urlImage = "http://websec.science.uva.nl/webdb1241/" . $targetPath;



                //dates
                $date = $_POST['eventBeginDate'];

                list($dd, $mm, $yyyy) = explode('-', $date);
                $beginDateTimeStamp = mktime($_POST['eventBeginTimeHours'], $_POST['eventBeginTimeMinutes'], 0, $mm, $dd, $yyyy, -1);
                $date = $_POST['eventEndDate'];
                list($dd, $mm, $yyyy) = explode('-', $date);
                $endDateTimeStamp = mktime($_POST['eventEndTimeHours'], $_POST['eventEndTimeMinutes'], 0, $mm, $dd, $yyyy, -1);
                require("inc-dbcon.php");
                $sth=$dbh->prepare("INSERT INTO events (title, beginDate, endDate, location, description, image, creationDate, approvedBy)
                VALUES
                ('$_POST[eventName]', '$beginDateTimeStamp', '$endDateTimeStamp', '$_POST[locationPicker]', '$_POST[eventDescription]', '$urlImage', " . time() . ", NULL)");
                    $sth->execute();

                for($i=0; $i<8; $i++)
                {
                    if ($arrayCheckboxes[$i])
                    {
                        echo "EEN GENRE OPGESLAGEN <br />";
                        $sth=$dbh->prepare("SELECT id FROM events ORDER BY id DESC LIMIT 1");
                        $sth->execute();
                        $row = $sth->fetch();
                        $event_id = $row['id'];
                        $genreId = $i + 1;
                        $sth=$dbh->prepare("INSERT INTO genre_event_koppeling (`eventId`, `genreId`)
                        VALUES ($event_id, $genreId)");
                        $sth->execute();
                    }
                }
            }
            else
            {
                echo "incorrecte datum<br/>";
            }
        }
    }

    /* Functions */
    function isDatumValid()
    {
        $date = $_POST['eventBeginDate'];
        list($dd, $mm, $yyyy) = explode('-', $date);
        if (is_numeric($dd) && is_numeric($mm) && is_numeric($yyyy))
        {
            if (checkdate($mm,$dd,$yyyy))
            {
                $date = $_POST['eventEndDate'];
                list($dd, $mm, $yyyy) = explode('-', $date);
                if (is_numeric($dd) && is_numeric($mm) && is_numeric($yyyy))
                {
                    if (checkdate($mm,$dd,$yyyy))
                    {
                        echo "Entry dates are correct<br/>";
                        return TRUE;
                    }
                    else
                    {
                        echo "End date is numeric but not a valid date<br />";
                    }
                }
                else
                {
                    echo "Begin date is not numeric or in format dd-mm-yyyy<br />";
                }
            }
            else
            {
                echo "Begin date is numeric but not a valid date<br />";
            }
        }
        else
        {
            echo "Begin date is not numeric or in format dd-mm-yyyy<br />";
        }
        return FALSE;
    }

?>


