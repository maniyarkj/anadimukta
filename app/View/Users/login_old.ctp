<div class="users form">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class="page-header">
                <h1><?php echo __('Login'); ?></h1>
            </div>
            <?php echo $this->Form->create('User', array('action' => 'login')); ?>

            <div class="form-group">
                <?php echo $this->Form->input('username', array('class' => 'form-control', 'placeholder' => 'Username')); ?>
            </div>

            <div class="form-group">
                <?php echo $this->Form->input('password', array('class' => 'form-control', 'placeholder' => 'Password')); ?>
            </div>

            <div class="form-group">
                <?php echo $this->Form->submit(__('Login'), array('class' => 'btn btn-primary')); ?>
            </div>

            <?php echo $this->Form->end() ?>

        </div><!-- end col md 12 -->
        <div class="col-md-3"></div>
    </div><!-- end row -->
    <div class="row">
        <div class="col-md-12"><?php
            echo $this->Html->link(
                __("Do not have an account? Register here."),
                array(
                    'controller' => 'users',
                    'action' => 'register',
                    'full_base' => true
                ),
                array()
            );
        ?></div>
    </div>
</div>
