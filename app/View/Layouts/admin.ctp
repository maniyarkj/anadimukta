<!DOCTYPE html>
<html lang="en">
    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>

        <?php
        // Note: Commented are not being used. Kept it comment as some are require for sb-admin allfeatures
        // Warning: Do not change the version of bootstrap, it will break the modal
        echo $this->Html->css('bootstrap_3_0_2.min');
        echo $this->Html->css('bootstrap-theme_3_0_2.min');
//        echo $this->Html->css('bootstrap.min', array('pathPrefix' => '/bower_components/bootstrap/dist/css/'));
        echo $this->Html->css('metisMenu.min', array('pathPrefix' => '/bower_components/metisMenu/dist/'));
//        echo $this->Html->css('timeline');
        echo $this->Html->css(array('datepicker'));
        echo $this->Html->css(array('lib/chosen.min'));
        echo $this->Html->css('sb-admin-2');
//        echo $this->Html->css('morris', array('pathPrefix' => '/bower_components/morrisjs/'));
        echo $this->Html->css('font-awesome.min.css', array('pathPrefix' => '/bower_components/font-awesome/css/'));
        echo $this->Html->css('style');
        ?>

        <?php
//        echo $this->Html->script('jquery.min', array('pathPrefix' => '/bower_components/jquery/dist/'));
        echo $this->Html->script('bootstrap_3_0_2.min');
        echo $this->Html->script('metisMenu.min', array('pathPrefix' => '/bower_components/metisMenu/dist/'));
//        echo $this->Html->script('raphael-min', array('pathPrefix' => '/bower_components/raphael/'));
//        echo $this->Html->script('morris.min', array('pathPrefix' => '/bower_components/morrisjs/'));
        echo $this->Html->script('bootstrap-datepicker');
//        echo $this->Html->script('morris-data');
        echo $this->Html->script('sb-admin-2');
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
        <?php ?>
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>

    <body>
        <?php echo $this->Element('navigation/admin'); ?>
        <div id="wrapper" class="admin-section">
            <div id="page-wrapper">
                <div class="container-fluid">
                    <div id="flash"><?php echo $this->Session->flash(); ?></div>
                    <?php echo $this->fetch('content'); ?>
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- /#page-wrapper -->
        </div>
        <!-- /#wrapper -->
        <?php //echo $this->element('sql_dump');?>
        <?php echo $this->Js->writeBuffer(); ?>
    </body>
</html>

