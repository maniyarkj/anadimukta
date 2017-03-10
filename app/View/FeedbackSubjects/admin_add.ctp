<div class="feedbackSubjects form">

    <div class="row">
        <div class="col-md-12">
            <div class="page-header">
                <h1><?php echo __('Add Feedback Subject'); ?></h1>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-9">
            <?php echo $this->Form->create('FeedbackSubject', array('role' => 'form')); ?>

            <div class="form-group">
                <?php echo $this->Form->input('title', array('class' => 'form-control', 'placeholder' => 'Title')); ?>
            </div>
            <div class="form-group">
                <?php echo $this->Form->submit(__('Submit'), array('class' => 'btn btn-default')); ?>
            </div>

            <?php echo $this->Form->end() ?>

        </div><!-- end col md 12 -->
    </div><!-- end row -->
</div>
