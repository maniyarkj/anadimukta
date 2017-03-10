<div class="subjects index">

    <div class="row">
        <div class="col-md-12">
            <div class="page-header">
                <h1><?php echo __('Subjects'); ?></h1>
            </div>
        </div><!-- end col md 12 -->
    </div><!-- end row -->

    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-6">
                    <?php echo $this->Html->link(
                        __('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;Add Main Subject'),
                        array('action' => 'add', 'type' => Subject::TYPE_MAIN),
                        array('escape' => false, 'class' => 'btn btn-primary')); ?>
                </div>
                <div class="col-md-6"  style="text-align: right">
                    <?php echo $this->element('subjects/form_subject_search'); ?>
                </div>
            </div>
            <table cellpadding="0" cellspacing="0" class="table table-striped">
                <thead>
                    <tr>
                        <!--<th><?php echo h('id'); ?></th>-->
                        <th><?php echo h('Title'); ?></th>
                        <th><?php echo h('Type'); ?></th>
                        <th><?php echo h('View Prasangs'); ?></th>
                        <th class="actions"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($subjects as $subject): ?>
                    <tr>
                        <!--<td><?php echo h($subject['Subject']['id']); ?>&nbsp;</td>-->
                        <td><?php echo sprintf(
                                '<span class="indent%s">%s</span>',
                                $subject['Subject']['type'],
                                h($subject['Subject']['title'])); ?>&nbsp;</td>
                        <td><?php echo h($types[$subject['Subject']['type']]); ?>&nbsp;</td>
                        <td><?php
                        if ($subject['Subject']['type'] == Subject::TYPE_THIRD) {
                        echo $this->Html->link(
                                __('View Prasangs'),
                                array(
                                    'action' => 'index',
                                    'controller' => 'prasangs',
                                    'admin' => true,
                                    '?' => array('subject_id' => $subject['Subject']['id'])
                                ),
                                array('escape' => false)
                        );
                        } ?></td>
                        <td class="actions" style="text-align: right">
                                <?php //echo $this->Html->link('<span class="glyphicon glyphicon-search"></span>', array('action' => 'view', $subject['Subject']['id']), array('escape' => false)); ?>
                                <?php
                                $addTitle = '';
                                $params = array();
                                if($subject['Subject']['type'] == Subject::TYPE_MAIN) {
                                    $addTitle = 'Add Seconday Subject';
                                    $params['main_id'] = $subject['Subject']['id'];
                                    $params['type'] = Subject::TYPE_SECONDARY;
                                }
                                if($subject['Subject']['type'] == Subject::TYPE_SECONDARY) {
                                    $addTitle = 'Add Subject';
                                    $params['main_id'] = $subject['Subject']['main_id'];
                                    $params['secondary_id'] = $subject['Subject']['id'];
                                    $params['type'] = Subject::TYPE_THIRD;
                                }
                                ?>
                                <?php echo $this->Html->link(
                                        $addTitle,
                                        array(
                                            'action' => 'add',
                                        ) + $params,
                                        array('escape' => false)
                                ); ?>
                                <?php echo $this->Html->link(
                                        '<span class="glyphicon glyphicon-edit"></span>',
                                        array(
                                            'action' => 'edit',
                                            'type' => $subject['Subject']['type'],
                                            'main_id' => $subject['Subject']['main_id'],
                                            'secondary_id' => $subject['Subject']['secondary_id'],
                                            $subject['Subject']['id']
                                        ),
                                        array('escape' => false)
                                    ); ?>
                                <?php echo $this->Form->postLink('<span class="glyphicon glyphicon-remove"></span>', array('action' => 'delete', $subject['Subject']['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $subject['Subject']['id'])); ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <p>
                <small><?php echo $this->Paginator->counter(array('format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}'))); ?></small>
            </p>

            <?php
            $params = $this->Paginator->params();
            if ($params['pageCount'] > 1) {
                ?>
            <ul class="pagination pagination-sm">
                    <?php
                    echo $this->Paginator->prev('&larr; Previous', array('class' => 'prev', 'tag' => 'li', 'escape' => false), '<a onclick="return false;">&larr; Previous</a>', array('class' => 'prev disabled', 'tag' => 'li', 'escape' => false));
                    echo $this->Paginator->numbers(array('separator' => '', 'tag' => 'li', 'currentClass' => 'active', 'currentTag' => 'a'));
                    echo $this->Paginator->next('Next &rarr;', array('class' => 'next', 'tag' => 'li', 'escape' => false), '<a onclick="return false;">Next &rarr;</a>', array('class' => 'next disabled', 'tag' => 'li', 'escape' => false));
                    ?>
            </ul>
            <?php } ?>

        </div> <!-- end col md 9 -->
    </div><!-- end row -->


</div><!-- end containing of content -->