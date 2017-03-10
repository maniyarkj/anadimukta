<div class="pageContent">

    <div class="page-title">
        <div class="container">
            <h1><?php echo __('Divine'); ?> <span class="main-color"><?php echo __('Videos'); ?></span></h1>
            <h2><?php echo __('Blessings from Bapji and Swamishree'); ?></h2>
        </div>
    </div>
    <div class="breadcrumbs">
        <div class="container">
            <?php echo $this->Html->link(
                __('Home'),
                array('action' => 'index', 'controller' => 'index'),
                array()); ?>
            <i class="fa fa-long-arrow-right main-color"></i>
            <span><?php echo __('Divine Videos'); ?></span>
        </div>
    </div>

    <div class="md-padding">
        <div class="container">
            <div class="portfolio p-5-cols grid p-style3 no-margin" id="grid" style="margin: 0 auto; width: <?php echo $width; ?>%;">
                <?php foreach ($events as $event) : ?>
                <div class="portfolio-item design">
                    <?php echo $this->element('events/single-box', array('event' => $event)); ?>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    <div class="md-padding">
        <div class="container">
            <?php
            $params = $this->Paginator->params();
            if ($params['pageCount'] > 1) {
                ?>
                <ul class="pagination pagination-sm">
                    <?php
                    echo $this->Paginator->prev('&larr; Previous',
                            array('class' => 'prev', 'tag' => 'li', 'escape' => false),
                            '<a onclick="return false;">&larr; Previous</a>',
                            array('class' => 'prev disabled', 'tag' => 'li', 'escape' => false));
                    echo $this->Paginator->numbers(array('separator' => '', 'tag' => 'li', 'currentClass' => 'active',
                        'currentTag' => 'a'));
                    echo $this->Paginator->next('Next &rarr;',
                            array('class' => 'next', 'tag' => 'li', 'escape' => false),
                            '<a onclick="return false;">Next &rarr;</a>',
                            array('class' => 'next disabled', 'tag' => 'li', 'escape' => false));
                    ?>
                </ul>
            <?php } ?>
        </div>
    </div>
</div>