<?php
    $forgotAction = $this->Html->url(
        array(
            'controller' => 'users',
            'action' => 'forgot_password',
            'full_base' => true
        ),
        array()
    );
?>
<?php echo $this->Form->create('User', array(
    'action' => 'login',
    'id' => "login-form",
    'style' => 'display: block;'
)); ?>
    <div class="form-group">
        <?php echo $this->Form->text('username', array(
            'class' => 'form-control',
            'placeholder' => 'Username'));
        ?>
    </div>
    <div class="form-group">
        <?php echo $this->Form->password('password', array(
            'class' => 'form-control',
            'placeholder' => 'Password'));
        ?>
    </div>
    <!--div class="form-group text-center">
        <input type="checkbox" tabindex="3" class="" name="remember" id="remember">
        <label for="remember"> Remember Me</label>
    </div-->
    <div class="form-group">
        <div class="row">
            <div class="col-sm-6 col-sm-offset-3">
                <input type="submit" name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-login" value="Log In">
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="row">
            <div class="col-lg-12">
                <div class="text-center">
                    <a href="<?php echo $forgotAction; ?>" tabindex="5" class="forgot-password">Forgot Password?</a>
                </div>
            </div>
        </div>
    </div>
</form>