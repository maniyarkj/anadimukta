<?php

echo $this->Form->create('Prasangrequest', array('role' => 'form', 'class' => 'form-prasang', 'enctype' => 'multipart/form-data')); ?>

<div class="form-group">
    <?php
    echo $this->Form->input('title', array(
        'class' => 'form-control',
        'placeholder' => 'Title',
        'title' => __('Add Title of Prasang'),
        'rel' => 'txtTooltip'
    ));
    ?>
</div>
<div class="form-group">
    <?php
    echo $this->Form->input('section_id', array(
        'class' => 'form-control',
        'placeholder' => 'Section',
        'title' => __('Select whose this prasang is of.'),
        'rel' => 'txtTooltip',
    ));
    ?>
</div>
<div class="form-group">
    <?php
    echo $this->Form->input('with_id', array(
        'class' => 'form-control',
        'label' => 'With',
        'title' => __('Select with whom prasang happened.'),
        'rel' => 'txtTooltip',
    ));
    ?>
</div>
<div class="form-group">
    <?php
    echo $this->Form->input('date', array(
        'class' => 'form-control datepicker',
        'placeholder' => 'Date',
        'type' => 'text',
        'label' => 'Happened on',
        'title' => __('Date on which prasang happened'),
        'data-date-format' => Configure::read('datepicker.default'),
        'rel' => 'txtTooltip',
    ));
    ?>
</div>
<div class="form-group">
    <?php echo $this->Form->input('place', array(
        'class' => 'form-control',
        'placeholder' => __('Place'),
        'title' => __('Place of prasang where it happened.'),
        'rel' => 'txtTooltip',
    ));
    ?>
</div>
<div class="form-group">
    <?php
    echo $this->Form->input('language', array(
        'class' => 'form-control',
        'title' => __('Language in which you are adding prasang.'),
        'rel' => 'txtTooltip',
    ));
    ?>
</div>
<div class="form-group">
    <?php
    echo $this->Form->input('content', array(
        'class' => 'form-control htmleditor',
    ));
    ?>
</div>
<div class="form-group">
    <?php
    echo $this->Form->input('notes', array(
        'class' => 'form-control',
        'label' => __('Any special note'),
        'type' => 'textarea',
        'title' => __('Any special notes related to prasang.'),
        'rel' => 'txtTooltip',
    ));
    ?>
</div>
<?php /* <div class="form-group">
    <?php
    echo $this->Form->input('is_personal', array(
        'class' => 'form-control',
        'label' => __('Is your Personal Experience?'),
        'options' => array('1' => 'Yes', '0' => 'No'),
        'title' => __('Is this your personal experience?'),
        'rel' => 'txtTooltip',
    ));
    ?>
</div> */ ?>
<div class="form-group" data-runOnInit="true">
    <?php
    echo $this->Form->input('donor_name', array(
        'class' => 'form-control',
        'placeholder' => __('Donor Name'),
        'required' => false,
        'title' => __('Name of donor'),
        'rel' => 'txtTooltip',
    ));
    ?>
</div>
<div class="form-group" data-runOnInit="true">
    <?php
    echo $this->Form->input('donor_phone', array(
        'class' => 'form-control',
        'placeholder' => __('Donor Phone'),
        'required' => false,
        'title' => __('Phone of donor'),
        'rel' => 'txtTooltip',
    ));
    ?>
</div>
<div class="form-group" data-runOnInit="true">
    <?php
    echo $this->Form->input('donor_email', array(
        'class' => 'form-control',
        'placeholder' => __('Donor Email'),
        'required' => false,
        'title' => __('Email of donor'),
        'rel' => 'txtTooltip',
    ));
    ?>
</div>
<div class="form-group" data-runOnInit="true">
    <?php
    echo $this->Form->input('donor_zone_id', array(
        'class' => 'form-control',
        'required' => false,
        'title' => __('Zone of donor'),
        'rel' => 'txtTooltip',
    ));
    ?>
</div>
<div class="form-group" data-runOnInit="true">
    <?php
    echo $this->Form->input('donor_center_id', array(
        'class' => 'form-control',
        'required' => false,
        'title' => __('Center of donor.'),
        'rel' => 'txtTooltip',
    ));
    $dynParams = array(
        'updateOnChange' => 'PrasangrequestDonorZoneId',
        'dynData' => array(
            'zone_id' => 'PrasangrequestDonorZoneId',
            'center_id' => 'PrasangrequestDonorCenterId',
        ),
        'update' => 'PrasangrequestDonorCenterId',
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
    <?php echo $this->Form->submit(__('Submit'), array(
        'class' => 'btn btn-primary',
    )); ?>
</div>

<?php echo $this->Form->end(); ?>