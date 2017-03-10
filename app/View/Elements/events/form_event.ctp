<?php echo $this->BaseForm->create('Event', array(
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
echo $this->BaseForm->input('place', array(
    'class' => 'form-control',
    'placeholder' => 'Place',
    'label' => 'Place',
    'hasLanguages' => true,
    'addFormGroupDiv' => true,
));
?>
<div class="form-group">
    <?php
    echo $this->BaseForm->input('startdate', array(
        'class' => 'form-control datepicker',
        'type' => 'text',
        'label' => 'Start Date',
        'data-date-format' => Configure::read('datepicker.default'),
    ));
    ?>
</div>
<div class="form-group">
    <?php
    echo $this->BaseForm->input('enddate', array(
        'class' => 'form-control datepicker',
        'type' => 'text',
        'label' => 'End Date',
        'data-date-format' => Configure::read('datepicker.default'),
    ));
    ?>
</div>
<div class="form-group">
    <?php
    echo $this->BaseForm->input('starttime', array(
        'class' => 'form-control chosen',
        'label' => 'Start Time',
        'options' => array('' => '') + $timeOptions,
    ));
    ?>
</div>
<div class="form-group">
    <?php
    echo $this->BaseForm->input('endtime', array(
        'class' => 'form-control chosen',
        'label' => 'End Time',
        'options' => array('' => '') + $timeOptions,
    ));
    ?>
</div>
<div class="form-group">
    <?php
    echo $this->BaseForm->input('details', array(
        'class' => 'form-control htmleditor',
        'type' => 'textarea',
        'label' => 'Details',
        'hasLanguages' => true,
        'addFormGroupDiv' => true,
    ));
    ?>
</div>
<div class="form-group">
    <?php
    if (isset($this->request->data['Event']) && $this->request->data['Event']['image_url']) {
        echo '<label for="frmPhotoId">&nbsp;</label>';
        echo $this->Html->link(
            $this->Html->image($this->request->data['Event']['image_url'], array(
                'alt' => '',
                'width' => 100)),
            $this->request->data['Event']['image_url'],
            array('escape' => false, 'target' => '_blank')
        );
    }
    echo $this->BaseForm->input('image', array(
        'class' => 'form-control',
        'label' => 'Image',
        'type' => 'file'
    ));
    ?>
    <span class="help-block"><?php echo __('Size') . ': 800x800'; ?></span>
</div>
<div class="form-group">
    <?php
    echo $this->BaseForm->input('is_featured', array(
        'class' => 'form-control',
        'label' => 'Is Featured',
        'options' => array('0' => 'No', '1' => 'Yes'),
    ));
    ?>
</div>
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
    <?php echo $this->BaseForm->submit(__('Submit'), array('class' => 'btn btn-default')); ?>
</div>

<?php echo $this->BaseForm->end() ?>