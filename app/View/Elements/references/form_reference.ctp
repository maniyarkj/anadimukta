<?php
echo $this->Form->create('Reference', array(
    'role' => 'form',
    'class' => 'form-simple'));
?>
<div class="form-group">
    <?php
    echo $this->Form->input('title', array(
        'class' => 'form-control',
        'placeholder' => 'Title'
    ));
    ?>
</div>
<div class="form-group">
    <?php
    echo $this->Form->input('Subject', array(
        'class' => 'form-control multiselect',
        'placeholder' => 'Modified'));
    ?>
</div>
<div class="form-group">
    <?php
    echo $this->Form->input('grade', array(
        'class' => 'form-control',
        'placeholder' => 'Grade'));
    ?>
</div>
<div class="form-group">
    <?php
    echo $this->Form->input('reference_type_id', array(
        'class' => 'form-control',
        'placeholder' => 'Reference Type Id'));
    ?>
</div>
<div class="form-group">
    <?php
    echo $this->Form->input('content', array(
        'class' => 'form-control htmleditor',
        'placeholder' => 'Content'));
    ?>
</div>
<?php if ($currentUser['type'] == User::TYPE_ADMIN) { ?>
<div class="form-group">
    <?php
    echo $this->Form->input('status', array(
        'class' => 'form-control',
        'placeholder' => 'Status'));
    ?>
</div>
<?php } ?>
<div class="form-group">
    <?php
    echo $this->Form->submit(__('Submit'), array(
        'class' => 'btn btn-default'));
    ?>
</div>

<?php echo $this->Form->end() ?>