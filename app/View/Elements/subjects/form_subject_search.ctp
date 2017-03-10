<div class="searchForm">
    <?php
    echo $this->Form->create('Subject', array(
        'novalidate' => true,
        'class' => 'form-inline',
    ));
    ?>
    <div class="form-group">
        <?php
        echo $this->Form->input('title', array(
            'class' => 'form-control',
            'label' => ' ',
            'placeholder' => 'Title',
        ));
        ?>
    </div>
    <div class="form-group">
        <?php
        echo $this->Form->submit(__('Search'), array(
            'class' => 'btn btn-default'));
        ?>
    </div>
<?php echo $this->Form->end(); ?>
</div>