<?php
echo $this->Form->create('User', array(
    'role' => 'form',
    'class' => 'form-simple'));
?>

<div class="form-group">
    <?php
    echo $this->Form->input('id',
                            array(
        'class' => 'form-control',
        'placeholder' => 'Id'));
    ?>
</div>
<div class="form-group">
    <?php
    echo $this->Form->input('username', array(
        'class' => 'form-control',
        'placeholder' => 'Username'));
    ?>
</div>
<div class="form-group">
    <?php
    echo $this->Form->input('password', array(
        'class' => 'form-control',
        'type' => 'password',
        'placeholder' => 'New Password',
        'value' => ''));
    ?>
    <span class="help-block"><?php echo __('Enter password to change it, otherwise keep it empty.'); ?></span>
</div>
<div class="form-group">
    <?php
    echo $this->Form->input('type', array(
        'class' => 'form-control',
        'placeholder' => 'Group Id'));
    ?>
</div>
<div class="form-group">
    <?php
    echo $this->Form->submit(__('Submit'), array(
        'class' => 'btn btn-default'));
    ?>
</div>

<?php echo $this->Form->end() ?>