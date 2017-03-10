<?php echo $this->BaseForm->create('City', array('role' => 'form', 'class' => 'form-simple')); ?>

<?php echo $this->BaseForm->input('name', array(
    'class' => 'form-control',
    'label' => 'Name',
    'hasLanguages' => true,
    'addFormGroupDiv' => true,
)); ?>
<div class="form-group">
<?php echo $this->BaseForm->input('country_id', array('class' => 'form-control')); ?>
</div>
<div class="form-group">
<?php
echo $this->BaseForm->input('state_id', array('class' => 'form-control'));
$dynParams = array(
    'updateOnChange' => 'CityCountryId',
    'dynData' => array(
        'country_id' => 'CityCountryId',
        'state_id' => 'CityStateId',
    ),
    'update' => 'CityStateId',
    'urlParams' => array(
        'controller'=>'states',
        'action'=>'getByCountry',
        'admin' => false,
    ),
    'onLoaded' => '$("#CityStateId").trigger("change");',
    'triggerOnInit' => true,
);
echo $this->element('js/dynloader', $dynParams);
?>
</div>
<div class="form-group">
<?php
echo $this->BaseForm->input('district_id', array('class' => 'form-control'));
$dynParams = array(
    'updateOnChange' => 'CityStateId',
    'dynData' => array(
        'country_id' => 'CityCountryId',
        'state_id' => 'CityStateId',
        'district_id' => 'CityDistrictId',
    ),
    'update' => 'CityDistrictId',
    'urlParams' => array(
        'controller'=>'districts',
        'action'=>'getByCountryState',
        'admin' => false,
    ),
    'onLoaded' => '$("#CityDistrictId").trigger("change");',
    'triggerOnInit' => false,
);
echo $this->element('js/dynloader', $dynParams);
?>
</div>
<div class="form-group">
<?php
echo $this->BaseForm->input('taluka_id', array('class' => 'form-control'));
$dynParams = array(
    'updateOnChange' => 'CityDistrictId',
    'dynData' => array(
        'country_id' => 'CityCountryId',
        'state_id' => 'CityStateId',
        'district_id' => 'CityDistrictId',
        'taluka_id' => 'CityTalukaId',
    ),
    'update' => 'CityTalukaId',
    'urlParams' => array(
        'controller'=>'talukas',
        'action'=>'getByCountryStateDistrict',
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