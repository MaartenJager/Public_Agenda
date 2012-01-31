
            <aside id="sidebar_agenda">
                <form action="index.php?page=agenda&search=enabled" method="post">
                <label>Zoeken op woord</label>
                <input type="text" id="textInputSmall" name="eventName" placeholder="Naam of zoekterm">

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
                    <label>Zoeken op (begin)datum</label>
                    <p>Gebruik * als joker.</p>
                    <select name="searchDay">
                        <option value="00">*</option>
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
                        <option value="00">*</option>
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
                        <option value="*">*</option>
                        <option value="2012">2012</option>
                        <option value="2013">2013</option>
                        <option value="2014">2014</option>
                        <option value="2015">2015</option>
                    </select>

                    <input id="button" name="search" type="search" value="Zoek" />
                </div>
                </form>
            </aside>
