<div class="pageContent">
    <div class="page-title">
        <div class="container">
            <h1><?php echo __('Feedback'); ?></h1>
            <h3><?php echo __('Share your feedback about website and help us improve.'); ?></h3>
        </div>
    </div>
    <div class="breadcrumbs">
        <div class="container">
            <?php echo $this->Html->link(
                __('Home'),
                array('action' => 'index', 'controller' => 'index'),
                array()); ?><i class="fa fa-long-arrow-right main-color"></i><span><?php echo __('Submit Feedback'); ?></span>
        </div>
    </div>

    <div class="container inner-contact">
        <div class="heading main centered">
                <h3 class="uppercase lg-title"><span class="main-color"><?php echo __('Submit'); ?> </span> <?php echo __('Feedback'); ?></h3><b class="head-sep"><u></u></b>
        </div>
        <?php echo $this->element('feedbacks/frontform_feedback'); ?>
    </div>

</div>