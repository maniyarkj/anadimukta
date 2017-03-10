<!DOCTYPE html>
<html>
    <head>
        <title><?php echo  isset($title) ? $title . '|' : ''; ?> Prasang Collection</title>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <meta name="description" content="Collections of swaminarayan prasangs" />
        <meta name="keywords" content="" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.2/css/bootstrap.min.css">
        <!-- Optional theme -->
        <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.2/css/bootstrap-theme.min.css">

        <?php
        echo $this->Html->css(array('datepicker'));
        echo $this->Html->css(array('lib/chosen.min'));
        //echo $this->Html->css(array('animate.min'));
//        echo $this->Html->css('font-awesome.min.css');
        echo $this->Html->css('skel.css', array('pathPrefix' => '/css/spatial/'));
        echo $this->Html->css('style.css', array('pathPrefix' => '/css/spatial/'));
        echo $this->Html->css('style-xlarge.css', array('pathPrefix' => '/css/spatial/'));
        ?>


        <?php
        echo $this->Html->script('jquery');
        echo $this->Html->script('bootstrap-datepicker');
        echo $this->Html->script('lib/chosen.jquery.min');
        echo $this->Html->script('ckeditor/ckeditor');
        echo $this->Html->script('spatial/skel.min.js');
        echo $this->Html->script('spatial/skel-layers.min.js');
        echo $this->Html->script('spatial/init.js');
        echo $this->Html->script('common');
        ?>

        <!-- Latest compiled and minified JavaScript -->
        <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.2/js/bootstrap.min.js"></script>
        <!--[if lt IE 9]>
        <?php
        echo $this->Html->script('html5shiv');
        echo $this->Html->script('respond.min');
        ?>
        <![endif]-->
    </head>
    <body <?php if(isset($isLanding)) : ?>class="landing"<?php endif; ?>>

        <!-- Header -->
        <header id="header" <?php if(isset($isLanding)) : ?>class="alt"<?php endif; ?>>
            <h1><strong><a href="/">Inspiration</a></strong> by SMVS</h1>
            <nav id="nav">
                <ul>
                    <li><?php
                    echo $this->Html->link(
                        __('Home'),
                        array(
                            'controller' => 'index',
                            'full_base' => true,
                        ),
                        array()
                    );
                    ?></li>
                    <li><?php
                    echo $this->Html->link(
                        __('About Us'),
                        array(
                            'controller' => 'pages',
                            'action' => 'about_us',
                            'full_base' => true,
                        ),
                        array()
                    );
                    ?></li>
                    <li><?php
                    echo $this->Html->link(
                        __('Submit Prasang'),
                        array(
                            'controller' => 'prasangrequests',
                            'action' => 'submit',
                            'full_base' => true
                        ),
                        array()
                    );
                    ?></li>
                    <li class="scroll"><a href="#feedback">Feedback</a></li>
                    <li class="scroll"><?php
                    if (!$this->Session->read('Auth.User')) {
                        echo $this->Html->link(
                            __('Login'),
                            array(
                                'controller' => 'users',
                                'action' => 'login',
                                'full_base' => true
                            ),
                            array()
                        );
                    }
                    else {
                        echo $this->Html->link(
                            __('Logout'),
                            array(
                                'controller' => 'users',
                                'action' => 'logout',
                                'full_base' => true
                            ),
                            array()
                        );
                    }
                        ?></li>
                </ul>
            </nav>
        </header>

        <div id="flash"><?php echo $this->Session->flash(); ?></div>
        <?php echo $this->fetch('content'); ?>

        <!-- Footer -->
        <footer id="footer">
            <div class="container">
                <ul class="icons">
                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                    <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                    <li><a href="#"><i class="fa fa-github"></i></a></li>
                </ul>
                <ul class="copyright">
                    <li>&copy; <?php echo date('Y') . ' ' . __('Swaminarayan Mandir Vasna Sanstha'); ?>.</li>
                </ul>
            </div>
        </footer>
        <?php //echo $this->element('sql_dump');?>
        <?php echo $this->Js->writeBuffer(); ?>
    </body>
</html>