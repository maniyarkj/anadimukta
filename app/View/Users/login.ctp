<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-login">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-6">
                            <a href="#" class="active" id="login-form-link">Login</a>
                        </div>
                        <div class="col-xs-6">
                            <a href="#" id="register-form-link">Register</a>
                        </div>
                    </div>
                    <hr>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <?php echo $this->element('users/form_login'); ?>
                            <?php echo $this->element('users/form_register'); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12" style="text-align: center;">
            <?php
            echo $this->Html->link(
                __('Go back to Website'),
                array(
                    'controller' => 'index',
                    'action' => 'index',
                    'full_base' => true
                ),
                array()
            );
            ?>
        </div>
    </div>
</div>