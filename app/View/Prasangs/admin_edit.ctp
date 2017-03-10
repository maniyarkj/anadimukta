<div class="prasangs form">
    <div class="row">
        <div class="col-md-12">
            <div class="page-header">
                <h1><?php echo __('Edit Prasang'); ?></h1>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#">Edit</a></li>
                <li><?php echo $this->Html->link(
                    __('Add Media'),
                    array('action' => 'index', 'controller' => 'medias', 'prasang' => $id),
                    array('escape' => false, 'class' => '')); 
                ?></li>
            </ul>
            <br>
            <?php echo $this->element('prasangs/form_prasang'); ?>
        </div><!-- end col md 12 -->
    </div><!-- end row -->
</div>
