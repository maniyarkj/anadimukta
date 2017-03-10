<?php echo $this->BaseForm->create('Section', array('role' => 'form', 'class' => 'form-simple')); ?>

<?php
echo $this->BaseForm->input('name', array(
    'class' => 'form-control',
    'label' => 'Section Name',
    'hasLanguages' => true,
    'addFormGroupDiv' => true,
));
?>
<?php
echo $this->BaseForm->input('sortorder', array(
    'class' => 'form-control',
    'label' => 'Sort Order',
    'hasLanguages' => false,
    'addFormGroupDiv' => false,
));
?>

<div class="form-group">
    <?php echo $this->BaseForm->submit(__('Submit'), array('class' => 'btn btn-default')); ?>
</div>

<?php echo $this->BaseForm->end() ?>