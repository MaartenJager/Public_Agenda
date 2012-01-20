<!DOCTYPE html>
<html lang="nl">
    <?php require_once("inc/header.inc"); ?>

    <body>
        <div id="container">
            <div id="header" role="banner">Paginatitel</div>
            <?php require_once("inc/nav.inc"); ?>

            <section id="main" role="main">
                <header class="pageTitle"><h1>Agenda</h1></header>
                <p>Alle aankomende elementen zijn opgenomen in onze agenda. Zoekt u een bepaald evenement?
                Gebruik dan de zoekopties rechts van de agenda.</p>

                <div id="agenda">

                    <!-- Begin item -->
                    <div class="event even" itemscope itemtype="http://data-vocabulary.org/Event">
                        <div class="date">
                            <div class="day">12</div>
                            <div class="month">JANUARI</div>
                        </div>
                        <div id="0" class="comment">
                            ​<a href="#0" itemprop="url" ><span class="summary" itemprop="summary">Event 1</span></a> <!-- Link to HTML anchor  -->
                            <div class="description" itemprop="description">Lorem ipsum dolor sit amet, tacimates pericula per an, malis mediocrem molestiae quo no. Quo cu mazim omittam, an nulla simul recteque duo. Quod periculis prodesset ut eum. Clita posidonium ea vel, id eos senserit repudiare aliquando, hinc decore forensibus cu sea. Cum cu vero impetus dolorum, iriure diceret scriptorem eam at.</div>
                            <div class="meta">
                                <span itemprop="startDate" datetime="2022-07-04T18:00">July 4th, 2022 at 6:00pm</span> tot
                                <span itemprop="endDate" datetime="2022-07-04T22:00">July 4th, 2022 at 10:00pm</span>
                            </div>
                            <div class="meta">@
                                ​<span itemprop="location" itemscope itemtype="http://data-vocabulary.org/​Organization">
                                    ​<span itemprop="name">the Roadhouse</span>
                                    ​
                                    <span itemprop="address" itemscope itemtype="http://data-vocabulary.org/Address">
                                        <span itemprop="street-address">Science Park 904</span>,
                                        <span itemprop="locality">Amsterdam</span>,
                                        <span itemprop="country-name">Nederland</span>
                                    </span>

                                    <span itemprop="geo" itemscope itemtype="http://data-vocabulary.org/​Geo">
                                        <meta itemprop="latitude" content="52.354496" />
                                        <meta itemprop="longitude" content="4.954206" />
                                    </span>
                                </span>
                            </div>
                        </div>
                            <img itemprop="photo" src="img/img.jpg"/>
                    </div>
                    <!-- Eind item -->


                    <!-- Begin item -->
                    <div class="event odd" itemscope itemtype="http://data-vocabulary.org/Event">
                        <div class="date">
                            <div class="day">12</div>
                            <div class="month">JANUARI</div>
                        </div>
                        <div id="0" class="comment">
                            ​<a href="#0" itemprop="url" ><span class="summary" itemprop="summary">Event 2</span></a> <!-- Link to HTML anchor  -->
                            <div class="description" itemprop="description">Lorem ipsum dolor sit amet, tacimates pericula per an, malis mediocrem molestiae quo no. Quo cu mazim omittam, an nulla simul recteque duo. Quod periculis prodesset ut eum. Clita posidonium ea vel, id eos senserit repudiare aliquando, hinc decore forensibus cu sea. Cum cu vero impetus dolorum, iriure diceret scriptorem eam at.</div>
                            <div class="meta">
                                <span itemprop="startDate" datetime="2022-07-04T18:00">July 4th, 2022 at 6:00pm</span> tot
                                <span itemprop="endDate" datetime="2022-07-04T22:00">July 4th, 2022 at 10:00pm</span>
                            </div>
                            <div class="meta">@
                                ​<span itemprop="location" itemscope itemtype="http://data-vocabulary.org/​Organization">
                                    ​<span itemprop="name">the Roadhouse</span>
                                    ​
                                    <span itemprop="address" itemscope itemtype="http://data-vocabulary.org/Address">
                                        <span itemprop="street-address">Science Park 904</span>,
                                        <span itemprop="locality">Amsterdam</span>,
                                        <span itemprop="country-name">Nederland</span>
                                    </span>

                                    <span itemprop="geo" itemscope itemtype="http://data-vocabulary.org/​Geo">
                                        <meta itemprop="latitude" content="52.354496" />
                                        <meta itemprop="longitude" content="4.954206" />
                                    </span>
                                </span>
                            </div>
                        </div>
                            <img itemprop="photo" src="img/img.jpg"/>
                    </div>
                    <!-- Eind item -->


                    <!-- Begin item -->
                    <div class="event even" itemscope itemtype="http://data-vocabulary.org/Event">
                        <div class="date">
                            <div class="day">12</div>
                            <div class="month">JANUARI</div>
                        </div>
                        <div id="0" class="comment">
                            ​<a href="#0" itemprop="url" ><span class="summary" itemprop="summary">Event 3</span></a> <!-- Link to HTML anchor  -->
                            <div class="description" itemprop="description">Lorem ipsum dolor sit amet, tacimates pericula per an, malis mediocrem molestiae quo no. Quo cu mazim omittam, an nulla simul recteque duo. Quod periculis prodesset ut eum. Clita posidonium ea vel, id eos senserit repudiare aliquando, hinc decore forensibus cu sea. Cum cu vero impetus dolorum, iriure diceret scriptorem eam at.</div>
                            <div class="meta">
                                <span itemprop="startDate" datetime="2022-07-04T18:00">July 4th, 2022 at 6:00pm</span> tot
                                <span itemprop="endDate" datetime="2022-07-04T22:00">July 4th, 2022 at 10:00pm</span>
                            </div>
                            <div class="meta">@
                                ​<span itemprop="location" itemscope itemtype="http://data-vocabulary.org/​Organization">
                                    ​<span itemprop="name">the Roadhouse</span>
                                    ​
                                    <span itemprop="address" itemscope itemtype="http://data-vocabulary.org/Address">
                                        <span itemprop="street-address">Science Park 904</span>,
                                        <span itemprop="locality">Amsterdam</span>,
                                        <span itemprop="country-name">Nederland</span>
                                    </span>

                                    <span itemprop="geo" itemscope itemtype="http://data-vocabulary.org/​Geo">
                                        <meta itemprop="latitude" content="52.354496" />
                                        <meta itemprop="longitude" content="4.954206" />
                                    </span>
                                </span>
                            </div>
                        </div>
                            <img itemprop="photo" src="img/img.jpg"/>
                    </div>
                    <!-- Eind item -->


                    <!-- Begin item -->
                    <div class="event odd" itemscope itemtype="http://data-vocabulary.org/Event">
                        <div class="date">
                            <div class="day">12</div>
                            <div class="month">JANUARI</div>
                        </div>
                        <div id="0" class="comment">
                            ​<a href="#0" itemprop="url" ><span class="summary" itemprop="summary">Event 4</span></a> <!-- Link to HTML anchor  -->
                            <div class="description" itemprop="description">Lorem ipsum dolor sit amet, tacimates pericula per an, malis mediocrem molestiae quo no. Quo cu mazim omittam, an nulla simul recteque duo. Quod periculis prodesset ut eum. Clita posidonium ea vel, id eos senserit repudiare aliquando, hinc decore forensibus cu sea. Cum cu vero impetus dolorum, iriure diceret scriptorem eam at.</div>
                            <div class="meta">
                                <span itemprop="startDate" datetime="2022-07-04T18:00">July 4th, 2022 at 6:00pm</span> tot
                                <span itemprop="endDate" datetime="2022-07-04T22:00">July 4th, 2022 at 10:00pm</span>
                            </div>
                            <div class="meta">@
                                ​<span itemprop="location" itemscope itemtype="http://data-vocabulary.org/​Organization">
                                    ​<span itemprop="name">the Roadhouse</span>
                                    ​
                                    <span itemprop="address" itemscope itemtype="http://data-vocabulary.org/Address">
                                        <span itemprop="street-address">Science Park 904</span>,
                                        <span itemprop="locality">Amsterdam</span>,
                                        <span itemprop="country-name">Nederland</span>
                                    </span>

                                    <span itemprop="geo" itemscope itemtype="http://data-vocabulary.org/​Geo">
                                        <meta itemprop="latitude" content="52.354496" />
                                        <meta itemprop="longitude" content="4.954206" />
                                    </span>
                                </span>
                            </div>
                        </div>
                            <img itemprop="photo" src="img/img.jpg"/>
                    </div>
                    <!-- Eind item -->

                </div>
            </section>
            
            <aside id="sidebar">
                <label>Zoeken op woord</label>                    
                <input name="eventName" placeholder="Naam of zoekterm">
                
                <label>Zoeken op catagorie</label>
                <div id="checkbox_list">
                    <ul>
                        <li><input name="genre_pop" id="formCheckbox" type="checkbox" /> Pop</li>
                        <li><input name="genre_pop" id="formCheckbox" type="checkbox" /> Pop</li>
                        <li><input name="genre_pop" id="formCheckbox" type="checkbox" /> Pop</li>
                        <li><input name="genre_pop" id="formCheckbox" type="checkbox" /> Pop</li>
                    </ul>
                </div>
                
                <label>Zoeken op datum</label>
                <p>Hier komt een klik-kalender.</p>
            </aside>
            
            <?php require_once("inc/footer.inc"); ?>
        </div>
    </body>
</html>
