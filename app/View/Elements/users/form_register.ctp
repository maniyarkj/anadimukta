<style>
#username_feedback{
    margin-top: 5px;
    font-size: 14px;
    font-weight: bold;
    display: none;
    padding: 3px;
    padding-right: 15px;
}
#username_feedback .available{color: #029f5b;}
#username_feedback .not-available{color: #a00; font-weight: normal;}

</style>
<?php echo $this->Form->create('User', array(
    'action' => 'register',
    'id' => "register-form",
)); ?>
    <div class="form-group">
        <?php echo $this->Form->input('UserDetail.first_name', array(
            'class' => 'form-control inline-field',
            'placeholder' => 'First Name',
            'div' => false,
            'label' => false,
        ));
        ?>
        <?php echo $this->Form->input('UserDetail.last_name', array(
            'class' => 'form-control inline-field',
            'placeholder' => 'Last Name',
            'div' => false,
            'label' => false,
        ));
        ?>
    </div>
    <div class="form-group">
        <?php echo $this->Form->input('username', array(
            'class' => 'form-control',
            'placeholder' => 'Username',
            'id' => 'Username',
            'div' => false,
            'label' => false,
        ));
        ?>
        <div id="username_feedback"></div>
    </div>
    <div class="form-group">
        <?php echo $this->Form->input('email', array(
            'class' => 'form-control',
            'placeholder' => 'Email',
            'div' => false,
            'label' => false,
        ));
        ?>
    </div>
    <div class="form-group">
        <?php echo $this->Form->input('password', array(
            'class' => 'form-control',
            'placeholder' => 'Password',
            'div' => false,
            'label' => false,
        ));
        ?>
    </div>
    <div class="form-group">
        <?php echo $this->Form->input('confirm_password', array(
            'class' => 'form-control',
            'placeholder' => 'Confirm Password',
            'div' => false,
            'label' => false,
        ));
        ?>
    </div>
    <div class="form-group">
        <?php echo $this->Form->input('UserDetail.mobile', array(
            'class' => 'form-control',
            'type' => 'number',
            'placeholder' => 'Phone/Mobile',
            'div' => false,
            'label' => false,
        ));
        ?>
    </div>
    <div class="form-group">
        <?php echo $this->Form->input('UserDetail.country_id', array(
            'class' => 'form-control',
            'id' => 'frmCountryId',
        )); ?>
    </div>
    <div class="form-group">
        <?php
        echo $this->Form->input('UserDetail.state_id', array(
            'class' => 'form-control',
            'id' => 'frmStateId',
        ));
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
        echo $this->Form->input('UserDetail.district_id', array(
            'class' => 'form-control',
            'id' => 'frmDistrictId',
        ));
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
        echo $this->Form->input('UserDetail.taluka_id', array(
            'class' => 'form-control',
            'id' => 'frmTalukaId',
        ));
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
        <?php echo $this->Form->text('UserDetail.dob', array(
            'class' => 'form-control datepicker',
            'placeholder' => 'Date of Birth',
            'type' => 'text',
            'data-date-format' => Configure::read('datepicker.default'),
            'div' => false,
            'label' => false,
        ));
        ?>
    </div>
    <div class="form-group">
        <?php echo $this->Form->input('UserDetail.gender', array(
            'class' => 'form-control',
            'placeholder' => 'Gender',
            'div' => false,
            'label' => false,
        ));
        ?>
    </div>
    <div class="form-group">
        <?php echo $this->Form->input('UserDetail.referral_name', array(
            'class' => 'form-control',
            'placeholder' => 'Reference Saints',
            'div' => false,
            'label' => false,
        ));
        ?>
    </div>
    <?php if (isset($user) && $user['user_type'] == UserDetail::TYPE_KARYAKAR) { ?>
    <?php } ?>
    <div class="form-group">
        <div class="row">
            <div class="col-sm-6 col-sm-offset-3">
                <?php
                echo $this->Form->submit(__('Register Now'), array(
                    'class' => 'form-control btn btn-register'
                ));
                ?>
                <!--<input type="submit" name="register-submit" id="register-submit" class="form-control btn btn-register" value="Register Now">-->
            </div>
        </div>
    </div>
<?php echo $this->Form->end(); ?>
<script type="text/javascript">
$(document).ready(function(){
        $('#Username').on('change blur', function() {
            //Below post function is using check_username method of users controller.
            $.post(
                '/users/check_username',
                {username:$('#Username').val()},
                function(result) {
                    $('#username_feedback').html(result).show('1000');
                }
            );
        });
});
</script>