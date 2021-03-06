<?php
    /* http://net.tutsplus.com/tutorials/php/why-you-should-be-using-phps-pdo-for-database-access/
* http://www.kitebird.com/articles/php-pdo.html
* */
    session_start();

    if ($_SERVER['REQUEST_METHOD'] == 'POST'){

        //Check if user is logged in
        if (isset( $_SESSION['accessLevel']) ){
            /* Connect to DB */
            require("inc-dbcon.php");

            /* editUser post action */
            if(isset($_POST['editUser'])){
                echo "in editUser<br />";

                //Check if user is logged in
                if (isset( $_SESSION['accessLevel'] )){
                    echo "AccessLevel is geselecteerd<br />";

                    //Check for access level one
                    if ($_SESSION['accessLevel'] == 1){
                        echo "accessLevel is 1<br />";
                        echo "id uit form:   " . $_POST['id'] . "<br />";
                        echo "id uit sessie: " . $_SESSION['userId'] . "<br />";

                        //Check if trying to access other account
                        if( ($_POST['id']) != ($_SESSION['userId']) ){
                            header("Location: index.php?page=error-permissions");
                        }

                        //Check if trying to access own account
                        else{
                            echo "AccessLevel in form is gelijk aan daadwerkelijke accessLevel!<br />";
                        }
                    }

                    //Check for access level 2
                    elseif($_SESSION['accessLevel'] == 2){
                        echo "accessLevel is 2<br />";
                    }
                }

                if( ($_POST['password']) != ($_POST['password2']) ){
                    header("Location: index.php?page=error-password");
                }
                else
                {
                    $password = sha1($_POST['password']);
                    echo "Beide ingegeven passwords zijn gelijk<br />";

                    echo "Verbinding met DB wordt gelegd<br />";
                    $sth=$dbh->prepare("UPDATE users SET password=:password WHERE id=:id");
                    $sth->bindParam(':password', $password);
                    $sth->bindParam(':id', $_POST['id']);
                    $sth->execute();
                }
            }

            /* addUser post action */
            if(isset($_POST['addUser'])){
                $password = sha1($_POST['password']);
                $emailPattren = '/^([a-z0-9])(([-a-z0-9._])*([a-z0-9]))*\@([a-z0-9])' .
                    '(([a-z0-9-])*([a-z0-9]))+' . '(\.([a-z0-9])([-a-z0-9_-])?([a-z0-9])+)+$/i';
                $isEmailValid = preg_match($emailPattren, $_POST['email']);
                if ($isEmailValid == true){
                    try{
                        //Prepare statement
                        $sth = $dbh->prepare("INSERT INTO users (name, firstName, email, password, accessLevel)
                            values
                            (:name, :firstName, :email, :password, :accessLevel) ");

                        //Prepare data
                        $sth->bindParam(':name' , $_POST['name']);
                        $sth->bindParam(':firstName' , $_POST['firstName']);
                        $sth->bindParam(':email' , $_POST['email']);
                        $sth->bindParam(':password'   , $password);
                        $sth->bindParam(':accessLevel', $_POST['accessLevel']);

                        $sth->execute();
                    }

                    catch(PDOException $e) {
                        echo $e->getMessage();
                    }

                    $dbh = null;
                    header("Location: index.php?page=admin");
                }
                else
                {
                    echo "Ongeldig e-mailadress!<br />";
                }
            }

            /* editEvent post action */
            if(isset($_POST['editEvent'])){
                echo "in editEvent <br>";

                $arrayCheckboxes = checkGenres();
                $oneGenreSelected = false;
                foreach($arrayCheckboxes as &$checked){
                    if($checked){
                        $oneGenreSelected = true;
                    }
                }

                if($oneGenreSelected){
                    $beginDate = strip_tags($_POST['eventBeginDate']);
                    $endDate = strip_tags($_POST['eventEndDate']);

                    $beginDate = replaceSlashes($beginDate);
                    $endDate = replaceSlashes($endDate);

                    if (datesValid($beginDate, $endDate)){
                        //Alle condities waar item aan moet voldoen controleren (denk aan begin-, einddatum, volgorde van data correct etc...)
                        $urlImage = checkForUploadedImage();

                        //Convert beginDate to timestamp
                        list($dd, $mm, $yyyy) = explode('-', $beginDate);
                        $beginDateTimeStamp = mktime($_POST['eventBeginTimeHours'], $_POST['eventBeginTimeMinutes'], 0, $mm, $dd, $yyyy, -1);

                        //Convert endDate to timestamp
                        list($dd, $mm, $yyyy) = explode('-', $endDate);
                        $endDateTimeStamp = mktime($_POST['eventEndTimeHours'], $_POST['eventEndTimeMinutes'], 0, $mm, $dd, $yyyy, -1);

                        //Check if begin date is before end date
                        if ($beginDateTimeStamp<$endDateTimeStamp){

                            //Bij editen geéń nieuw plaatje geupload
                            if ($urlImage == "") {
                                $sth = $dbh->prepare("SELECT * FROM events WHERE id=:id");

                                //Prepare data
                                $id = strip_tags($_POST['id']);
                                $sth->bindParam(':id', $id);

                                $sth->setFetchMode(PDO::FETCH_OBJ);
                                $sth->execute();

                                $row = $sth->fetch();

                                //DEBUG
                                print_r($row);

                                $urlImage = $row->image;
                            }


                            $sth=$dbh->prepare("UPDATE events SET title=:eventName, beginDate=:beginDateTimeStamp, endDate=:endDateTimeStamp,
                                location=:location, description=:description, image=:image, creationDate=:creationDate, approvedBy=:approvedBy
                                WHERE id=:id");

                            //Prepare data
                            $eventName = strip_tags($_POST['eventName']);
                            $beginDateTimeStamp = strip_tags($beginDateTimeStamp);
                            $endDateTimeStamp = strip_tags($endDateTimeStamp);
                            $locationPicker = strip_tags($_POST['locationPicker']);
                            $eventDescription = strip_tags($_POST['eventDescription']);
                            $urlImage = strip_tags($urlImage);
                            $time = time();
                            $id = strip_tags($_POST['id']);
                            $sth->bindParam(':eventName' , $eventName);
                            $sth->bindParam(':beginDateTimeStamp' , $beginDateTimeStamp);
                            $sth->bindParam(':endDateTimeStamp' , $endDateTimeStamp);
                            $sth->bindParam(':location' , $locationPicker);
                            $sth->bindParam(':description', $eventDescription);
                            $sth->bindParam(':image', $urlImage);
                            $sth->bindParam(':creationDate', $time);
                            //$sth->bindParam(':approvedBy', );
                            $sth->bindValue(':approvedBy', 1);
                            $sth->bindParam(':id', $id);

                            $sth->execute();

                            $sth = $dbh->prepare("DELETE FROM `webdb1241`.`genre_event_koppeling` WHERE `genre_event_koppeling`.`eventId` =:id");
                            $sth->bindParam(':id', $id);
                            $sth->execute();

                            for($i=0; $i<8; $i++){

                                if ($arrayCheckboxes[$i]){
                                    $genreId = $i + 1;

                                    $sth=$dbh->prepare("INSERT INTO genre_event_koppeling (`eventId`, `genreId`)
                                        VALUES (:eventId, :genreId)");
                                    $sth->bindParam(':eventId', $id);
                                    $sth->bindParam(':genreId', $genreId);
                                    $sth->execute();

                                    echo "EEN GENRE OPGESLAGEN <br />";
                                }
                            }
                            $dbh = null;
                            header("Location: index.php?page=event-accept");
                        }
                        else
                        {
                            echo "Data-combinatie niet geldig (event mag niet eerder eindigen dan beginnen)!<br />";
                        }
                    }
                    else
                    {
                        echo "Ongeldige datum!<br />";
                    }
                }
                else
                {
                    echo "Geen genre geselecteerd.<br />";
                }
            }

            /* addEvent post action */
            if(isset($_POST['addEvent'])){
                echo "in addEvent <br>";

                $arrayCheckboxes = checkGenres();
                $oneGenreSelected = false;
                foreach($arrayCheckboxes as &$checked){
                    if($checked){
                        $oneGenreSelected = true;
                    }
                }

                if($oneGenreSelected){

                    $beginDate = $_POST['eventBeginDate'];
                    $endDate = $_POST['eventEndDate'];

                    $beginDate = replaceSlashes($beginDate);
                    $endDate = replaceSlashes($endDate);

                    if (datesValid($beginDate, $endDate)){
                        //Get image
                        $urlImage = checkForUploadedImage();

                        //Convert beginDate to timestamp
                        list($dd, $mm, $yyyy) = explode('-', $beginDate);
                        $beginDateTimeStamp = mktime($_POST['eventBeginTimeHours'], $_POST['eventBeginTimeMinutes'], 0, $mm, $dd, $yyyy, -1);

                        //Convert endDate to timestamp
                        list($dd, $mm, $yyyy) = explode('-', $endDate);
                        $endDateTimeStamp = mktime($_POST['eventEndTimeHours'], $_POST['eventEndTimeMinutes'], 0, $mm, $dd, $yyyy, -1);

                        //Check if begin date is before end date
                        if ($beginDateTimeStamp<$endDateTimeStamp){

                            //Add to DB
                            require("inc-dbcon.php");
                            $sth = $dbh->prepare("INSERT INTO events (title, beginDate, endDate, location, description, image, creationDate, approvedBy, createdBy)
                                VALUES
                                (:eventName, :beginDateTimeStamp, :endDateTimeStamp, :location, :description, :image, :creationDate, :approvedBy, :createdBy)");

                            //Prepare data
                            $eventName = strip_tags($_POST['eventName']);
                            $beginDateTimeStamp = strip_tags($beginDateTimeStamp);
                            $endDateTimeStamp = strip_tags($endDateTimeStamp);
                            $locationPicker = strip_tags($_POST['locationPicker']);
                            $eventDescription = strip_tags($_POST['eventDescription']);
                            $urlImage = strip_tags($urlImage);
                            $time = time();

                            $sth->bindParam(':eventName' , $eventName);
                            $sth->bindParam(':beginDateTimeStamp' , $beginDateTimeStamp);
                            $sth->bindParam(':endDateTimeStamp' , $endDateTimeStamp);
                            $sth->bindParam(':location' , $locationPicker);
                            $sth->bindParam(':description', $eventDescription);
                            $sth->bindParam(':image', $urlImage);
                            $sth->bindParam(':creationDate', $time);
                            $sth->bindParam(':createdBy', $_SESSION['userId']);

                            //Automatic approval for users with acceslevel 2
                            if( $_SESSION['accessLevel'] == 2) {
                                echo "AccesLevel is 2, het event is automatisch goedgekeurd!<br />";
                                $sth->bindParam(':approvedBy', $_SESSION['userId']);
                            }
                            else
                            {
                                "AccesLevel is 1, het event moet nog goedgekeurd worden door een administartor.<br />";
                                $sth->bindValue(':approvedBy', null, PDO::PARAM_INT);
                            }

                            $sth->execute();

                            //Find last even id
                            $sth=$dbh->prepare("SELECT id FROM events ORDER BY id DESC LIMIT 1");
                            $sth->execute();
                            $row = $sth->fetch();
                            $lastEventId = $row['id'];

                            $arrayCheckboxes = checkGenres();

                            for($i=0; $i<8; $i++){

                                if ($arrayCheckboxes[$i]){
                                    $genreId = $i + 1;  

                                    $sth=$dbh->prepare("INSERT INTO genre_event_koppeling (`eventId`, `genreId`)
                                        VALUES (:eventId, :genreId)");
                                    $sth->bindParam(':eventId', $lastEventId);
                                    $sth->bindParam(':genreId', $genreId);
                                    $sth->execute();
                                }
                            }
                            $dbh = null;
                            header("Location: index.php?page=event-add");
                        }
                        else
                        {
                            echo "Data-combinatie niet geldig (event mag niet eerder eindigen dan beginnen)!<br />";
                        }
                    }
                }
                else
                {
                    echo "Er is geen genre geselecteerd. Selecteer aub minstens 1 genre.<br />";
                }
            }
        }
        else
        {
            header("Location: index.php?page=error-permissions");
        }
    }


    /* Functions */
    function checkGenres(){
        $arrayCheckboxes = array_fill(0, 8, FALSE);

        if( isset($_POST['genre_pop']) ){
            $arrayCheckboxes[0] = TRUE;
        }

        if( isset($_POST['genre_rock']) ){
            $arrayCheckboxes[1] = TRUE;
        }

        if( isset($_POST['genre_metal']) ){
            $arrayCheckboxes[2] = TRUE;
        }

        if( isset($_POST['genre_hiphop']) ){
            $arrayCheckboxes[3] = TRUE;
        }

        if( isset($_POST['genre_blues']) ){
            $arrayCheckboxes[4] = TRUE;
        }

        if( isset($_POST['genre_classic']) ){
            $arrayCheckboxes[5] = TRUE;
        }

        if( isset($_POST['genre_church']) ){
            $arrayCheckboxes[6] = TRUE;
        }

        if( isset($_POST['genre_other']) ){
            $arrayCheckboxes[7] = TRUE;
        }

        return $arrayCheckboxes;
    }

    function replaceSlashes($date){
        return str_replace("/", "-", $date);
    }

    function datesValid($beginDate, $endDate){
        /* FIXME: code nalopen*/
        $date = $beginDate;
        list($dd, $mm, $yyyy) = explode('-', $date);

        if (is_numeric($dd) && is_numeric($mm) && is_numeric($yyyy)){

            if (checkdate($mm,$dd,$yyyy)){
                $date = $endDate;
                list($dd, $mm, $yyyy) = explode('-', $date);

                if (is_numeric($dd) && is_numeric($mm) && is_numeric($yyyy)){
                    if (checkdate($mm,$dd,$yyyy)){
                        echo "Data zijn geldig.<br/>";
                        return TRUE;
                    }
                    else
                    {
                        echo "Eind datum is geen geldige datum!<br />";
                    }
                }
                else
                {
                    echo "Eind datum is niet numeriek of in de dd-mm-yyyy notatie!<br />";
                }
            }
            else
            {
            echo "Begin datum is geen geldige datum!<br />";
            }
        }
        else
        {
            echo "Begin datum is niet numeriek of in de dd-mm-yyyy notatie!<br />";
        }
        return FALSE;
    }

    function checkForUploadedImage(){
        $urlImage = "";
        //Image upload
        $targetPath = "uploads/";

        //random filename between 0 and 1 billion - 1 for final storage
        $imgFileName = mt_rand(0, 99999999);

        $orgFileName = $_FILES['file']['name'];
        //get fileextension
        $temp = explode(".", $orgFileName);
        $fileExtension = end($temp);
        //define final path for storage of img
        $targetPath = $targetPath . $imgFileName . ".". $fileExtension;

        //check extensions & filesize < 200000k
        if ((($_FILES["file"]["type"] == "image/gif")
          || ($_FILES["file"]["type"] == "image/jpeg")
          || ($_FILES["file"]["type"] == "image/pjpeg")) // old IE browser notation
          && ($_FILES["file"]["size"] < 50000000)){
            if ($_FILES["file"]["error"] > 0){
                echo "Error: " . $_FILES["file"]["error"] . "<br />";
            }
            else{
                echo "Upload: " . $_FILES["file"]["name"] . "<br />";
                echo "Type: " . $_FILES["file"]["type"] . "<br />";
                echo "Grootte: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";

                //save file to disk & check for upload image
                if(move_uploaded_file($_FILES['file']['tmp_name'], $targetPath)){

                    //correct
                    $urlImage = "http://websec.science.uva.nl/webdb1241/" . $targetPath;
                }
                else
                {
                    echo "Er is een fout opgetreden bij het uploaden van de afbeelding!<br />";
                    $urlImage = "";
                }
            }
        }
        else
        {
            echo "Ongeldige file, afbeelding moet van het formaat gif of jpeg zijn!<br />";
        }
        return $urlImage;
    }

$dbh = null;
?>
