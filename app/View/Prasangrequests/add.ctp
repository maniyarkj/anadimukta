<div class="prasangrequests form">

    <div class="row">
        <div class="col-md-12">
            <div class="page-header">
                <h1><?php echo __('Add Prasangrequest'); ?></h1>
            </div>
        </div>
    </div>



    <div class="row">
        <div class="col-md-3">
            <div class="actions">
                <div class="panel panel-default">
                    <div class="panel-heading">Actions</div>
                    <div class="panel-body">
                        <ul class="nav nav-pills nav-stacked">

                            <li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;List Prasangrequests'),
        array('action' => 'index'), array('escape' => false));
?></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div><!-- end col md 3 -->
        <div class="col-md-9">
<?php echo $this->Form->create('Prasangrequest', array('role' => 'form')); ?>

            <div class="form-group">
                <?php echo $this->Form->input('section_id',
                        array('class' => 'form-control', 'placeholder' => 'Section Id'));
                ?>
            </div>
            <div class="form-group">
<?php echo $this->Form->input('with_id',
        array('class' => 'form-control', 'placeholder' => 'With Id'));
?>
            </div>
            <div class="form-group">
                <?php echo $this->Form->input('grade',
                        array('class' => 'form-control', 'placeholder' => 'Grade'));
                ?>
            </div>
            <div class="form-group">
                <?php echo $this->Form->input('title',
                        array('class' => 'form-control', 'placeholder' => 'Title'));
                ?>
            </div>
            <div class="form-group">
                <?php echo $this->Form->input('date',
                        array('class' => 'form-control', 'placeholder' => 'Date'));
                ?>
            </div>
            <div class="form-group">
<?php echo $this->Form->input('place',
        array('class' => 'form-control', 'placeholder' => 'Place'));
?>
            </div>
            <div class="form-group">
                <?php echo $this->Form->input('event',
                        array('class' => 'form-control', 'placeholder' => 'Event'));
                ?>
            </div>
            <div class="form-group">
                <?php echo $this->Form->input('content',
                        array('class' => 'form-control', 'placeholder' => 'Content'));
                ?>
            </div>
            <div class="form-group">
                <?php echo $this->Form->input('is_personal',
                        array('class' => 'form-control', 'placeholder' => 'Is Personal'));
                ?>
            </div>
            <div class="form-group">
<?php echo $this->Form->input('donor_name',
        array('class' => 'form-control', 'placeholder' => 'Donor Name'));
?>
            </div>
            <div class="form-group">
                <?php echo $this->Form->input('donor_phone',
                        array('class' => 'form-control', 'placeholder' => 'Donor Phone'));
                ?>
            </div>
            <div class="form-group">
                <?php echo $this->Form->input('donor_email',
                        array('class' => 'form-control', 'placeholder' => 'Donor Email'));
                ?>
            </div>
            <div class="form-group">
                <?php echo $this->Form->input('donor_zone_id',
                        array('class' => 'form-control', 'placeholder' => 'Donor Zone Id'));
                ?>
            </div>
            <div class="form-group">
            <?php echo $this->Form->input('donor_center_id',
                    array('class' => 'form-control', 'placeholder' => 'Donor Center Id'));
            ?>
            </div>
            <div class="form-group">
<?php echo $this->Form->input('submitted_user_id',
        array('class' => 'form-control', 'placeholder' => 'Submitted User Id'));
?>
            </div>
            <div class="form-group">
<?php echo $this->Form->input('status', array('class' => 'form-control', 'placeholder' => 'Status'));
?>
            </div>
            <div class="form-group">
<?php echo $this->Form->submit(__('Submit'), array('class' => 'btn btn-default')); ?>
            </div>

<?php echo $this->Form->end() ?>

        </div><!-- end col md 12 -->
    </div><!-- end row -->
</div>
