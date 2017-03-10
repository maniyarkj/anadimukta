<div class="traditions index">

    <div class="row">
        <div class="col-md-12">
            <div class="page-header">
                <h1><?php echo __('Spiritual Succession'); ?></h1>
            </div>
        </div><!-- end col md 12 -->
    </div><!-- end row -->

    <div class="row">
        <div class="col-md-12">
            <?php echo $this->Html->link(
                __('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;New Spiritual Succession'),
                array('action' => 'add'),
                array('escape' => false, 'class' => 'btn btn-primary')); ?>
            <table cellpadding="0" cellspacing="0" class="table table-striped">
                <thead>
                    <tr>
                        <th><?php echo $this->Paginator->sort('title'); ?></th>
                        <th><?php echo $this->Paginator->sort('is_visible'); ?></th>
                        <th class="actions"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($traditions as $tradition): ?>
                        <tr>
                            <td><?php echo h($tradition['Tradition']['title']); ?>&nbsp;</td>
                            <td><?php echo h($tradition['Tradition']['is_visible']); ?>&nbsp;</td>
                            <td class="actions">
                                <?php
                                echo $this->Html->link('<span class="glyphicon glyphicon-edit"></span>',
                                        array('action' => 'edit', $tradition['Tradition']['id']),
                                        array('escape' => false));
                                ?>
                                <?php
                                echo $this->Form->postLink('<span class="glyphicon glyphicon-remove"></span>',
                                        array('action' => 'delete', $tradition['Tradition']['id']),
                                        array('escape' => false),
                                        __('Are you sure you want to delete # %s?',
                                                $tradition['Tradition']['id']));
                                ?>
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
                    echo $this->Paginator->prev('&larr; Previous',
                            array('class' => 'prev', 'tag' => 'li', 'escape' => false),
                            '<a onclick="return false;">&larr; Previous</a>',
                            array('class' => 'prev disabled', 'tag' => 'li', 'escape' => false));
                    echo $this->Paginator->numbers(array('separator' => '', 'tag' => 'li', 'currentClass' => 'active',
                        'currentTag' => 'a'));
                    echo $this->Paginator->next('Next &rarr;',
                            array('class' => 'next', 'tag' => 'li', 'escape' => false),
                            '<a onclick="return false;">Next &rarr;</a>',
                            array('class' => 'next disabled', 'tag' => 'li', 'escape' => false));
                    ?>
                </ul>
            <?php } ?>

        </div> <!-- end col md 9 -->
    </div><!-- end row -->


</div><!-- end containing of content -->