<?php echo $this->BaseForm->create('Center', array('role' => 'form', 'class' => 'form-simple')); ?>
<?php
echo $this->BaseForm->input('name', array(
    'class' => 'form-control',
    'label' => 'Name',
    'hasLanguages' => true,
    'addFormGroupDiv' => true,
));
?>
<div class="form-group">
    <?php
    echo $this->BaseForm->input('zone_id', array('class' => 'form-control', 'placeholder' => 'Zone Id'));
    ?>
</div>
<div class="form-group">
    <?php echo $this->BaseForm->submit(__('Submit'), array('class' => 'btn btn-default')); ?>
</div>

<?php echo $this->BaseForm->end();