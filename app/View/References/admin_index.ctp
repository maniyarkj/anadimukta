<div class="references index">

    <div class="row">
        <div class="col-md-12">
            <div class="page-header">
                <h1><?php echo __('References'); ?></h1>
            </div>
        </div><!-- end col md 12 -->
    </div><!-- end row -->



    <div class="row">

        <div class="col-md-3">
            <div class="actions">
                <div class="panel panel-default">
                    <div class="panel-heading">Actions</div>
                    <div class="panel-body">
                        <ul class="nav nav-pills nav-stacked">
                            <li><?php
                                echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;New Reference'),
                                                          array(
                                    'action' => 'add'),
                                                          array(
                                    'escape' => false));
                                ?></li>
                            <li><?php
                                echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;List Reference Types'),
                                                          array(
                                    'controller' => 'reference_types',
                                    'action' => 'index'),
                                                          array(
                                    'escape' => false));
                                ?> </li>
                            <li><?php
                                echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;New Reference Type'),
                                                          array(
                                    'controller' => 'reference_types',
                                    'action' => 'add'),
                                                          array(
                                    'escape' => false));
                                ?> </li>
                            <li><?php
                                echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;List Dtp Users'),
                                                          array(
                                    'controller' => 'dtp_users',
                                    'action' => 'index'),
                                                          array(
                                    'escape' => false));
                                ?> </li>
                            <li><?php
                                echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;New Dtp User'),
                                                          array(
                                    'controller' => 'dtp_users',
                                    'action' => 'add'),
                                                          array(
                                    'escape' => false));
                                ?> </li>
                            <li><?php
                                echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;List Users'),
                                                          array(
                                    'controller' => 'users',
                                    'action' => 'index'),
                                                          array(
                                    'escape' => false));
                                ?> </li>
                            <li><?php
                                echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;New Published By'),
                                                          array(
                                    'controller' => 'users',
                                    'action' => 'add'),
                                                          array(
                                    'escape' => false));
                                ?> </li>
                            <li><?php
                                echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;List Subjects'),
                                                          array(
                                    'controller' => 'subjects',
                                    'action' => 'index'),
                                                          array(
                                    'escape' => false));
                                ?> </li>
                            <li><?php
                                echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;New Subject'),
                                                          array(
                                    'controller' => 'subjects',
                                    'action' => 'add'),
                                                          array(
                                    'escape' => false));
                                ?> </li>
                        </ul>
                    </div><!-- end body -->
                </div><!-- end panel -->
            </div><!-- end actions -->
        </div><!-- end col md 3 -->

        <div class="col-md-9">
            <table cellpadding="0" cellspacing="0" class="table table-striped">
                <thead>
                    <tr>
                        <th><?php echo $this->Paginator->sort('id'); ?></th>
                        <th><?php echo $this->Paginator->sort('title'); ?></th>
                        <th><?php echo $this->Paginator->sort('grade'); ?></th>
                        <th><?php echo $this->Paginator->sort('reference_type_id'); ?></th>
                        <th><?php echo $this->Paginator->sort('created_by_user_id'); ?></th>
                        <!--th><?php echo $this->Paginator->sort('published_by'); ?></th-->
                        <th><?php echo $this->Paginator->sort('status'); ?></th>
                        <th><?php echo $this->Paginator->sort('created'); ?></th>
                        <th><?php echo $this->Paginator->sort('modified'); ?></th>
                        <th class="actions"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($references as $reference): ?>
                        <tr>
                            <td><?php echo h($reference['Reference']['id']); ?>&nbsp;</td>
                            <td><?php echo h($reference['Reference']['title']); ?>&nbsp;</td>
                            <td><?php echo h($reference['Reference']['grade']); ?>&nbsp;</td>
                            <td>
                                <?php
                                echo $this->Html->link($reference['ReferenceType']['type'],
                                                       array(
                                    'controller' => 'reference_types',
                                    'action' => 'view',
                                    $reference['ReferenceType']['id']));
                                ?>
                            </td>
                            <td>
                                <?php
                                echo $this->Html->link($reference['CreatedByUser']['username'],
                                                       array(
                                    'controller' => 'users',
                                    'action' => 'view',
                                    $reference['CreatedByUser']['id']));
                                ?>
                            </td>
                            <!--td>
                                <?php
                                echo $this->Html->link($reference['PublishedByUser']['username'],
                                                       array(
                                    'controller' => 'users',
                                    'action' => 'view',
                                    $reference['PublishedByUser']['id']));
                                ?>
                            </td-->
                            <td><?php echo h($statuses[$reference['Reference']['status']]); ?>&nbsp;</td>
                            <td><?php echo h($reference['Reference']['created']); ?>&nbsp;</td>
                            <td><?php echo h($reference['Reference']['modified']); ?>&nbsp;</td>
                            <td class="actions">
                                <?php
                                echo $this->Html->link('<span class="glyphicon glyphicon-search"></span>',
                                                       array(
                                    'action' => 'view',
                                    $reference['Reference']['id']),
                                                       array(
                                    'escape' => false));
                                ?>
                                <?php
                                echo $this->Html->link('<span class="glyphicon glyphicon-edit"></span>',
                                                       array(
                                    'action' => 'edit',
                                    $reference['Reference']['id']),
                                                       array(
                                    'escape' => false));
                                ?>
                                <?php
                                echo $this->Form->postLink('<span class="glyphicon glyphicon-remove"></span>',
                                                           array(
                                    'action' => 'delete',
                                    $reference['Reference']['id']),
                                                           array(
                                    'escape' => false),
                                                           __('Are you sure you want to delete # %s?',
                                                              $reference['Reference']['id']));
                                ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <p>
                <small><?php
                    echo $this->Paginator->counter(array(
                        'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')));
                    ?></small>
            </p>

            <?php
            $params = $this->Paginator->params();
            if ($params['pageCount'] > 1) {
                ?>
                <ul class="pagination pagination-sm">
                    <?php
                    echo $this->Paginator->prev('&larr; Previous',
                                                array(
                        'class' => 'prev',
                        'tag' => 'li',
                        'escape' => false), '<a onclick="return false;">&larr; Previous</a>',
                                                array(
                        'class' => 'prev disabled',
                        'tag' => 'li',
                        'escape' => false));
                    echo $this->Paginator->numbers(array(
                        'separator' => '',
                        'tag' => 'li',
                        'currentClass' => 'active',
                        'currentTag' => 'a'));
                    echo $this->Paginator->next('Next &rarr;',
                                                array(
                        'class' => 'next',
                        'tag' => 'li',
                        'escape' => false), '<a onclick="return false;">Next &rarr;</a>',
                                                array(
                        'class' => 'next disabled',
                        'tag' => 'li',
                        'escape' => false));
                    ?>
                </ul>
            <?php } ?>

        </div> <!-- end col md 9 -->
    </div><!-- end row -->


</div><!-- end containing of content -->