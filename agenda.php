<?php
/* Fetch all events from table EVENTS */
    require_once("inc-conf.php");
    require("inc-dbcon.php");

    $sth = $dbh->query("SELECT  events.*,
                                users.name,
                                users.firstName,
                                locations.name AS locationName
                            FROM events
                            INNER JOIN users ON (
                                events.createdBy = users.id
                                )
                            INNER JOIN locations ON (
                                events.location = locations.id
                                )
                            WHERE approvedBy IS NOT NULL
                            ORDER BY events.beginDate ASC");
    $sth->setFetchMode(PDO::FETCH_OBJ);
    $sth->execute();
?>

<!DOCTYPE html>
<html lang="nl">
    <head>
        <title>The Roadhouse - Agenda</title>
        <?php require_once("inc/header.inc"); ?>
        
        <script language="JavaScript">
            function expandEntry(id) {
                if (document.getElementById(id).style.height == '340px') {
                    var temp = 85;
                    document.getElementById(id).style.height = temp + 'px';
                }
                else {
                    var temp = 340;
                    document.getElementById(id).style.height = temp + 'px';
                }
            }
        </script>
    </head>

    <body>
        <div id="container">
            <div id="header" role="banner"></div>
            <?php require_once("inc/nav.inc"); ?>

            <section id="main" role="main">
                <header class="pageTitle"><h1>Agenda</h1></header>
                <p>Alle aankomende elementen zijn opgenomen in onze agenda. Zoekt u een bepaald evenement?
                Gebruik dan de zoekopties rechts van de agenda.</p>

                <div id="agenda">


            
                    <?php
                        // showing the results
                        while($row = $sth->fetch()) {                          
                            
                            echo("<!-- Begin of item #" . $row->id . "-->\n");
                            echo("  <div id=\"" . $row->id . "\" class=\"event\" class=\"odd\" itemscope itemtype=\"http://data-vocabulary.org/Event\">\n");
                            echo("    <div class=\"date\">\n");
                            echo("              <div class=\"day\">" . date("d", $row->beginDate) . "</div>\n");
                            echo("            <div class=\"month\">" . date("F", $row->beginDate) . "</div>\n");
                            echo("        </div>\n");
                            echo "        <div class=\"comment\">\n" ;
                            echo "            <a href=\"#\" onclick=\"expandEntry('" . $row->id . "');\" itemprop=\"url\"><span class=\"summary\" itemprop=\"summary\">". $row->title ."</span></a>\n" ;
                            echo("            <div class=\"description\" itemprop=\"description\">". $row->description ."</div>\n");
                            echo("            <div class=\"meta\">\n");
                            echo("                <span itemprop=\"startDate\" datetime=\"2022-07-04T18:00\">" . date("d-m-Y H:i:s", $row->beginDate) . "</span> tot\n");
                            echo("                <span itemprop=\"endDate\" datetime=\"2022-07-04T22:00\">" . date("d-m-Y H:i:s", $row->endDate) . "</span>\n");
                            echo("            </div>\n");
                            echo("            <div class=\"meta\">@\n");
                            echo("                ​<span itemprop=\"location\" itemscope itemtype=\"http://data-vocabulary.org/​Organization\">\n");
                            echo("                    " . $row->locationName ."(\n");
                            echo("​                    <span itemprop=\"name\">the Roadhouse</span>\n");
                            echo("                    \n");
                            echo("                    <span itemprop=\"address\" itemscope itemtype=\"http://data-vocabulary.org/Address\">\n");
                            echo("                    <span itemprop=\"street-address\">Science Park 904</span>,\n");
                            echo("                        <span itemprop=\"locality\">Amsterdam</span>,\n");
                            echo("                        <span itemprop=\"country-name\">Nederland</span>\n");
                            echo("                    </span>)\n");
                            echo("                \n");
                            echo("                <span itemprop=\"geo\" itemscope itemtype=\"http://data-vocabulary.org/​Geo\">\n");
                            echo("                        <meta itemprop=\"latitude\" content=\"52.354496\" />\n");
                            echo("                        <meta itemprop=\"longitude\ content=\"4.954206\" />\n");
                            echo("                    </span>\n");
                            echo("                </span>\n");
                            echo("            </div>\n");
                            echo("        </div>\n");
                            echo("            <img itemprop=\"photo\" src=\"". $row->image . "\"/>\n");
                            echo("    </div>\n");
                            echo("<!-- Eind of item -->\n");

                        }
                    ?>

                </div>
            </section>

            <aside id="sidebar_agenda">
                <label>Zoeken op woord</label>
                <div id="sidebar_agenda_searchbar">
                    <input type="email" name="eventName" placeholder="Naam of zoekterm">
                </div>

                <label>Zoeken op catagorie</label>
                <div id="checkbox_list">
                    <ul>
                        <li><input name="genre_pop" id="formCheckbox" type="checkbox" /> Pop</li>
                        <li><input name="genre_rock" id="formCheckbox" type="checkbox" /> Rock</li>
                        <li><input name="genre_metal" id="formCheckbox" type="checkbox" /> Metal</li>
                        <li><input name="genre_hiphop" id="formCheckbox" type="checkbox" /> Hiphop</li>
                    </ul>
                </div>
                <div id="checkbox_list">
                    <ul>
                        <li><input name="genre_blues" id="formCheckbox" type="checkbox" /> Blues</li>
                        <li><input name="genre_classic" id="formCheckbox" type="checkbox" /> Klassiek</li>
                        <li><input name="genre_church" id="formCheckbox" type="checkbox" /> Kerk</li>
                        <li><input name="genre_other" id="formCheckbox" type="checkbox" /> Overig</li>
                    </ul>
                </div>

                <div id="checkbox_below">
                    <label>Zoeken op datum</label>
                    <p>Hier komt een klik-kalender.</p>
                </div>
            </aside>

            <?php require_once("inc/footer.inc"); ?>
        </div>
    </body>
</html>
