<?php echo $this->Form->create('UserDetail', array(
    'role' => 'form',
    'class' => 'form-simple',
    'enctype' => 'multipart/form-data'
)); ?>

<div class="form-group">
    <?php
    echo $this->Form->input('User.username',
            array('class' => 'form-control', 'placeholder' => 'Username'));
    ?>
</div>
<div class="form-group">
    <?php
    echo $this->Form->input('User.password', array(
        'class' => 'form-control',
        'type' => 'password',
        'placeholder' => 'New Password',
        'value' => ''));
    ?>
    <span class="help-block"><?php echo __('Enter password to change it, otherwise keep it empty.'); ?></span>
</div>
<div class="form-group">
    <?php
    echo $this->Form->input('user_type_id',
            array('class' => 'form-control', 'placeholder' => 'User Type Id'));
    ?>
</div>
<div class="form-group">
    <?php
    echo $this->Form->input('first_name',
            array('class' => 'form-control', 'placeholder' => 'First Name'));
    ?>
</div>
<div class="form-group">
    <?php
    echo $this->Form->input('middle_name',
            array('class' => 'form-control', 'placeholder' => 'Middle Name'));
    ?>
</div>
<div class="form-group">
    <?php
    echo $this->Form->input('last_name',
            array('class' => 'form-control', 'placeholder' => 'Last Name'));
    ?>
</div>
<div class="form-group">
    <?php
    echo $this->Form->input('email', array('class' => 'form-control', 'placeholder' => 'Email'));
    ?>
</div>
<div class="form-group">
    <?php
    echo $this->Form->input('mobile', array('class' => 'form-control', 'placeholder' => 'Mobile'));
    ?>
</div>
<div class="form-group">
    <?php
    echo $this->Form->input('country_id', array(
        'class' =>
        'form-control',
        'placeholder' => 'Country Id',
        'id' => 'frmCountryId',
    ));
    ?>
</div>
<div class="form-group">
    <?php
    echo $this->Form->input('state_id',
            array('class' => 'form-control', 'placeholder' => 'State Id', 'id' => 'frmStateId'));
    $dynParams = array(
            'updateOnChange' => 'frmCountryId',
            'dynData' => array(
                'country_id' => 'frmCountryId',
                'state_id' => 'frmStateId',
            ),
            'update' => 'frmStateId',
            'urlParams' => array(
                'controller'=>'states',
                'action'=>'getByCountry',
                'admin' => false,
            ),
            'onLoaded' => '$("#frmStateId").trigger("change");',
            'triggerOnInit' => true,
        );
        echo $this->element('js/dynloader', $dynParams);
    ?>
</div>
<div class="form-group">
    <?php
    echo $this->Form->input('district_id',
            array('class' => 'form-control', 'placeholder' => 'District Id', 'id' => 'frmDistrictId'));
    $dynParams = array(
            'updateOnChange' => 'frmStateId',
            'dynData' => array(
                'country_id' => 'frmCountryId',
                'state_id' => 'frmStateId',
                'district_id' => 'frmDistrictId',
            ),
            'update' => 'frmDistrictId',
            'urlParams' => array(
                'controller'=>'districts',
                'action'=>'getByCountryState',
                'admin' => false,
            ),
            'onLoaded' => '$("#frmDistrictId").trigger("change");',
            'triggerOnInit' => false,
        );
        echo $this->element('js/dynloader', $dynParams);
    ?>
</div>
<div class="form-group">
    <?php
    echo $this->Form->input('taluka_id',
            array('class' => 'form-control', 'placeholder' => 'Taluka Id', 'id' => 'frmTalukaId'));
    $dynParams = array(
        'updateOnChange' => 'frmDistrictId',
        'dynData' => array(
            'country_id' => 'frmCountryId',
            'state_id' => 'frmStateId',
            'district_id' => 'frmDistrictId',
            'taluka_id' => 'frmTalukaId',
        ),
        'update' => 'frmTalukaId',
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
    <?php
    echo $this->Form->input('city_id', array('class' => 'form-control', 'placeholder' => 'City Id'));
    ?>
</div>
<div class="form-group">
    <?php
    echo $this->Form->input('dob', array(
        'class' => 'form-control datepicker',
        'placeholder' => 'Dob',
        'type' => 'text',
        'data-date-format' => Configure::read('datepicker.default'),
    ));
    ?>
</div>
<div class="form-group">
    <?php
    echo $this->Form->input('gender', array('class' => 'form-control', 'placeholder' => 'Gender'));
    ?>
</div>
<div class="form-group">
    <?php
    echo $this->Form->input('referral_name',
            array('class' => 'form-control', 'placeholder' => 'Referral Name'));
    ?>
</div>
<div class="form-group">
    <?php
    if (isset($this->request->data['UserDetail']) && $this->request->data['UserDetail']['photo_url']) {
        echo '<label for="frmPhotoId">&nbsp;</label>';
        echo $this->Html->link(
            $this->Html->image($this->request->data['UserDetail']['photo_url'], array(
                'alt' => '',
                'width' => 100)),
            $this->request->data['UserDetail']['photo_url'],
            array('escape' => false, 'target' => '_blank')
        );
    }
    echo $this->Form->input('photo', array(
        'class' => 'form-control',
        'type' => 'file'
    ));
    ?>
</div>
<div class="form-group">
    <?php
    echo $this->Form->input('zone_id', array(
        'class' => 'form-control',
        'placeholder' => 'Zone Id',
        'id' => 'frmZoneId'));
    ?>
</div>
<div class="form-group">
    <?php
    echo $this->Form->input('center_id',
            array('class' => 'form-control', 'placeholder' => 'Center Id', 'id' => 'frmCenterId'));
    $dynParams = array(
        'updateOnChange' => 'frmZoneId',
        'dynData' => array(
            'zone_id' => 'frmZoneId',
            'center_id' => 'frmCenterId',
        ),
        'update' => 'frmCenterId',
        'urlParams' => array(
            'controller' => 'centers',
            'action' => 'getByZone',
            'admin' => false,
        ),
        'triggerOnInit' => true,
    );
    echo $this->element('js/dynloader', $dynParams);
    ?>
</div>
<div class="form-group">
    <?php
    echo $this->Form->input('status', array('class' => 'form-control', 'placeholder' => 'Status'));
    ?>
</div>
<div class="form-group">
    <?php
    echo $this->Form->submit(__('Submit'), array('class' => 'btn btn-default'));
    ?>
</div>

<?php echo $this->Form->end() ?>