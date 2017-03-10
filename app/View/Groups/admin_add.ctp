<div class="groups form">

    <div class="row">
        <div class="col-md-12">
            <div class="page-header">
                <h1><?php echo __('Add Group'); ?></h1>
            </div>
        </div>
    </div>
    <div class="row">

        <div class="col-md-12">
            <?php echo $this->Form->create('Group', array('role' => 'form', 'class' => 'form-simple')); ?>

            <div class="form-group">
                <?php
                echo $this->Form->input('name', array('class' => 'form-control', 'placeholder' => 'Name'));
                ?>
            </div>
            <div class="form-group">
                <?php
                echo $this->Form->submit(__('Submit'), array('class' => 'btn btn-default'));
                ?>
            </div>

            <?php echo $this->Form->end() ?>

        </div><!-- end col md 12 -->
    </div><!-- end row -->
</div>
