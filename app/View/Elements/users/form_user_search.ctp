<div class="searchForm">
    <?php
    echo $this->Form->create('User',
                             array(
        'novalidate' => true,
        'class' => 'form-simple',
    ));
    ?>
    <div class="form-group">
        <?php
        echo $this->Form->input('username',
                                array(
            'class' => 'form-control',
        ));
        ?>
    </div>
    <div class="form-group">
        <?php
        echo $this->Form->input('group_id',
                                array(
            'class' => 'form-control',
            'options' => array(
        '' => 'All') + $groups,
        ));
        ?>
    </div>
    <div class="form-group">
        <?php
        echo $this->Form->submit(__('Search'),
                                    array(
            'class' => 'btn btn-default'));
        ?>
    </div>
<?php echo $this->Form->end(); ?>
</div>