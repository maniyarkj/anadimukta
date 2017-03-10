<?php echo $this->BaseForm->create('State', array('role' => 'form', 'class' => 'form-simple')); ?>
<?php
echo $this->BaseForm->input('name', array(
    'class' => 'form-control',
    'placeholder' => 'Name',
    'label' => 'Name',
    'hasLanguages' => true,
    'addFormGroupDiv' => true,
));
?>

<div class="form-group">
    <?php
    echo $this->BaseForm->input('country_id', array('class' => 'form-control',));
    ?>
</div>
<div class="form-group">
    <?php
    echo $this->BaseForm->submit(__('Submit'), array(
        'class' => 'btn btn-default'));
    ?>
</div>

<?php echo $this->BaseForm->end() ?>