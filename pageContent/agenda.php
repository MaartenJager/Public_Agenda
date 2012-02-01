<?php
/* Fetch all events from table EVENTS */
    require_once("inc-conf.php");
    require("inc-dbcon.php");

    $query = "SELECT  events.*, users.name, users.firstName, locations.name AS locationName FROM events
                            INNER JOIN users ON (events.createdBy = users.id)
                            INNER JOIN locations ON (events.location = locations.id)
                            WHERE approvedBy IS NOT NULL";
    $wordSearch = false;
    $yearSearch = false;
    if(isset($_POST['search'])){
        if(isset($_POST['eventName']) && $_POST['eventName']!=""){
            $query = $query . " AND (title LIKE :eventName OR description LIKE :eventName)";
            $wordSearch = true;
        }
        if(isset($_POST['searchYear']) && $_POST['searchYear']!='*'){
            $query = $query . " AND ((beginDate>:firstDate AND beginDate<:lastDate) OR (endDate>:lastDate AND endDate<:lastDate))";
            $yearSearch = true;
        }
    }
    $query = $query . " ORDER BY events.beginDate ASC";


    $sth = $dbh->prepare($query);
    if($wordSearch){
        $eventName = "%" . strip_tags($_POST['eventName']) . "%";
        $sth->bindParam(':eventName', $eventName);
    }
    if($yearSearch){
        $firstDate = mktime(0, 0, 0, 1, 1, strip_tags($_POST['searchYear']));
        $lastDate = mktime(23, 59, 59, 12, 31, strip_tags($_POST['searchYear']));
        $sth->bindParam(':firstDate', $firstDate);
        $sth->bindParam(':lastDate', $lastDate);
    }

    $sth->setFetchMode(PDO::FETCH_OBJ);
    $sth->execute();
?>

<script language="JavaScript">
    function expandEntry(id) {
        if (document.getElementById(id).style.height == '170px') {
            document.getElementById(id).style.height = '85px';
            document.getElementById("description" + id).style.height = '60%';
        }
        else {
            document.getElementById(id).style.height = '170px';
            document.getElementById("description" + id).style.height = '115px';
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
                            echo("<!-- Begin of item #" . $row->id . "-->\n");
                            if ($counter % 2)
                                echo(" <div id=\"" . $row->id . "\" class=\"event-odd\" itemscope itemtype=\"http://data-vocabulary.org/Event\">\n");
                            else
                                echo(" <div id=\"" . $row->id . "\" class=\"event-even\" itemscope itemtype=\"http://data-vocabulary.org/Event\">\n");
                            echo(" <div class=\"date\">\n");
                            echo(" <div class=\"day\">" . date("d", $row->beginDate) . "</div>\n");
                            echo(" <div class=\"month\">" . date("F", $row->beginDate) . "</div>\n");
                            echo(" </div>\n");
                            echo " <div class=\"comment\">\n" ;
                            echo " <a href=\"#" . $row->id . "\" onclick=\"expandEntry('" . $row->id . "');\" itemprop=\"url\"><span class=\"summary\" itemprop=\"summary\">". $row->title ."</span></a> <a href=\"index.php?page=event-review&id=" . $row->id . "\">  <img src=\"img/btn-edit.png\" title=\"Aanpassen\" alt=\"Aanpassen\" width=\"16\" height=\"16\"></a>\n" ;
                            echo(" <div id=\"description" . $row->id . "\"class=\"description\" itemprop=\"description\">". $row->description ."</div>\n");
                            echo(" <div class=\"meta\">\n");
                            echo(" <span itemprop=\"startDate\" datetime=\"2022-07-04T18:00\">" . date("d-m-Y H:i:s", $row->beginDate) . "</span> tot\n");
                            echo(" <span itemprop=\"endDate\" datetime=\"2022-07-04T22:00\">" . date("d-m-Y H:i:s", $row->endDate) . "</span>\n");
                            echo(" </div>\n");
                            echo(" <div class=\"meta\">@\n");
                            echo(" ?<span itemprop=\"location\" itemscope itemtype=\"http://data-vocabulary.org/?Organization\">\n");
                            echo(" " . $row->locationName ."(\n");
                            echo("? <span itemprop=\"name\">the Roadhouse</span>\n");
                            echo(" \n");
                            echo(" <span itemprop=\"address\" itemscope itemtype=\"http://data-vocabulary.org/Address\">\n");
                            echo(" <span itemprop=\"street-address\">Science Park 904</span>,\n");
                            echo(" <span itemprop=\"locality\">Amsterdam</span>,\n");
                            echo(" <span itemprop=\"country-name\">Nederland</span>\n");
                            echo(" </span>)\n");
                            echo(" \n");
                            echo(" <span itemprop=\"geo\" itemscope itemtype=\"http://data-vocabulary.org/?Geo\">\n");
                            echo(" <meta itemprop=\"latitude\" content=\"52.354496\" />\n");
                            echo(" <meta itemprop=\"longitude\ content=\"4.954206\" />\n");
                            echo(" </span>\n");
                            echo(" </span>\n");
                            echo(" </div>\n");
                            echo(" </div>\n");
                            echo(" <img itemprop=\"photo\" src=\"". $row->image . "\"/>\n");
                            echo(" </div>\n");
                            echo("<!-- End of item -->\n");
                        }
                    ?>
                </div>
