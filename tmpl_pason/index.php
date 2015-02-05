<?php
/**
 * @Author  Chad Windnagle
 * @Project tmpl-pason
 * Date: 2/4/15
 */

// Getting params from template
$params = $this->params;

// Add Stylesheets
$this->addStyleSheet(JUri::root() . '/templates/' . $this->template . '/css/template.css');

// add in parallax
//JHtml::script(JUri::root() . '/templates/' . $this->template . '/js/jquery.imageScroll.js', true);

// load the template helper
JLoader::register('tmplHelper', __DIR__ . '/tmplHelper.php');

// load the template helper
$templateHelper = new tmplHelper();

// regiser the home.js file
$templateHelper->registerDelayedScript(Juri::root() . '/templates/' . $this->template . '/js/home.js');


?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <jdoc:include type="head" />
    </head>

    <body>
        <header>
            <section id="mini-nav-section" class="navbar navbar-inverse">
                <div class="container">
                    <div class="mini-nav-row">
                        <nav id="mini-nav" class="pull-right">
                            <jdoc:include type="modules" name="topright" />
                        </nav>
                    </div>
                </div>
            </section>
            <section id="main-nav-section">
                <div class="container">
                    <div class="main-nav-row">
                        <div class="navbar">
                            <div id="logo">
                                <a href="<?php echo JUri::root(); ?>" class="navbar-brand">
                                    <img src="<?php echo JUri::root(); ?>/templates/<?php echo $this->template; ?>/images/logo.png" />
                                </a>
                            </div>
                            <nav id="main-nav" class="collapse navbar-collapse pull-right">
                                <jdoc:include type="modules" name="top" />
                            </nav>

                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#main-nav">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </header>
        <?php if($this->countModules('home-slides')): ?>
            <section class="img-holder"
                     data-image="/templates/<?php echo $this->template; ?>/images/home-banner-bg.jpg"
                     data-width="1500" data-height="900" data-extra-height="100">
                <section id="slider-carousel-row">
                    <div  class="container">
                        <div id="home-slides" class="carousel slide">
                            <div class="carousel-inner" role="list-box">
                                <jdoc:include type="modules" name="home-slides" style="slide" data-target="home-slide" />
                            </div>
                            <!-- Controls -->
                            <a class="left carousel-control" href="#home-slides" role="button" data-slide="prev">
                                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="right carousel-control" href="#home-slides" role="button" data-slide="next">
                                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>
                </section>
            </section>
        <?php endif; ?>
        <main>
            <div class="container">
                <div class="main-row">
                    <jdoc:include type="message" />
                    <jdoc:include type="component" />
                </div>
            </div>
        </main>
        <footer>

        </footer>

        <script src="<?php echo '/templates/' . $this->template . '/js/jquery.imageScroll.js'; ?>"></script>
        <script>
            jQuery('.img-holder').imageScroll({
                holderMaxHeight: 550
            });
        </script>
    </body>
</html>