<?php echo $this->Form->create('Feedback', array('role' => 'form')); ?>
<?php echo $this->Session->flash(); ?>
<div class="row form-group over-hidden">

    <div class="col-md-4">
        <?php
        echo $this->Form->input('name', array(
            'label' => 'Name',
            'class' => 'form-control',
            'title' => __('Enter your full name.'),
            'rel' => 'txtTooltip',
        ));
        ?>
    </div>

    <div class="col-md-4">
        <?php
        echo $this->Form->input('email',
                array(
            'label' => 'Email',
            'class' => 'form-control',
            'title' => __('Enter your email address.'),
            'rel' => 'txtTooltip',
        ));
        ?>
    </div>

    <div class="col-md-4">
        <?php
        echo $this->Form->input('phone',
                array(
                'label' => 'Contact No.',
            'class' => 'form-control',
            'title' => __('Enter your contact number.'),
            'rel' => 'txtTooltip',
        ));
        ?>
    </div>

</div>

<div class="row form-group over-hidden">

    <div class="col-md-6">
        <?php
        echo $this->Form->input('subject_id',
                array(
            'label' => 'Subject',
            'class' => 'form-control',
            'title' => __('Select subject of feedback.'),
            'rel' => 'txtTooltip',
        ));
        ?>
    </div>

    <div class="col-md-6">
        <?php
        echo $this->Form->input('center', array(
            'label' => 'City / Center',
            'class' => 'form-control',
            'title' => __('Enter your center. If you don\'t know your center, enter your city.'),
            'rel' => 'txtTooltip',
        ));
        ?>
    </div>
</div>

<div class="form-group over-hidden">
    <?php
    echo $this->Form->input('content',
            array(
        'label' => __('Feedback Detail'),
        'class' => 'form-control htmleditor',
    ));
    ?>
</div>

<button class="btn main-bg btn-block btn-lg btn-3d uppercase" type="submit" value="submit"><?php echo __('Submit Feedback'); ?></button>
<?php echo $this->Form->end() ?>