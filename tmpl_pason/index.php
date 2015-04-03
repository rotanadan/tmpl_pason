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
$this->addStyleSheet(JUri::root() . '/templates/' . $this->template . '/css/custom.css');

// load the template helper
JLoader::register('tmplHelper', __DIR__ . '/tmplHelper.php');

// load the template helper
$templateHelper = new tmplHelper($this);

// regiser the home.js file
$templateHelper->registerDelayedScript(JUri::root() . '/templates/' . $this->template . '/js/bootstrap.min.js');
$templateHelper->registerDelayedScript(Juri::root() . '/templates/' . $this->template . '/js/parallax.min.js');
$templateHelper->registerDelayedScript(Juri::root() . '/templates/' . $this->template . '/js/home.js');
$templateHelper->registerDelayedScript(Juri::root() . '/templates/' . $this->template . '/js/scroll-watcher.js');
$templateHelper->registerDelayedScript(Juri::root() . '/templates/' . $this->template . '/js/heightCenter.js');
$templateHelper->registerDelayedScript(Juri::root() . '/templates/' . $this->template . '/js/jquery.mobile.custom.min.js');
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <jdoc:include type="head" />
        <script src="//use.typekit.net/srn3uki.js"></script>
        <script>try{Typekit.load();}catch(e){}</script>
    </head>
    <body class="<?php if ($templateHelper->isHomePage()): echo ' home'; endif; ?><?php echo $templateHelper->getPageClass(); ?>">
        <header>
            <section id="mini-nav-section">
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

<!--                            <div class="navbar-header">-->
<!--                                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#main-nav">-->
<!--                                    <span class="sr-only">Toggle navigation</span>-->
<!--                                    <span class="icon-bar"></span>-->
<!--                                    <span class="icon-bar"></span>-->
<!--                                    <span class="icon-bar"></span>-->
<!--                                </button>-->
<!--                            </div>-->

                            <span class="uk-button pull-right visible-xs-inline-block" data-uk-offcanvas="{target:'#mobilenav'}">
                                MENU
                            </span>

                        </div>
                    </div>
                </div>
            </section>
        </header>
        <?php if($this->countModules('main-banner')): ?>
            <section class="parallax-window img-holder main-banner-slides" style="min-height: <?php echo $this->params->get('image_max_height'); ?>px"
                     data-parallax="scroll"
                     data-image-src="<?php echo JUri::root() . $this->params->get('main_bg_image'); ?>"
                     data-natural-width="<?php echo $this->params->get('image_width'); ?>"
                     data-natural-height="<?php echo $this->params->get('image_height'); ?>"
                     id="<?php echo $this->params->get('div_id'); ?>">
                <section id="slider-carousel-row">
                    <div class="light-ruler-top"></div>
                    <div class="container">
                        <div id="home-slides" class="carousel slide" data-ride="carousel" data-interval="8000">
                            <?php if ($this->params->get('showtitles', 0)): ?>
                                <div class="carousel-titles">
                                    <ol class="indicator-titles"></ol>
                                    <ol class="carousel-indicators"></ol>
                                </div>
                            <?php endif; ?>
                            <div class="carousel-inner" role="listbox">
                                <jdoc:include type="modules" name="main-banner" style="slide" />
                            </div>
                            <?php if (! $this->params->get('showtitles', 0)): ?>
                                <ol class="carousel-indicators" ></ol>
                            <?php endif; ?>

                            <!-- Controls -->
                            <a class="previous-toggle carousel-control" href="#home-slides" role="button" data-slide="prev">
                                <span class="bs-carousel-arrow-left" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="next-toggle carousel-control" href="#home-slides" role="button" data-slide="next">
                                <span class="bs-carousel-arrow-right" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>
                    <div class="light-ruler-bottom"></div>
                </section>
            </section>
        <?php endif; ?>

        <?php if ($this->countModules('featured-solution')): ?>
            <section id="featured-solutions">
                <div class="container">
                    <div class="row">
                        <jdoc:include type="modules" name="featured-solution" style="" />
                    </div>
                </div>
            </section>
        <?php endif; ?>

        <?php if ($this->countModules('background-hero')): ?>
            <jdoc:include type="modules" name="background-hero" style="" />
        <?php endif; ?>

        <?php if ($this->countModules('page-heading')): ?>
            <jdoc:include type="modules" name="page-heading" style="" />
        <?php endif; ?>

        <?php if($this->countMOdules('product-title')): ?>
            <section class="product-title">
                <jdoc:include type="modules" name="product-title" style="html5" />
            </section>
        <?php endif; ?>

        <main>
            <div class="container <?php echo $templateHelper->getSidebarClasses(); ?>">
                <div class="main-row">
                    <section id="main-content">
                        <section class="above-content-row">
                            <jdoc:include type="modules" name="above-content" style="html5" />
                        </section>
                        <section id="content">
                            <jdoc:include type="message" />
                            <jdoc:include type="component" />
                        </section>
                        <section class="below-content-row">
                            <jdoc:include type="modules" name="below-content" style="html5" />
                        </section>
                    </section>

                    <?php if($this->countModules('left') || $this->countModules('sidebar')): ?>
                        <aside id="left-column">
                            <jdoc:include type="modules" name="left" style="html5" />
                            <jdoc:include type="modules" name="sidebar" style="html5" />
                        </aside>
                    <?php endif; ?>

                    <?php if($this->countModules('right')): ?>
                        <aside id="right-column">
                            <jdoc:include type="modules" name="right" style="html5" />
                        </aside>
                    <?php endif; ?>
                </div>
            </div>
        </main>

        <?php if ($this->countModules('footer')): ?>
            <footer>
                <div class="gray-ruler-top"></div>
                <div class="container">
                    <div class="footer-row">
                        <jdoc:include type="modules" name="footer" style="" />
                    </div>
                </div>
            </footer>
        <?php endif; ?>

        <?php // defer loaded JS ?>
        <?php echo $templateHelper->getDelayedScriptsMarkup(); ?>


        <script src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/js/uikit.min.js"></script>
        <!-- This is the off-canvas sidebar -->
        <div id="mobilenav" class="uk-offcanvas">
            <div class="uk-offcanvas-bar uk-offcanvas-bar-flip">
                <div class="mobilenavtop">
                    <a onclick="jQuery.UIkit.offcanvas.offcanvas.hide();" class="mobileclose">CLOSE</a>
                </div>
                <ul class="nav menu nav navbar-nav">
                    <li>
                        <a href="<?php echo JURI::base(); ?>">HOME</a>
                    </li>
                </ul>
                <jdoc:include type="modules" name="top" style="none" />
                <div class="mobilesubnav">
                    <jdoc:include type="modules" name="topright" />
                </div>
            </div>
        </div>

<!--SWIPE-->
        <script>
            jQuery(document).ready(function() {
                jQuery("#home-slides").swiperight(function() {
                    jQuery(this).carousel('prev');
                });
                jQuery("#home-slides").swipeleft(function() {
                    jQuery(this).carousel('next');
                });
            });

        </script>

    </body>
</html>