<?php
/* Fetch all events from table EVENTS */
    require_once("inc-conf.php");
    require("inc-dbcon.php");

    $query = "    SELECT events.* , users.name, users.firstName, locations.name AS locationName, genre_event_koppeling.genreId
    FROM events
    INNER JOIN users ON ( events.createdBy = users.id )
    INNER JOIN locations ON ( events.location = locations.id )
    INNER JOIN genre_event_koppeling ON ( events.id = genre_event_koppeling.eventId )
    WHERE approvedBy IS NOT NULL";
    $wordSearch = false;
    $dateSearch = false;
    $firstMonthSearch = 1;
    $lastMonthSearch = 12;
    $firstDaySearch = 1;
    $lastDaySearch = 31;
    if(isset($_POST['search'])){
        if(isset($_POST['eventName']) && $_POST['eventName']!=""){
            $query = $query . " AND (title LIKE :eventName OR description LIKE :eventName)";
            $wordSearch = true;
        }
        if(isset($_POST['searchYear']) && $_POST['searchYear']!=00){
            $query = $query . " AND ((beginDate>:firstDate AND beginDate<:lastDate) OR (endDate>:lastDate AND endDate<:lastDate) OR (beginDate<:firstDate AND endDate>:lastDate))";
            $dateSearch = true;
            if(isset($_POST['searchMonth']) && $_POST['searchMonth']!=00){
                $firstMonthSearch = strip_tags($_POST['searchMonth']);
                $lastMonthSearch = strip_tags($_POST['searchMonth']);
                if(isset($_POST['searchDay']) && $_POST['searchDay']!=00){
                    $firstDaySearch = strip_tags($_POST['searchDay']);
                    $lastDaySearch = strip_tags($_POST['searchDay']);
                }
                else
                {
                    if($firstMonthSearch == 4 || $firstMonthSearch == 6 || $firstMonthSearch == 9 || $firstMonthSearch == 11){
                        $lastDaySearch = 30;
                    }
                    if($firstMonthSearch == 2){
                        if((!($_POST['searchYear'] % 4) && ($_POST['searchYear'] % 100)) || !($_POST['searchYear'] % 400)){
                            $lastDaySearch = 29;
                        }
                        else
                        {
                            $lastDaySearch = 28;
                        }
                    }
                }
            }
        }

        $searchGenre = false;
        $query = $query . " AND (";
        if( isset($_POST['genre_pop']) ){
            $query = $query . "genreId=1 OR ";
            $searchGenre = true;
        }

        if( isset($_POST['genre_rock']) ){
            $query = $query . "genreId=2 OR ";
            $searchGenre = true;
        }

        if( isset($_POST['genre_metal']) ){
            $query = $query . "genreId=3 OR ";
            $searchGenre = true;
        }

        if( isset($_POST['genre_hiphop']) ){
            $query = $query . "genreId=4 OR ";
            $searchGenre = true;
        }

        if( isset($_POST['genre_blues']) ){
            $query = $query . "genreId=5 OR ";
            $searchGenre = true;
        }

        if( isset($_POST['genre_classic']) ){
            $query = $query . "genreId=6 OR ";
            $searchGenre = true;
        }

        if( isset($_POST['genre_church']) ){
            $query = $query . "genreId=7 OR ";
            $searchGenre = true;
        }

        if( isset($_POST['genre_other']) ){
            $query = $query . "genreId=8 OR ";
            $searchGenre = true;
        }
        if($searchGenre) {
            $query = $query . "0)";
        }
        else
        {
            $query = $query . "1)";
        }
    }

    $query = $query . " ORDER BY events.beginDate";
    $offsetUsed = false;
    if(isset($_GET['offset'])){
        $query = $query . " ASC LIMIT :offset , :offsetMax";
        $offsetUsed = true;
    }
    else
    {
        $query = $query . " ASC LIMIT 0 , 10";
    }

    $sth = $dbh->prepare($query);
    if($wordSearch){
        $eventName = "%" . strip_tags($_POST['eventName']) . "%";
        $sth->bindParam(':eventName', $eventName);
    }
    if($dateSearch){
        $firstDate = mktime(0, 0, 0, $firstMonthSearch, $firstDaySearch, strip_tags($_POST['searchYear']));
        $lastDate = mktime(23, 59, 59, $lastMonthSearch, $lastDaySearch, strip_tags($_POST['searchYear']));
        $sth->bindParam(':firstDate', $firstDate);
        $sth->bindParam(':lastDate', $lastDate);
    }
    if($offsetUsed){
        $offset = strip_tags($_GET['offset']);
        $offsetMax = $offset + 10;
        $sth->bindParam(:offset, $offset);
        $sth->bindParam(:offsetMax, $offsetMax);
    }

    $sth->setFetchMode(PDO::FETCH_OBJ);
    $sth->execute();
?>

<script language="JavaScript">
    function expandEntry(id) {
        if (document.getElementById(id).style.height == 'auto') {
            document.getElementById(id).style.height = '70px';
        }
        else {
            document.getElementById(id).style.height = 'auto';
        }
    }
</script>

                <h1>Agenda</h1>
                <p>Alle aankomende evenementen zijn opgenomen in onze agenda. Zoekt u een bepaald evenement?
                Gebruik dan de zoekopties links van de agenda.</p>
                <div id="agenda">
                    <?php
                        echo $query . "<br />";
                        $months = array("januari", "februari", "maart", "april", "mei", "juni", "juli", "augustus", "september", "oktober", "november", "december");
                        $counter = 0;
                        $tempId = -1;
                        // showing the results
                        while($row = $sth->fetch()) {
                            $id = $row->id;
                            if($id != $tempId){
                                $tempId = $row->id;
                                $counter = $counter + 1;
                                echo "\n                    <!-- Begin of item #" . $row->id . "-->\n";
                                if ($counter % 2)
                                    echo "                    <div class=\"event-odd\">\n";
                                else
                                    echo "                    <div class=\"event-even\">\n";
                                echo "                        <div class=\"date\">\n" ;
                                echo "                            <div id=\"dateDay\">" . date("d", $row->beginDate) . "</div>\n";
                                echo "                            <div id=\"dateMonth\">" . $months[date("n", $row->beginDate) - 1] . "</div>\n";
                                echo "                            <div id=\"dateYear\">" . date("Y", $row->beginDate) . "</div>\n";
                                echo "                        </div>\n";
                                echo "                        <div id=\"eventPhoto\"><img src=\"" . $row->image . "\" itemprop=\"photo\"></div>";
                                echo "                        <div class=\"title\">" . $row->title . " <a href=\"#" . $row->id . "\" onclick=\"expandEntry('" . $row->id . "');\" itemprop=\"url\"><span class=\"summary\" itemprop=\"summary\">(meer informatie)</span></a> ";
                                if (isset( $_SESSION['accessLevel']) ){
                                    if ($_SESSION['accessLevel'] == 2){
                                        echo "<a href=\"index.php?page=event-review&id=" . $row->id . "\"> <img src=\"img/btn-edit.png\" title=\"Aanpassen\" alt=\"Aanpassen\" width=\"16\" height=\"16\"></a> <a href=\"sqlaction.php?action=delete&type=event&id=" . $row->id . "\"> <img src=\"img/btn-delete.png\" title=\"Verwijderen\" alt=\"Verwijderen\" width=\"16\" height=\"16\"></a> ";
                                    }
                                }
                                echo "</div>\n";
                                echo "                        <div id=\"" . $row->id . "\" class=\"description\" itemprop=\"description\">". $row->description ."</div>\n";
                                echo "                        <div class=\"meta\">\n";
                                echo "                            <span itemprop=\"startDate\" datetime=\"2022-07-04T18:00\">" . date("d-m-Y H:i:s", $row->beginDate) . "</span> tot\n";
                                echo "                            <span itemprop=\"endDate\" datetime=\"2022-07-04T22:00\">" . date("d-m-Y H:i:s", $row->endDate) . "</span>\n";
                                echo "                        </div>\n";
                                echo "                        <div class=\"meta\">\n";
                                echo "                            <span itemprop=\"location\">" . $row->locationName . "(\n";
                                echo "                                <span itemprop=\"address\" itemscope itemtype=\"http://data-vocabulary.org/Address\">\n";
                                echo "                                <span itemprop=\"street-address\">Science Park 904</span>,\n";
                                echo "                                <span itemprop=\"locality\">Amsterdam</span>,\n";
                                echo "                                <span itemprop=\"country-name\">Nederland</span>\n";
                                echo "                            </span>\n";
                                echo "                            <span itemprop=\"geo\">\n";
                                echo "                                <meta itemprop=\"latitude\" content=\"52.354496\" />\n";
                                echo "                                <meta itemprop=\"longitude\" content=\"4.954206\" />\n";
                                echo "                            </span>\n";
                                echo "                        </div>\n";
                                echo "                    </div>\n";
                                echo "                    <!-- End of item -->\n";
                            }
                        }
                    ?>
                Volgende knop\n
                </div>
