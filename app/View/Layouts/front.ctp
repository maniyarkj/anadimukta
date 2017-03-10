<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="themesplay">
        <title><?php echo  isset($title) ? $title . '|' : ''; ?> Prasang Collection</title>

        <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>-->
        <!-- Bootstrap -->
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.2/css/bootstrap.min.css">
        <!-- Optional theme -->
        <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.2/css/bootstrap-theme.min.css">

        <?php
        echo $this->Html->css(array('datepicker'));
        echo $this->Html->css(array('lib/chosen.min'));
        //echo $this->Html->css(array('animate.min'));
        echo $this->Html->css('font-awesome.min.css', array('pathPrefix' => '/bower_components/font-awesome/css/'));
        echo $this->Html->css('style-front');
        ?>
        <!-- Latest compiled and minified JavaScript -->
        <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.2/js/bootstrap.min.js"></script>

        <?php
        echo $this->Html->script('jquery');
        echo $this->Html->script('bootstrap-datepicker');
        echo $this->Html->script('lib/chosen.jquery.min');
        echo $this->Html->script('ckeditor/ckeditor');
        echo $this->Html->script('common');
        ?>
        <!--[if lt IE 9]>
        <?php
        echo $this->Html->script('html5shiv');
        echo $this->Html->script('respond.min');
        ?>
        <![endif]-->
    </head>

    <body>

        <header id="header">
            <nav id="main-nav" class="navbar navbar-default navbar-fixed-top" role="banner">
                <div class="container">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <div class="logo">
                            <h2>
                                <a class="navbar-brand" href="/"><?php echo __("Prasang Collection"); ?></a>
                            </h2>
                        </div>
                    </div>

                    <div class="collapse navbar-collapse navbar-right">
                        <ul class="nav navbar-nav">
                            <li class="scroll active"><?php
                                echo $this->Html->link(
                                    __('Home'),
                                    array(
                                        'controller' => 'index',
                                        'full_base' => true,
                                    ),
                                    array()
                                );
                                ?></li>
                            <li class="scroll"><?php
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
                            <li class="scroll"><?php
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
                    </div>
                </div><!--/.container-->
            </nav><!--/nav-->
        </header><!--/header-->
        <section id="content">
            <div class="container">
                <div id="flash"><?php echo $this->Session->flash(); ?></div>
                <div class="row">
                    <div class="col-md-8">
                        <?php echo $this->fetch('content'); ?>
                    </div>
                    <div class="col-md-4">
                        <?php echo $this->requestAction('index/sidebar', array('autoRender' => true)); ?>
                    </div>
                </div>
            </div>
        </section>
        <footer id="footer">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        &copy; <?php echo date('Y') . ' ' . __('Swaminarayan Mandir Vasna Sanstha'); ?>.
                    </div>
                    <div class="col-sm-6">
                        <ul class="social-icons">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                            <li><a href="#"><i class="fa fa-github"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer><!--/#footer-->
        <?php //echo $this->element('sql_dump');?>
        <?php echo $this->Js->writeBuffer(); ?>
    </body>
</html>