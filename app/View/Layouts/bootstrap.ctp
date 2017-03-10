<!DOCTYPE html>
<html lang="en">
    <head>
        <title>
            <?php echo $title_for_layout; ?>
        </title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
        <?php
        echo $this->Html->css(array('datepicker'));
        echo $this->Html->css(array('lib/chosen.min'));
        ?>

        <!-- Latest compiled and minified JavaScript -->
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
        <?php
        echo $this->Html->script('bootstrap-datepicker');
        echo $this->Html->script('common');
        echo $this->Html->script('lib/chosen.jquery.min');
        echo $this->Html->script('ckeditor/ckeditor');
        ?>

        <?php
        echo $this->Html->meta('icon');

        echo $this->fetch('meta');
        echo $this->fetch('css');
        echo $this->fetch('script');
        ?>
        <?php echo $this->Html->css('style'); ?>
        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
          <script src="//cdnjs.cloudflare.com/ajax/libs/html5shiv/3.6.2/html5shiv.js"></script>
          <script src="//cdnjs.cloudflare.com/ajax/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->

        <style type="text/css">
            body{ padding: 50px 0px; }
        </style>

    </head>

    <body>

        <?php echo $this->Element('navigation'); ?>

        <div class="container">

            <div id="flash">
            <?php echo $this->Session->flash(); ?>
            </div>

            <?php echo $this->fetch('content'); ?>

        </div><!-- /.container -->
<?php //echo $this->element('sql_dump');?>
<?php echo $this->Js->writeBuffer(); ?>
    </body>
</html>
