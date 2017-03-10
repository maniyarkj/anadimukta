<div class="pageContent">

    <div class="page-title">
        <div class="container">
            <h1><?php echo $this->BaseText->colored($page['Page']['title']); ?></h1>
            <h3></h3>
        </div>
    </div>
    <div class="breadcrumbs">
        <div class="container">
            <?php echo $this->Html->link(
                __('Home'),
                array('action' => 'index', 'controller' => 'index'),
                array());
            ?><i class="fa fa-long-arrow-right main-color"></i>
            <span><?php echo $page['Page']['title']; ?></span>
        </div>
    </div>

    <div class="container">
        <div class="row row-eq-height">
            <div class="col-md-12 md-padding main-content">
                <?php echo $page['Page']['content']; ?>
            </div>
        </div>
    </div>

</div>