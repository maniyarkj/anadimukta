<?php echo $this->BaseForm->create('Quote', array(
    'role' => 'form',
    'class' => 'form-simple',
    'enctype' => 'multipart/form-data',
)); ?>

<?php
echo $this->BaseForm->input('quote', array(
    'class' => 'form-control',
    'placeholder' => 'Quote',
    'label' => 'Quote',
    'type' => 'textarea',
    'hasLanguages' => true,
    'addFormGroupDiv' => true,
));
?>
<?php
echo $this->BaseForm->input('by', array(
    'class' => 'form-control',
    'placeholder' => 'By',
    'label' => 'By',
    'hasLanguages' => true,
    'addFormGroupDiv' => true,
));
?>
<div class="form-group">
    <?php
    if (isset($this->request->data['Quote']) && $this->request->data['Quote']['image_url']) {
        echo '<label for="frmPhotoId">&nbsp;</label>';
        echo $this->Html->link(
            $this->Html->image($this->request->data['Quote']['image_url'], array(
                'alt' => '',
                'width' => 100)),
            $this->request->data['Quote']['image_url'],
            array('escape' => false, 'target' => '_blank')
        );
    }
    echo $this->BaseForm->input('image', array(
        'class' => 'form-control',
        'label' => 'Photo',
        'type' => 'file'
    ));
    ?>
    <span class="help-block"><?php echo __('Size') . ': 640x640'; ?></span>
</div>
<div class="form-group">
    <?php
    echo $this->BaseForm->input('is_featured', array(
        'class' => 'form-control',
        'label' => 'Featured',
        'options' => array('0' => 'No', '1' => 'Yes'),
    ));
    ?>
</div>
<div class="form-group">
    <?php
    echo $this->BaseForm->input('is_visible', array(
        'class' => 'form-control',
        'label' => 'Visible',
        'options' => array('0' => 'No', '1' => 'Yes'),
    ));
    ?>
</div>
<div class="form-group">
    <?php echo $this->BaseForm->submit(__('Submit'), array('class' => 'btn btn-default')); ?>
</div>

<?php echo $this->BaseForm->end() ?>