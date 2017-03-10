<?php echo $this->BaseForm->create('Taluka', array('role' => 'form', 'class' => 'form-simple')); ?>

<?php echo $this->BaseForm->input('name', array(
    'class' => 'form-control',
    'placeholder' => 'Name',
    'label' => 'Name',
    'hasLanguages' => true,
    'addFormGroupDiv' => true,
));?>
<div class="form-group">
<?php echo $this->BaseForm->input('country_id', array('class' => 'form-control'));?>
</div>
<div class="form-group">
<?php
echo $this->BaseForm->input('state_id', array('class' => 'form-control'));
$dynParams = array(
    'updateOnChange' => 'TalukaCountryId',
    'dynData' => array(
        'country_id' => 'TalukaCountryId',
        'state_id' => 'TalukaStateId',
    ),
    'update' => 'TalukaStateId',
    'urlParams' => array(
        'controller'=>'states',
        'action'=>'getByCountry',
        'admin' => false,
    ),
    'onLoaded' => '$("#TalukaStateId").trigger("change");',
    'triggerOnInit' => true,
);
echo $this->element('js/dynloader', $dynParams);
?>
</div>
<div class="form-group">
<?php
echo $this->BaseForm->input('district_id', array('class' => 'form-control'));
$dynParams = array(
    'updateOnChange' => 'TalukaStateId',
    'dynData' => array(
        'country_id' => 'TalukaCountryId',
        'state_id' => 'TalukaStateId',
        'district_id' => 'TalukaDistrictId',
    ),
    'update' => 'TalukaDistrictId',
    'urlParams' => array(
        'controller'=>'districts',
        'action'=>'getByCountryState',
        'admin' => false,
    ),
    'triggerOnInit' => false,
);
echo $this->element('js/dynloader', $dynParams);
?>
</div>
<div class="form-group">
<?php echo $this->BaseForm->submit(__('Submit'), array('class' => 'btn btn-default')); ?>
</div>

<?php echo $this->BaseForm->end() ?>