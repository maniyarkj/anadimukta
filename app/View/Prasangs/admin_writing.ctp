<div class="prasangs index">
    <div class="row">
        <div class="col-md-12">
            <div class="page-header">
                <h1><?php echo $pageHeading; ?>
            </div>
        </div><!-- end col md 12 -->
    </div><!-- end row -->
    <div class="row">
        <div class="col-md-12">
            <form method="post" id="listingform" action="">
                <?php
                if ($Acl->check(
                                array('model' => 'Group', 'foreign_key' => $Auth->user('group_id')),
                                'prasangs/admin_add')) {
                    echo $this->Html->link(
                            __('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;New Prasang'),
                            array('action' => 'add'),
                            array('escape' => false, 'class' => 'btn btn-primary'));
                }
                ?>
                <?php
                echo $this->Form->button(
                    __('<span class="glyphicon glyphicon-print"></span>&nbsp;&nbsp;Print'),
                    array(
                        'link' => $this->Html->url(array(
                            "controller" => "prasangs",
                            "action" => "admin_print",
                        )),
                        'class' => 'btn btn-default btn-space btn-action',
                        'type' => 'button',
                        'target' => '_blank',

                    ),
                    array('escape' => false));
                    ?>
                <table cellpadding="0" cellspacing="0" class="table table-striped listingtable">
                    <thead>
                        <tr>
                            <th><input type="checkbox" id="selectall"/></th>
                            <th><?php echo $this->Paginator->sort('id', 'No'); ?></th>
                            <th><?php echo $this->Paginator->sort('title'); ?></th>
                            <th><?php echo $this->Paginator->sort('grade'); ?></th>
                            <th><?php echo $this->Paginator->sort('place'); ?></th>
                            <th><?php echo $this->Paginator->sort('author_id'); ?></th>
                            <?php
                            if ($status == Prasang::STATUS_WRITING && $status == Prasang::STATUS_DISCARDED) {
                                ?>
                                <th><?php echo $this->Paginator->sort('published_date'); ?></th>
                            <?php } ?>
                            <th><?php echo $this->Paginator->sort('status'); ?></th>
                            <?php if ($status == Prasang::STATUS_DISCARDED) { ?>
                                <th><?php echo $this->Paginator->sort('discarded_reason'); ?></th>
                            <?php } ?>
                            <th class="actions"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($prasangs as $prasang): ?>
                            <tr>
                                <td><input type="checkbox" name="id[]" class="singlecheck" value="<?php echo h($prasang['Prasang']['id']); ?>" id="id"></td>
                                <td><?php echo h($prasang['Prasang']['id']); ?>&nbsp;</td>
                                <td>
                                    <?php
                                    echo $this->Html->link(
                                            h($prasang['Prasang']['title']),
                                            array(
                                        'action' => 'view',
                                        $prasang['Prasang']['id']
                                            ),
                                            array(
                                                'escape' => false,
                                                'class' => 'prasang-modal',
                                            )
                                    );
                                    ?>
                                </td>
                                <td><?php echo h($prasang['Prasang']['grade']); ?>&nbsp;</td>
                                <td><?php echo h($prasang['Prasang']['place']); ?>&nbsp;</td>
                                <td><?php
                                    echo $this->Html->link($prasang['Author']['name'],
                                            array('controller' => 'authors', 'action' => 'view', $prasang['Author']['id']));
                                    ?>
                                </td>
                                <?php
                                if ($status == Prasang::STATUS_WRITING && $status == Prasang::STATUS_DISCARDED) {
                                    ?>
                                    <td><?php echo h($prasang['Prasang']['published_date']); ?>&nbsp;</td>
                                <?php } ?>
                                <td><?php echo h($statuses[$prasang['Prasang']['status']]); ?>&nbsp;</td>
                                <?php
                                if ($status == Prasang::STATUS_DISCARDED && isset($prasang['Prasang']['discarded_reason'])) {
                                    ?>
                                    <td><?php echo h($statuses[$prasang['Prasang']['discarded_reason']]); ?>&nbsp;</td>
                                <?php } ?>
                                <td class="actions">
                                    <?php
                                    if ($status == Prasang::STATUS_DTP) {
                                        echo $this->Html->link(
                                                '<span class="glyphicon glyphicon-edit"></span>Edit',
                                                array('action' => 'edit', $prasang['Prasang']['id']),
                                                array('escape' => false));
                                    }
                                    ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <?php echo $this->Form->end(); ?>
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
<div class="modal fade" id="prasangView" tabindex="-1" role="dialog" aria-labelledby="prasangView" aria-hidden="true">
</div>