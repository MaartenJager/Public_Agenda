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
                        </div>
                        <div id="photoWrapper">
                            <img class="eventPhoto" itemprop="photo" src="img/img.jpg"/>
                        </div>
                    </div>

                    <div id="event" class="odd" itemscope itemtype="http://data-vocabulary.org/Event">
                        <div id="dateWrapper">Hierin de datum</div>
                        <div id="commentWrapper">Test....</div>
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
