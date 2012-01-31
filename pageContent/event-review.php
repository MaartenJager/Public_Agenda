<?php
    /* Fetch event with ID.. */
    require_once("inc-conf.php");
    require("inc-dbcon.php");

    $sth = $dbh->prepare("SELECT * FROM events WHERE id=:id");
    $sth->bindParam(':id'       , $_GET['id']);
    $sth->setFetchMode(PDO::FETCH_OBJ);
    $sth->execute();
    $row = $sth->fetch();
    $hoursBegin = date("H", $row->beginDate);
    $minsBegin = date("i", $row->beginDate);
    $hoursEnd = date("H", $row->endDate);
    $minsEnd = date("i", $row->endDate);
    $sth = $dbh->prepare("SELECT * FROM genre_event_koppeling WHERE eventId=:id");
    $sth->bindParam(':id'       , $_GET['id']);
    $sth->setFetchMode(PDO::FETCH_OBJ);
    $sth->execute();
    $booleanArray = array_fill(0, 8, FALSE);
    while( $row2 = $sth->fetch() ) {
        $i=1;
        while( $i != $row2->genreId ) {
            $i++;
        }
        $tempInt=$i-1;
        $booleanArray[$tempInt] = TRUE;
    }
?>
<?php
session_start();
if (isset( $_SESSION['accessLevel'] ))
{

    if ($_SESSION['accessLevel'] == 2)
    {

    echo "

<h1>Evenement bewerken</h1>
                <p>Hier kunt u het evenement aanpassen alvorens het goed te keuren. U kunt het evenement ook verwijderen.</p>
                <form enctype=\"multipart/form-data\" name=\"event-add\" action=\"formhandler.php\"  method=\"post\">
                    <label>Naam evenement</label>
                    <input type=\"text\" name=\"eventName\" value=" . $row->title . " autofocus required>

                    <label>Begindatum (DD-MM-YYYY) en tijd</label>
                    <input type=\"text\" name=\"eventBeginDate\" placeholder=\"bv. 01-01-2012\" value=" . date("d-m-Y", $row->beginDate) . " required>

                    <select name=\"eventBeginTimeHours\">
                        <option value=\"00\""; if($hoursBegin==00){ echo " selected=\"selected\""; } echo ">00</option>
                        <option value=\"01\""; if($hoursBegin==01){ echo " selected=\"selected\""; } echo ">01</option>
                        <option value=\"02\""; if($hoursBegin==02){ echo " selected=\"selected\""; } echo ">02</option>
                        <option value=\"03\""; if($hoursBegin==03){ echo " selected=\"selected\""; } echo ">03</option>
                        <option value=\"04\""; if($hoursBegin==04){ echo " selected=\"selected\""; } echo ">04</option>
                        <option value=\"05\""; if($hoursBegin==05){ echo " selected=\"selected\""; } echo ">05</option>
                        <option value=\"06\""; if($hoursBegin==06){ echo " selected=\"selected\""; } echo ">06</option>
                        <option value=\"07\""; if($hoursBegin==07){ echo " selected=\"selected\""; } echo ">07</option>
                        <option value=\"08\""; if($hoursBegin==08){ echo " selected=\"selected\""; } echo ">08</option>
                        <option value=\"09\""; if($hoursBegin==09){ echo " selected=\"selected\""; } echo ">09</option>
                        <option value=\"10\""; if($hoursBegin==10){ echo " selected=\"selected\""; } echo ">10</option>
                        <option value=\"11\""; if($hoursBegin==11){ echo " selected=\"selected\""; } echo ">11</option>
                        <option value=\"12\""; if($hoursBegin==12){ echo " selected=\"selected\""; } echo ">12</option>
                        <option value=\"13\""; if($hoursBegin==13){ echo " selected=\"selected\""; } echo ">13</option>
                        <option value=\"14\""; if($hoursBegin==14){ echo " selected=\"selected\""; } echo ">14</option>
                        <option value=\"15\""; if($hoursBegin==15){ echo " selected=\"selected\""; } echo ">15</option>
                        <option value=\"16\""; if($hoursBegin==16){ echo " selected=\"selected\""; } echo ">16</option>
                        <option value=\"17\""; if($hoursBegin==17){ echo " selected=\"selected\""; } echo ">17</option>
                        <option value=\"18\""; if($hoursBegin==18){ echo " selected=\"selected\""; } echo ">18</option>
                        <option value=\"19\""; if($hoursBegin==19){ echo " selected=\"selected\""; } echo ">19</option>
                        <option value=\"20\""; if($hoursBegin==20){ echo " selected=\"selected\""; } echo ">20</option>
                        <option value=\"21\""; if($hoursBegin==21){ echo " selected=\"selected\""; } echo ">21</option>
                        <option value=\"22\""; if($hoursBegin==22){ echo " selected=\"selected\""; } echo ">22</option>
                        <option value=\"23\""; if($hoursBegin==23){ echo " selected=\"selected\""; } echo ">23</option>
                    </select>

                    <select name=\"eventBeginTimeMinutes\">
                        <option value=\"00\""; if($minsBegin==00){ echo "selected=\"selected\""; } echo ">00</option>
                        <option value=\"15\""; if($minsBegin==15){ echo "selected=\"selected\""; } echo ">15</option>
                        <option value=\"30\""; if($minsBegin==30){ echo "selected=\"selected\""; } echo ">30</option>
                        <option value=\"45\""; if($minsBegin==45){ echo "selected=\"selected\""; } echo ">45</option>
                    </select>

                    <label>Einddatum (DD-MM-YYYY) en tijd</label>
                    <input type=\"text\" name=\"eventEndDate\" placeholder=\"bv. 01-01-2012\" value=\""; echo date("d-m-Y", $row->endDate); echo "\" required>

                    <select name=\"eventEndTimeHours\">
                        <option value=\"00\""; if($hoursEnd==00){ echo " selected=\"selected\""; } echo ">00</option>
                        <option value=\"01\""; if($hoursEnd==01){ echo " selected=\"selected\""; } echo ">01</option>
                        <option value=\"02\""; if($hoursEnd==02){ echo " selected=\"selected\""; } echo ">02</option>
                        <option value=\"03\""; if($hoursEnd==03){ echo " selected=\"selected\""; } echo ">03</option>
                        <option value=\"04\""; if($hoursEnd==04){ echo " selected=\"selected\""; } echo ">04</option>
                        <option value=\"05\""; if($hoursEnd==05){ echo " selected=\"selected\""; } echo ">05</option>
                        <option value=\"06\""; if($hoursEnd==06){ echo " selected=\"selected\""; } echo ">06</option>
                        <option value=\"07\""; if($hoursEnd==07){ echo " selected=\"selected\""; } echo ">07</option>
                        <option value=\"08\""; if($hoursEnd==08){ echo " selected=\"selected\""; } echo ">08</option>
                        <option value=\"09\""; if($hoursEnd==09){ echo " selected=\"selected\""; } echo ">09</option>
                        <option value=\"10\""; if($hoursEnd==10){ echo " selected=\"selected\""; } echo ">10</option>
                        <option value=\"11\""; if($hoursEnd==11){ echo " selected=\"selected\""; } echo ">11</option>
                        <option value=\"12\""; if($hoursEnd==12){ echo " selected=\"selected\""; } echo ">12</option>
                        <option value=\"13\""; if($hoursEnd==13){ echo " selected=\"selected\""; } echo ">13</option>
                        <option value=\"14\""; if($hoursEnd==14){ echo " selected=\"selected\""; } echo ">14</option>
                        <option value=\"15\""; if($hoursEnd==15){ echo " selected=\"selected\""; } echo ">15</option>
                        <option value=\"16\""; if($hoursEnd==16){ echo " selected=\"selected\""; } echo ">16</option>
                        <option value=\"17\""; if($hoursEnd==17){ echo " selected=\"selected\""; } echo ">17</option>
                        <option value=\"18\""; if($hoursEnd==18){ echo " selected=\"selected\""; } echo ">18</option>
                        <option value=\"19\""; if($hoursEnd==19){ echo " selected=\"selected\""; } echo ">19</option>
                        <option value=\"20\""; if($hoursEnd==20){ echo " selected=\"selected\""; } echo ">20</option>
                        <option value=\"21\""; if($hoursEnd==21){ echo " selected=\"selected\""; } echo ">21</option>
                        <option value=\"22\""; if($hoursEnd==22){ echo " selected=\"selected\""; } echo ">22</option>
                        <option value=\"23\""; if($hoursEnd==23){ echo " selected=\"selected\""; } echo ">23</option>
                    </select>

                    <select name=\"eventEndTimeMinutes\">
                        <option value=\"00\""; if($minsEnd==00){ echo "selected=\"selected\""; } echo ">00</option>
                        <option value=\"15\""; if($minsEnd==15){ echo "selected=\"selected\""; } echo ">15</option>
                        <option value=\"30\""; if($minsEnd==30){ echo "selected=\"selected\""; } echo ">30</option>
                        <option value=\"45\""; if($minsEnd==45){ echo "selected=\"selected\""; } echo ">45</option>
                    </select>

                    <label>Kies de locatie voor het event</label>
                    <select name=\"locationPicker\">
                        <option value=\"1\">Death Metal zaal: locatie 1</option>
                        <option value=\"2\">Zaal voor bijbelstudie: locatie 2</option>
                        <option value=\"3\">Gedichtenzaal: locatie 3</option>
                    </select>

                    <label>Beschrijving van het evenement</label>
                    <textarea name=\"eventDescription\" placeholder=\"Voer beschrijving in\" required>"; echo $row->description; echo "</textarea>

                    <label>Kies de categorie&#235;n die bij het evenement horen</label>
                    <div id=\"checkbox_list\">
                        <ul>
                            <li><input name=\"genre_pop\" id=\"formCheckbox\" type=\"checkbox\""; if($booleanArray[0]){ echo "checked=\"checked\""; } echo " /> Pop</li>
                            <li><input name=\"genre_rock\" id=\"formCheckbox\" type=\"checkbox\""; if($booleanArray[1]){ echo "checked=\"checked\""; } echo " /> Rock</li>
                            <li><input name=\"genre_metal\" id=\"formCheckbox\" type=\"checkbox\""; if($booleanArray[2]){ echo "checked=\"checked\""; } echo " /> Metal</li>
                            <li><input name=\"genre_hiphop\" id=\"formCheckbox\" type=\"checkbox\""; if($booleanArray[3]){ echo "checked=\"checked\""; } echo " /> Hiphop</li>
                        </ul>
                    </div>
                    <div id=\"checkbox_list\">
                        <ul>
                            <li><input name=\"genre_blues\" id=\"formCheckbox\" type=\"checkbox\""; if($booleanArray[4]){ echo "checked=\"checked\""; } echo " /> Blues</li>
                            <li><input name=\"genre_classic\" id=\"formCheckbox\" type=\"checkbox\""; if($booleanArray[5]){ echo "checked=\"checked\""; } echo " /> Klassiek</li>
                            <li><input name=\"genre_church\" id=\"formCheckbox\" type=\"checkbox\""; if($booleanArray[6]){ echo "checked=\"checked\""; } echo " /> Kerk</li>
                            <li><input name=\"genre_other\" id=\"formCheckbox\" type=\"checkbox\""; if($booleanArray[7]){ echo "checked=\"checked\""; } echo " /> Overig</li>
                        </ul>
                    </div>

                    <div id=\"checkbox_below\">
                         <label>Voeg een afbeelding toe</label>
                         <input type=\"file\" name=\"file\" id =\"file\" value=\"" . $row->image . "\"/>
                         <br />
                         <input id=\"button\" name=\"editEvent\" type=\"submit\" value=\"Accepteer\" />
                         <input type=\"hidden\" name=\"id\" value=\"" . $row->id . "\" />
                    </div>
                </form>

                <div id=\"checkbox_below\">
                    <form action=\"sqlaction.php\" method=\"get\">
                        <input type=\"hidden\" name=\"action\" value=\"delete\" />
                        <input type=\"hidden\" name=\"type\" value=\"event\" />
                        <input type=\"hidden\" name=\"id\" value=\"" . $row->id . "\" />
                        <input id=\"button\" type=\"submit\" value=\"Verwijder\" />
                    </form>
                </div>
";
    }
}
else
{
	echo "no priveleges bitch";
}