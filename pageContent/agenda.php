<?php
/* Fetch all events from table EVENTS */
    require_once("inc-conf.php");
    require("inc-dbcon.php");

    $query = "SELECT  events.*, users.name, users.firstName, locations.name AS locationName FROM events
                            INNER JOIN users ON (events.createdBy = users.id)
                            INNER JOIN locations ON (events.location = locations.id)
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
    }

    $query = $query . " ORDER BY events.beginDate ASC";

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
                        echo $query;
                        $counter = 0;
                        // showing the results
                        while($row = $sth->fetch()) {
                            $counter = $counter + 1;
                            echo "\n                    <!-- Begin of item #" . $row->id . "-->\n";
                            if ($counter % 2)
                                echo "                    <div class=\"event-odd\">\n";
                            else
                                echo "                    <div class=\"event-even\">\n";
                            echo "                        <div class=\"date\">\n" ;
                            echo "                            <div id=\"dateDay\">" . date("d", $row->beginDate) . "</div>\n";
                            echo "                            <div id=\"dateMonth\">" . date("F", $row->beginDate) . "</div>\n";
                            echo "                            <div id=\"dateYear\">" . date("Y", $row->beginDate) . "</div>\n";
                            echo "                        </div>\n";
                            echo "                        <div class=\"image\"><img src=\"" . $row->image . "\" itemprop=\"photo\"></div>";
                            echo "                        <div class=\"title\">" . $row->title . " <a href=\"#" . $row->id . "\" onclick=\"expandEntry('" . $row->id . "');\" itemprop=\"url\"><span class=\"summary\" itemprop=\"summary\">(meer informatie)</span></a> <a href=\"index.php?page=event-review&id=" . $row->id . "\"> <img src=\"img/btn-edit.png\" title=\"Aanpassen\" alt=\"Aanpassen\" width=\"16\" height=\"16\"></a> <a href=\"sqlaction.php?action=delete&type=event&id=" . $row->id . "\"> <img src=\"img/btn-delete.png\" title=\"Verwijderen\" alt=\"Verwijderen\" width=\"16\" height=\"16\"></a> </div>\n";
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
                    ?>
                </div>
