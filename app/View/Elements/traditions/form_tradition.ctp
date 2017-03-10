<?php echo $this->BaseForm->create('Tradition', array(
    'role' => 'form',
    'class' => 'form-simple',
    'enctype' => 'multipart/form-data',
)); ?>

<?php
echo $this->BaseForm->input('title', array(
    'class' => 'form-control',
    'placeholder' => 'Title',
    'label' => 'Title',
    'hasLanguages' => true,
    'addFormGroupDiv' => true,
));
?>

<div class="form-group">
    <?php
    if (isset($this->request->data['Tradition']) && isset($this->request->data['Tradition']['image_url'])) {
        echo '<label for="frmPhotoId">&nbsp;</label>';
        echo $this->Html->link(
            $this->Html->image($this->request->data['Tradition']['image_url'], array(
                'alt' => '',
                'width' => 100)),
            $this->request->data['Tradition']['image_url'],
            array('escape' => false, 'target' => '_blank')
        );
    }
    echo $this->BaseForm->input('image', array(
        'class' => 'form-control',
        'label' => 'Photo',
        'type' => 'file'
    ));
    ?>
    <span class="help-block"><?php echo __('Size') . ': 440x600'; ?></span>
</div>
<?php
echo $this->BaseForm->input('content', array(
    'class' => 'form-control htmleditor allowedContent', // Allowed content will allow all type of html tags i.e <i>
    'type' => 'textarea',
    'label' => 'Details',
    'hasLanguages' => true,
    'addFormGroupDiv' => true,
));
?>
<div class="form-group">
    <?php
    echo $this->BaseForm->input('is_visible', array(
        'class' => 'form-control',
        'label' => 'Is Visible',
        'options' => array('0' => 'No', '1' => 'Yes'),
    ));
    ?>
</div>
<div class="form-group">
    <?php
    echo $this->BaseForm->input('is_main', array(
        'class' => 'form-control',
        'label' => 'Is Main?',
        'options' => array('0' => 'No', '1' => 'Yes'),
    ));
    ?>
</div>
<div class="form-group">
    <?php
    echo $this->BaseForm->input('sortorder', array(
        'class' => 'form-control',
        'label' => 'Sort Order',
    ));
    ?>
</div>
<div class="form-group">
    <?php echo $this->BaseForm->submit(__('Submit'), array('class' => 'btn btn-default'));
    ?>
</div>

<?php echo $this->BaseForm->end() ?>
