<?php echo $this->BaseForm->create('Page', array(
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
<?php
echo $this->BaseForm->input('description', array(
    'class' => 'form-control',
    'placeholder' => 'Small Description.',
    'label' => 'Small Description',
    'type' => 'textarea',
    'hasLanguages' => true,
    'addFormGroupDiv' => true,
));
?>
<?php
echo $this->BaseForm->input('content', array(
    'class' => 'form-control htmleditor allowedContent',
    'placeholder' => 'Content',
    'label' => 'Content',
    'type' => 'textarea',
    'hasLanguages' => true,
    'addFormGroupDiv' => true,
));
?>
<div class="form-group">
    <?php
    if (isset($this->request->data['Page']) && $this->request->data['Page']['image_url']) {
        echo '<label for="frmPhotoId">&nbsp;</label>';
        echo $this->Html->link(
            $this->Html->image($this->request->data['Page']['image_url'], array(
                'alt' => '',
                'width' => 100)),
            $this->request->data['Page']['image_url'],
            array('escape' => false, 'target' => '_blank')
        );
    }
    echo $this->BaseForm->input('image', array(
        'class' => 'form-control',
        'label' => 'Image',
        'type' => 'file'
    ));
    ?>
    <span class="help-block"><?php echo __('Size') .  ': 1170x700'; ?></span>
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
    <?php
    echo $this->BaseForm->input('location', array(
        'class' => 'form-control',
        'label' => 'Location',
        'options' => array('0' => 'None') + Page::getLocationOptions(),
    ));
    ?>
    <span class="help-block">Location on front website, where to link this page.</span>
</div>
<div class="form-group">
    <?php
    echo $this->BaseForm->submit(__('Submit'), array('class' => 'btn btn-default'));
    ?>
</div>

<?php echo $this->BaseForm->end() ?>