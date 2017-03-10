<div class="pageContent">
    <div class="page-title">
        <div class="container">
            <h1><?php echo __('Submit'); ?> <span class="main-color"><?php echo __('Prasang'); ?></span></h1>
            <h3><?php echo __('Share your devine experience with us.'); ?></h3>
        </div>
    </div>
    <div class="breadcrumbs">
        <div class="container">
            <?php echo $this->Html->link(
                __('Home'),
                array('action' => 'index', 'controller' => 'index'),
                array()); ?><i class="fa fa-long-arrow-right main-color"></i><span><?php echo __('Submit Prasang'); ?></span>
        </div>
    </div>

    <div class="container">
        <div class="row row-eq-height">
            <div class="col-md-9 xs-padding main-content">
                <?php echo $this->element('prasangrequests/form_request'); ?>
            </div>

            <?php echo $this->requestAction(
                    array('controller' => 'prasangs', 'action' => 'sidebar'),
                    array('return')
            ); ?>
        </div>
    </div>

</div>