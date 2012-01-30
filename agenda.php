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
                            echo "            <a href=\"#" . $row->id . "\" onclick=\"expandEntry('" . $row->id . "');\" itemprop=\"url\"><span class=\"summary\" itemprop=\"summary\">". $row->title ."</span></a> <a href=\"event-review.php?id=" . $row->id . "\">Edit</a>\n" ;
                            echo("            <div id=\"description" . $row->id . "\"class=\"description\" itemprop=\"description\">". $row->description ."</div>\n");
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
                <input type="text" id="textInputShort" name="eventName" placeholder="Naam of zoekterm">

                <label>Zoeken op catagorie</label>
                <div id="checkbox_list">
                    <ul>
                        <li><input name="genre_all" id="formCheckbox" type="checkbox" checked="checked" /> Alle</li>
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
                    <label>Zoeken op (begin)datum</label>
                    <select name="searchDay">
                        <option value="01">1</option>
                        <option value="02">2</option>
                        <option value="03">3</option>
                        <option value="04">4</option>
                        <option value="05">5</option>
                        <option value="06">6</option>
                        <option value="07">7</option>
                        <option value="08">8</option>
                        <option value="09">9</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                        <option value="13">13</option>
                        <option value="14">14</option>
                        <option value="15">15</option>
                        <option value="16">16</option>
                        <option value="17">17</option>
                        <option value="18">18</option>
                        <option value="19">19</option>
                        <option value="20">20</option>
                        <option value="21">21</option>
                        <option value="22">22</option>
                        <option value="23">23</option>
                        <option value="24">24</option>
                        <option value="25">25</option>
                        <option value="26">26</option>
                        <option value="27">27</option>
                        <option value="28">28</option>
                        <option value="29">29</option>
                        <option value="30">30</option>
                        <option value="31">31</option>
                    </select>
                    
                    <select name="searchMonth">
                        <option value="01">januari</option>
                        <option value="02">februari</option>
                        <option value="03">maart</option>
                        <option value="04">april</option>
                        <option value="05">mei</option>
                        <option value="06">juni</option>
                        <option value="07">juli</option>
                        <option value="08">augustus</option>
                        <option value="09">september</option>
                        <option value="10">oktober</option>
                        <option value="11">november</option>
                        <option value="12">december</option>
                    </select>
                    
                    <select name="searchYear">
                        <option value="2012">2012</option>
                        <option value="2013">2013</option>
                        <option value="2014">2014</option>
                        <option value="2015">2015</option>
                    </select>
                </div>
            </aside>

            <?php require_once("inc/footer.inc"); ?>
        </div>
    </body>
</html>
