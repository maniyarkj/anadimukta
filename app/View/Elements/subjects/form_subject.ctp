<?php

echo $this->Form->create('Subject', array('role' => 'form', 'class' => 'form-simple')); ?>

<div class="form-group">
    <?php echo $this->Form->input('title', array('class' => 'form-control', 'placeholder' => 'Title')); ?>
</div>
<div class="form-group">
    <?php echo $this->Form->input('type', array('class' => 'form-control')); ?>
</div>
<div class="form-group" data-showif="SubjectType=2|3">
<?php
    echo $this->Form->input(
        'main_id',
        array(
            'class' => 'form-control',
        ));
?>
<?php
$dynParams = array(
    'updateOnChange' => 'SubjectType',
    'dynData' => array(
        'main_id' => 'SubjectMainId',
    ),
    'data' => array(
        'type' => 1, // Fetch Main Subjects
    ),
    'update' => 'SubjectMainId',
    'urlParams' => array(
        'controller'=>'subjects',
        'action'=>'getByType',
        'admin' => false,
    ),
    'triggerOnInit' => true,
);
echo $this->element('js/dynloader', $dynParams);
?>
</div>
<div class="form-group" data-showif="SubjectType=3">
    <?php echo $this->Form->input(
            'secondary_id',
            array(
                'class' => 'form-control',
            )); ?>
<?php
$dynParams = array(
    'updateOnChange' => 'SubjectMainId',
    'dynData' => array(
        'main_id' => 'SubjectMainId',
        'secondary_id' => 'SubjectSecondaryId',
    ),
    'data' => array(
        'type' => 2, // Fetch Secondary Subjects
    ),
    'update' => 'SubjectSecondaryId',
    'urlParams' => array(
        'controller'=>'subjects',
        'action'=>'getByType',
        'admin' => false,
    ),
    'triggerOnInit' => true,
);
echo $this->element('js/dynloader', $dynParams);
?>
</div>
<div class="form-group">
    <?php echo $this->Form->submit(__('Submit'), array('class' => 'btn btn-default')); ?>
</div>
    <?php echo $this->Form->end() ?>