<?php
//echo $this->Html->script('jquery.ui.widget', array('pathPrefix' => '/js/lib/fileupload/'));
//echo $this->Html->script('jquery.iframe-transport', array('pathPrefix' => '/js/lib/fileupload/'));
//echo $this->Html->script('jquery.fileupload', array('pathPrefix' => '/js/lib/fileupload/'));

echo $this->BaseForm->create('Prasang', array('role' => 'form', 'class' => 'form-simple', 'enctype' => 'multipart/form-data')); ?>

<div class="form-group">
    <?php
    echo $this->BaseForm->input('section_id',
            array('class' => 'form-control', 'placeholder' => 'Section'));
    ?>
</div>
<div class="form-group">
    <?php
    echo $this->BaseForm->input('with_id',
            array('class' => 'form-control', 'placeholder' => 'With'));
    ?>
</div>
<div class="form-group">
    <?php
    echo $this->BaseForm->input('grade',
            array('class' => 'form-control', 'placeholder' => 'Grade'));
    ?>
</div>
<div class="form-group">
    <?php
    echo $this->BaseForm->input('title',
            array('class' => 'form-control', 'placeholder' => 'Title'));
    ?>
</div>
<div class="form-group">
    <?php
    echo $this->BaseForm->input('Subject',
            array('class' => 'form-control multiselect'));
    ?>
</div>
<div class="form-group">
    <?php
    echo $this->BaseForm->input('date',
            array(
                'class' => 'form-control datepicker',
                'placeholder' => 'Date',
                'type' => 'text',
                'data-date-format' => Configure::read('datepicker.default'),
            ));
    ?>
    <span class="help-block"><?php echo __('Date of Prasang happened.'); ?></span>
</div>

<?php
echo $this->BaseForm->input('place', array(
    'class' => 'form-control',
    'label' => 'Place',
    'placeholder' => 'Place',
    'hasLanguages' => true,
    'addFormGroupDiv' => true,
    'helpText' => 'Place where Prasang happened.',
));
?>
<?php
echo $this->BaseForm->input('event', array(
    'class' => 'form-control',
    'placeholder' => 'Event',
    'label' => 'Event',
    'hasLanguages' => true,
    'addFormGroupDiv' => true,
));
?>
<?php
echo $this->BaseForm->input('content', array(
    'class' => 'form-control htmleditor',
    'label' => 'Content',
    'type' => 'textarea',
    'data-forprasang' => 'true',
    'hasLanguages' => true,
    'addFormGroupDiv' => true,
));
?>
<?php
echo $this->BaseForm->input('notes', array('class' => 'form-control', 'addFormGroupDiv' => true));
?>
<div class="form-group">
    <?php
    echo $this->BaseForm->input('is_personal',
            array(
                'class' => 'form-control',
                'placeholder' => 'Is Personal',
                'options' => array('0' => 'No', '1' => 'Yes')));
    ?>
</div>
<?php
echo $this->BaseForm->input('donor_name', array(
    'class' => 'form-control',
    'placeholder' => 'Donor Name',
    'label' => 'Donor Name',
    'hasLanguages' => true,
    'addFormGroupDiv' => true,
));
?>
<div class="form-group">
    <?php
    echo $this->BaseForm->input('donor_phone',
            array('class' => 'form-control', 'placeholder' => 'Donor Phone'));
    ?>
</div>
<div class="form-group">
    <?php
    echo $this->BaseForm->input('donor_email',
            array('class' => 'form-control', 'placeholder' => 'Donor Email'));
    ?>
</div>
<div class="form-group">
    <?php
    echo $this->BaseForm->input('donor_zone_id',
            array('class' => 'form-control', 'placeholder' => 'Donor Zone Id'));
    ?>
</div>
<div class="form-group">
    <?php
    echo $this->BaseForm->input(
            'donor_center_id',
            array('class' => 'form-control')
        );
    $dynParams = array(
        'updateOnChange' => 'PrasangDonorZoneId',
        'dynData' => array(
            'zone_id' => 'PrasangDonorZoneId',
            'center_id' => 'PrasangDonorCenterId',
        ),
        'update' => 'PrasangDonorCenterId',
        'urlParams' => array(
            'controller'=>'centers',
            'action'=>'getByZone',
            'admin' => false,
        ),
        'triggerOnInit' => true,
    );
    echo $this->element('js/dynloader', $dynParams);
    ?>
</div>
<div class="form-group">
    <?php
    echo $this->BaseForm->input('author_id',
            array('class' => 'form-control', 'placeholder' => 'Author Id'));
    ?>
</div>
<div class="form-group">
    <?php
    echo $this->BaseForm->input('is_rewrite',
            array(
                'class' => 'form-control',
                'placeholder' => 'Is Rewrite',
                'options' => array('0' => 'No', '1' => 'Yes')
            ));
    ?>
</div>
<div class="form-group">
    <?php
    echo $this->BaseForm->input('rewrite_date',
            array(
                'class' => 'form-control datepicker',
                'placeholder' => 'Rewrite Date',
                'type' => 'text',
                'data-date-format' => Configure::read('datepicker.default'),
            ));
    ?>
</div>
<div class="form-group">
    <?php
    echo $this->BaseForm->input('has_proof',
            array(
                'class' => 'form-control',
                'placeholder' => 'Has Proof',
                'options' => array('0' => 'No', '1' => 'Yes'),
            ));
    ?>
</div>
<div class="form-group">
    <?php
    echo $this->BaseForm->input('proof_date',
            array(
                'class' => 'form-control datepicker',
                'placeholder' => 'Proof Date',
                'type' => 'text',
                'data-date-format' => Configure::read('datepicker.default'),
            ));
    ?>
</div>
<div class="form-group">
    <?php
    echo $this->BaseForm->input('x_publish_date',
            array(
                'label' => 'Expected Publish Date',
                'class' => 'form-control datepicker',
                'placeholder' => 'Expected Publish Date',
                'type' => 'text',
                'data-date-format' => Configure::read('datepicker.default'),
            ));
    ?>
</div>
<?php if (User::isAdmin($user)) : ?>
<div class="form-group">
    <?php
    echo $this->BaseForm->input('published_date',
        array(
            'label' => 'Publish Date',
            'class' => 'form-control datepicker',
            'placeholder' => 'Publish Date',
            'type' => 'text',
            'data-date-format' => Configure::read('datepicker.default'),
        ));
    ?>
</div>
<?php endif; ?>
<div class="form-group">
    <?php
    if (User::isAdmin($user)) {
        echo $this->BaseForm->input('status',
                array(
                    'class' => 'form-control',
                    'placeholder' => 'Status',
                ));
    }
    if (User::isSlvAdmin($user)) {
        echo $this->BaseForm->input('status',
                array(
                    'type' => 'hidden',
                    'value' => Prasang::STATUS_WRITING,
                ));
    }
    if (User::isDtpAdmin($user)) {
        echo $this->BaseForm->input('status',
                array(
                    'type' => 'hidden',
                    'value' => Prasang::STATUS_DTP,
                ));
    }

    ?>
</div>
<div class="form-group">
    <?php
    echo $this->BaseForm->input('UserType',
            array(
                'class' => 'form-control multiselect',
            ));
    ?>
    <span class="help-block"><?php echo __('User Type who can view this Prasang.'); ?></span>
</div>
<div class="form-group">
    <?php
    echo $this->BaseForm->input('is_featured',
            array(
                'class' => 'form-control',
                'label' => 'Featured',
                'options' => array('0' => 'No', '1' => 'Yes'),
            ));
    ?>
</div>
<div class="form-group">
    <?php
    if (isset($this->request->data['Prasang']) && $this->request->data['Prasang']['image_url']) {
        echo '<label for="frmPhotoId">&nbsp;</label>';
        echo $this->Html->link(
            $this->Html->image($this->request->data['Prasang']['image_url'], array(
                'alt' => '',
                'width' => 100)),
            $this->request->data['Prasang']['image_url'],
            array('escape' => false, 'target' => '_blank')
        );
    }
    ?>
</div>
<div class="form-group">
    <?php
    if (isset($this->request->data['Prasang']) && $this->request->data['Prasang']['image_url']) {
        echo $this->BaseForm->input('Prasang.image.remove', array(
            'class' => 'checkbox-inline',
            'label' => 'Delete Image',
            'type' => 'checkbox',
            'div' => false,
            'format' => array('before', 'label', 'between', 'input', 'after', 'error'),
            'value' => 1,
        ));
    }
    ?>
</div>
<div class="form-group">
    <?php
    echo $this->BaseForm->input('image', array(
        'class' => 'form-control',
        'label' => 'Image',
        'type' => 'file'
    ));
    ?>
    <span class="help-block"><?php echo __('Size') .  ': 1170x700'; ?></span>
</div>
<div class="form-group">
    <?php echo $this->BaseForm->submit(__('Submit'),
            array('class' => 'btn btn-default')); ?>
</div>

<?php echo $this->BaseForm->end(); ?>

<?php $this->Html->scriptStart(array('inline' => false)); ?>
var placeholderJson = <?php echo json_encode($placeholderOptions); ?>;
var placeholderItems = Object.keys(placeholderJson).map(function(k) { return [k, placeholderJson[k]]; });
var defaultItem = placeholderItems[0];
<?php
$this->Html->scriptEnd();