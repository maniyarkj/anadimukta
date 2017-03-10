<div class="prasangrequests index">

    <div class="row">
        <div class="col-md-12">
            <div class="page-header">
                <h1><?php echo __('Prasang Requests'); ?></h1>
            </div>
        </div><!-- end col md 12 -->
    </div><!-- end row -->

    <div class="row">
        <div class="col-md-12">
            <form method="post" id="listingform" action="">
                <?php
                echo $this->Form->button(
                        __('<span class="glyphicon glyphicon-check"></span>&nbsp;&nbsp;Accept to Write'),
                        array(
                            'link' => $this->Html->url(array(
                                "controller" => "prasangrequests",
                                "action" => "admin_accept",
                            )),
                            'class' => 'btn btn-default btn-space btn-action',
                            'type' => 'button',
                        ),
                        array('escape' => false));
                /* Print should be done in writing
                 * echo $this->Form->button(
                        __('<span class="glyphicon glyphicon-print"></span>&nbsp;&nbsp;Print'),
                        array(
                            'link' => $this->Html->url(array(
                                "controller" => "prasangrequests",
                                "action" => "admin_print",
                            )),
                            'class' => 'btn btn-default btn-space btn-action',
                            'type' => 'button',
                            'target' => '_blank',
                        ),
                        array('escape' => false));*/
                ?>
                <table cellpadding="0" cellspacing="0" class="table table-striped listingtable">
                    <thead>
                        <tr>
                            <th><input type="checkbox" id="selectall"/></th>
                            <th><?php echo $this->Paginator->sort('title'); ?></th>
                            <th><?php echo $this->Paginator->sort('grade'); ?></th>
                            <th><?php echo $this->Paginator->sort('place'); ?></th>
                            <th><?php echo $this->Paginator->sort('event'); ?></th>
                            <th><?php echo $this->Paginator->sort('is_personal'); ?></th>
                            <th><?php echo $this->Paginator->sort('donor_name'); ?></th>
                            <th><?php echo $this->Paginator->sort('donor_phone'); ?></th>
                            <th><?php echo $this->Paginator->sort('donor_zone_id'); ?></th>
                            <th><?php echo $this->Paginator->sort('donor_center_id'); ?></th>
                            <th><?php echo $this->Paginator->sort('submitted_user_id'); ?></th>
                            <th class="actions"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($prasangrequests as $prasangrequest): ?>
                            <tr>
                                <td><input type="checkbox" name="id[]" class="singlecheck" value="<?php echo h($prasangrequest['Prasangrequest']['id']); ?>" id="id"></td>
                                <td><?php echo h($prasangrequest['Prasangrequest']['title']); ?>&nbsp;</td>
                                <td><?php echo h($prasangrequest['Prasangrequest']['grade']); ?>&nbsp;</td>
                                <td><?php echo h($prasangrequest['Prasangrequest']['place']); ?>&nbsp;</td>
                                <td><?php echo h($prasangrequest['Prasangrequest']['event']); ?>&nbsp;</td>
                                <td><?php echo h($prasangrequest['Prasangrequest']['is_personal_text']); ?>&nbsp;</td>
                                <td><?php echo h($prasangrequest['Prasangrequest']['donor_name']); ?>&nbsp;</td>
                                <td><?php echo h($prasangrequest['Prasangrequest']['donor_phone']); ?>&nbsp;</td>
                                <td><?php echo h($prasangrequest['DonorZone']['name']); ?>&nbsp;</td>
                                <td><?php echo h($prasangrequest['DonorCenter']['name']); ?>&nbsp;</td>
                                <td><?php echo h($prasangrequest['SubmittedByUser']['username']); ?>&nbsp;</td>
                                <td class="actions">
                                    <?php
                                    echo $this->Html->link('<span class="glyphicon glyphicon-search"></span>',
                                            array('action' => 'view', $prasangrequest['Prasangrequest']['id']),
                                            array('escape' => false));
                                    ?>
                                    <?php
                                    /* echo $this->Html->link('<span class="glyphicon glyphicon-edit"></span>',
                                      array('action' => 'edit', $prasangrequest['Prasangrequest']['id']),
                                      array('escape' => false)); */
                                    ?>
                                    <?php
                                    echo $this->Form->postLink('<span class="glyphicon glyphicon-remove"></span>',
                                            array('action' => 'discard', $prasangrequest['Prasangrequest']['id']),
                                            array('escape' => false),
                                            __('Are you sure you want to discard # %s - %s?',
                                                    $prasangrequest['Prasangrequest']['id'],
                                                    $prasangrequest['Prasangrequest']['title']));
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