<!DOCTYPE html>
<html lang="nl">
    <?php require_once("inc/header.inc"); ?>

    <body>
        <div id="container">
            <div id="header" role="banner">Paginatitel</div>
            <?php require_once("inc/nav.inc"); ?>

            <section id="main" role="main">
                <header class="pageTitle"><h1>Agenda</h1></header>
                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit.
                Mauris vel magna. Mauris risus nunc, tristique varius, gravida
                in, lacinia vel, elit.</p>

                <div id="agenda">
                    
                    <div id="event" class="even" itemscope itemtype="http://data-vocabulary.org/Event">
                        <div id="dateWrapper">
                            <div class="day">12</div>
                            <div class="month">JANUARI</div>
                        </div>
                        <div id="commentWrapper">
                            <a name="0"></a> <!-- HTML anchor  -->
                            ​<a href="#0" itemprop="url" ><span itemprop="summary">Titel</span></a> <!-- Link to HTML anchor  -->
                            <p itemprop="description">My big event is going to be fun. You should come.</p>
                            <div id="time">
                                <span itemprop="startDate" datetime="2022-07-04T18:00">July 4th, 2022 at 6:00pm</span> tot
                                <span itemprop="endDate" datetime="2022-07-04T22:00">July 4th, 2022 at 10:00pm</span>
                            </div>
                            <div id="location">@
                                ​<span itemprop="location" itemscope itemtype="http://data-vocabulary.org/​Organization">
                                    ​<span itemprop="name">Warfield Theatre</span>
                                    ​
                                    <span itemprop="address" itemscope itemtype="http://data-vocabulary.org/Address">
                                        <span itemprop="street-address">982 Market St</span>, 
                                        <span itemprop="locality">San Francisco</span>, 
                                        <span itemprop="region">CA</span>
                                    </span>

                                    <span itemprop="geo" itemscope itemtype="http://data-vocabulary.org/​Geo">
                                        <meta itemprop="latitude" content="37.774929" />
                                        <meta itemprop="longitude" content="-122.419416" />
                                    </span>
                                </span>
                            </div>
                        </div>
                        <div id="photoWrapper">
                            <img class="eventPhoto" itemprop="photo" src="img/img.jpg"/>
                        </div>
                    </div>






                    
                    <div id="event" class="odd" itemscope itemtype="http://data-vocabulary.org/Event">
                        <div id="dateWrapper">
                            <div class="day">12</div>
                            <div class="month">JANUARI</div>
                        </div>
                        <div id="commentWrapper">
                            <a name="0"></a> <!-- HTML anchor  -->
                            ​<a href="#0" itemprop="url" ><span itemprop="summary">Titel</span></a> <!-- Link to HTML anchor  -->
                        </div>
                        <div id="photoWrapper">
                            <img class="eventPhoto" itemprop="photo" src="img/img.jpg"/>
                        </div>
                    </div>

                    <div id="event" class="even" itemscope itemtype="http://data-vocabulary.org/Event">
                        <div id="dateWrapper">
                            <div class="day">12</div>
                            <div class="month">JANUARI</div>
                        </div>
                        <div id="commentWrapper">
                            <a name="0"></a> <!-- HTML anchor  -->
                            ​<a href="#0" itemprop="url" ><span itemprop="summary">Titel</span></a> <!-- Link to HTML anchor  -->
                        </div>
                        <div id="photoWrapper">
                            <img class="eventPhoto" itemprop="photo" src="img/img.jpg"/>
                        </div>
                    </div>
                    
                    <div id="event" class="odd" itemscope itemtype="http://data-vocabulary.org/Event">
                        <div id="dateWrapper">
                            <div class="day">12</div>
                            <div class="month">JANUARI</div>
                        </div>
                        <div id="commentWrapper">
                            <a name="0"></a> <!-- HTML anchor  -->
                            ​<a href="#0" itemprop="url" ><span itemprop="summary">Titel</span></a> <!-- Link to HTML anchor  -->
                        </div>
                        <div id="photoWrapper">
                            <img class="eventPhoto" itemprop="photo" src="img/img.jpg"/>
                        </div>
                    </div>
                    
                </div>
            </section>

            <?php require_once("inc/sidebar.inc"); ?>
            <?php require_once("inc/footer.inc"); ?>
        </div>
    </body>
</html>
