<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title><?php echo  isset($title) ? $title . ' | ' : ''; ?> anadimukta.org</title>
        <meta name="description" content="<?php echo  isset($metaDescription) ? $metaDescription . ' | ' : 'Swaminarayan Prasang Collection SMVS'; ?>">
        <meta name="author" content="<?php echo  isset($metaAuthor) ? $metaAuthor . ' | ' : ''; ?>Swaminaray Madir Vasna Sanstha">

        <!-- Devices Meta -->
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

        <!-- Put favicon.ico and apple-touch-icon(s).png in the images folder -->
        <link rel="shortcut icon" href="/img/favicon.ico">

        <link href='https://fonts.googleapis.com/css?family=Oswald:400,100,300,500,700%7CLato:400,300,700,900&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
        <!-- Plugins CSS files -->
        <?php
        echo $this->Html->css('assets.css', array('pathPrefix' => '/template/assets/css/'));
        echo $this->Html->css('datepicker', array('pathPrefix' => '/css/'));
        echo $this->Html->css(array('lib/chosen.min'));
        ?>

        <!-- REVOLUTION SLIDER STYLES -->
        <?php
        echo $this->Html->css('pe-icon-7-stroke.css', array('pathPrefix' => '/template/assets/revolution/fonts/pe-icon-7-stroke/css/'));
        echo $this->Html->css('settings.css', array('pathPrefix' => '/template/assets/revolution/css/'));
        echo $this->Html->css('navigation.css', array('pathPrefix' => '/template/assets/revolution/css/'));
        ?>

        <!-- Template CSS files -->
        <?php
        echo $this->Html->css('style.css', array('pathPrefix' => '/template/assets/css/'));
        echo $this->Html->css('shortcodes.css', array('pathPrefix' => '/template/assets/css/'));
        echo $this->Html->css('light.css', array('pathPrefix' => '/template/assets/css/', 'id' => 'theme_css'));
        echo $this->Html->css('6.css', array('pathPrefix' => '/template/assets/css/skins/', 'id' => 'skin_css'));
        ?>

        <?php
        // All scripts are added at end of file
        ?>

    </head>
    <body>

        <!-- site preloader start -->
        <!--<div class="page-loader"></div>-->
        <!-- site preloader end -->

        <div class="pageWrapper">

            <!-- Header start -->
            <div class="head-border"></div>
            <header class="top-head header-1 skew">
                <div class="container">
                    <!-- Logo start -->
                    <div class="logo">
                        <a href="/"><h2 class="uppercase"><span class="main-color">Anadi</span>mukta</h2></a>
                    </div>
                    <!-- Logo end -->

                    <?php echo $this->element('index/menu'); ?>
                </div>
            </header>
            <!-- Header start -->

            <!-- Content start -->
            <?php echo $this->fetch('content'); ?>
            <!-- Content start -->

            <?php echo $this->element('index/footer1'); ?>

        </div>

        <!-- Back to top Link -->
        <a id="to-top" href="#"><span class="fa fa fa-angle-up"></span></a>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>

        <!-- Load JS plugins -->
        <?php
        //echo $this->Html->script('jquery-1.12.0.min.js', array('pathPrefix' => '/template/assets/js/'));
        echo $this->Html->script('assets.js', array('pathPrefix' => '/template/assets/js/'));
        echo $this->Html->script('bootstrap-datepicker');
        echo $this->Html->script('lib/chosen.jquery.min');
        echo $this->Html->script('jquery.kyco.easyshare.min', array('pathPrefix' => '/easyshare/'));
        echo $this->Html->script('ckeditor/ckeditor');
        ?>

        <!-- SLIDER REVOLUTION  -->
        <?php
        echo $this->Html->script('jquery.themepunch.tools.min.js', array('pathPrefix' => '/template/assets/revolution/js/'));
        echo $this->Html->script('jquery.themepunch.revolution.min.js', array('pathPrefix' => '/template/assets/revolution/js/'));
        // general script file
        echo $this->Html->script('script.js', array('pathPrefix' => '/template/assets/js/'));

        echo $this->Html->script('common');
        ?>
        <?php //echo $this->element('sql_dump');?>
        <?php echo $this->Js->writeBuffer(); ?>
        <script>
            (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
            })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

            ga('create', 'UA-47704796-3', 'auto');
            ga('send', 'pageview');

        </script>
    </body>
</html>