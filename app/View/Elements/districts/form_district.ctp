<?php echo $this->BaseForm->create('District', array('role' => 'form', 'class' => 'form-simple')); ?>

<?php echo $this->BaseForm->input('name', array(
    'class' => 'form-control',
    'label' => 'Name',
    'hasLanguages' => true,
    'addFormGroupDiv' => true,
)); ?>

<div class="form-group">
    <?php echo $this->BaseForm->input('country_id', array('class' => 'form-control', 'placeholder' => 'Country Id')); ?>
</div>
<div class="form-group">
<?php
echo $this->BaseForm->input('state_id', array('class' => 'form-control'));
$dynParams = array(
    'updateOnChange' => 'DistrictCountryId',
    'dynData' => array(
        'country_id' => 'DistrictCountryId',
        'state_id' => 'DistrictStateId',
    ),
    'update' => 'DistrictStateId',
    'urlParams' => array(
        'controller'=>'states',
        'action'=>'getByCountry',
        'admin' => false,
    ),
    'triggerOnInit' => true,
);
echo $this->element('js/dynloader', $dynParams);
?>
</div>
<div class="form-group">
    <?php echo $this->BaseForm->submit(__('Submit'), array('class' => 'btn btn-default')); ?>
</div>

<?php echo $this->BaseForm->end() ?>