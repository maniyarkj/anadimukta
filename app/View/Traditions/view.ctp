<div class="pageContent">
    <div class="breadcrumbs">
        <div class="container">
            <?php echo $this->Html->link(
                __('Home'),
                array('action' => 'index', 'controller' => 'index'),
                array()); ?><i class="fa fa-long-arrow-right main-color"></i><span>
                    <?php echo $this->Html->link(
                __('Spiritual Succession'),
                array('action' => 'index', 'controller' => 'spiritual-succession'),
                array()); ?></span>
                <i class="fa fa-long-arrow-right main-color"></i>
                <span><?php echo $tradition['Tradition']['title']; ?></span>
        </div>
    </div>
    <div class="md-padding">
        <div class="container">
            <div class="row row-eq-height">
                <div class="col-md-3">
                    <?php echo $this->Html->image(
                            $tradition['Tradition']['image_url'] ?: '/img/default-event.jpg',
                            array()
                    ); ?>
                </div>
                <div class="col-md-1">
                    <div class="vertical-sep"></div>
                </div>
                <div class="col-md-8">
                    <div class="heading style3">
                        <h3 class="uppercase"><i class="fa fa-map-marker"></i><?php echo $tradition['Tradition']['title']; ?></h3>
                    </div>
                    <?php echo $tradition['Tradition']['content']; ?>
                </div>
            </div>
        </div>
    </div>
</div>