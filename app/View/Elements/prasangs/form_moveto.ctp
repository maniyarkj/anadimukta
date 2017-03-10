<?php
echo $this->Form->create('Prasang', array(
    'role' => 'form',
    'url' => array('action' => 'status', $prasang['Prasang']['id']),
    'class' => 'form-simple ajaxForm',
    'enctype' => 'multipart/form-data'));
?>
<div class="form-group">
    <?php
    echo $this->Form->input('status', array(
        'class' => 'form-control',
        'label' => 'Move to',
    ));
    ?>
</div>
<?php if ($prasang['Prasang']['status'] == Prasang::STATUS_APPROVED
        || $prasang['Prasang']['status'] == Prasang::STATUS_PROOFING
        || $prasang['Prasang']['status'] == Prasang::STATUS_PASSED_BY_SLV) { ?>
<div class="form-group">
    <?php
    echo $this->Form->input('published_date', array(
        'class' => 'form-control datepicker',
        'label' => 'Publish Date',
        'type' => 'text',
        'value' => $prasang['Prasang']['published_date'],
        'data-date-format' => Configure::read('datepicker.default'),
    ));
    ?>
    <span class="help-block">Set date after which the Prasang should be live.</span>
</div>
<?php } ?>
<div class="form-group">
    <?php
    echo $this->Form->input('note', array(
        'class' => 'form-control',
        'type' => 'textarea',
    ));
    ?>
</div>
<div class="form-group">
    <?php echo $this->Form->submit(__('Submit'),
            array('class' => 'btn btn-primary')); ?>
</div>

<?php echo $this->Form->end() ?>