<div class="references view">
    <div class="row">
        <div class="col-md-12">
            <div class="page-header">
                <h1><?php echo __('Reference'); ?></h1>
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
                            <li><?php
                                echo $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>&nbsp&nbsp;Edit Reference'),
                                                          array(
                                    'action' => 'edit',
                                    $reference['Reference']['id']),
                                                          array(
                                    'escape' => false));
                                ?> </li>
                            <li><?php
                                echo $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>&nbsp;&nbsp;Delete Reference'),
                                                              array(
                                    'action' => 'delete',
                                    $reference['Reference']['id']),
                                                              array(
                                    'escape' => false),
                                                              __('Are you sure you want to delete # %s?',
                                                                 $reference['Reference']['id']));
                                ?> </li>
                            <li><?php
                                echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;List References'),
                                                          array(
                                    'action' => 'index'),
                                                          array(
                                    'escape' => false));
                                ?> </li>
                            <li><?php
                                echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;New Reference'),
                                                          array(
                                    'action' => 'add'),
                                                          array(
                                    'escape' => false));
                                ?> </li>
                            <li><?php
                                echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;List Reference Types'),
                                                          array(
                                    'controller' => 'reference_types',
                                    'action' => 'index'),
                                                          array(
                                    'escape' => false));
                                ?> </li>
                            <li><?php
                                echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;New Reference Type'),
                                                          array(
                                    'controller' => 'reference_types',
                                    'action' => 'add'),
                                                          array(
                                    'escape' => false));
                                ?> </li>
                            <li><?php
                                echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;List Dtp Users'),
                                                          array(
                                    'controller' => 'dtp_users',
                                    'action' => 'index'),
                                                          array(
                                    'escape' => false));
                                ?> </li>
                            <li><?php
                                echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;New Dtp User'),
                                                          array(
                                    'controller' => 'dtp_users',
                                    'action' => 'add'),
                                                          array(
                                    'escape' => false));
                                ?> </li>
                            <li><?php
                                echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;List Users'),
                                                          array(
                                    'controller' => 'users',
                                    'action' => 'index'),
                                                          array(
                                    'escape' => false));
                                ?> </li>
                            <li><?php
                                echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;New Published By'),
                                                          array(
                                    'controller' => 'users',
                                    'action' => 'add'),
                                                          array(
                                    'escape' => false));
                                ?> </li>
                            <li><?php
                                echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;List Subjects'),
                                                          array(
                                    'controller' => 'subjects',
                                    'action' => 'index'),
                                                          array(
                                    'escape' => false));
                                ?> </li>
                            <li><?php
                                echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;New Subject'),
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
                <tbody>
                    <tr>
                        <th><?php echo __('Title'); ?></th>
                        <td>
                            <?php echo h($reference['Reference']['title']); ?>
                            &nbsp;
                        </td>
                    </tr>
                    <tr>
                        <th><?php echo __('Grade'); ?></th>
                        <td>
                            <?php echo h($reference['Reference']['grade']); ?>
                            &nbsp;
                        </td>
                    </tr>
                    <tr>
                        <th><?php echo __('Reference Type'); ?></th>
                        <td>
                            <?php
                            echo $this->Html->link($reference['ReferenceType']['type'],
                                                   array(
                                'controller' => 'reference_types',
                                'action' => 'view',
                                $reference['ReferenceType']['id']));
                            ?>
                            &nbsp;
                        </td>
                    </tr>
                    <tr>
                        <th><?php echo __('Content'); ?></th>
                        <td>
                            <?php echo h($reference['Reference']['content']); ?>
                            &nbsp;
                        </td>
                    </tr>
                    <tr>
                        <th><?php echo __('Created By User'); ?></th>
                        <td>
                            <?php
                            echo $this->Html->link($reference['CreatedByUser']['username'],
                                                   array(
                                'controller' => 'users',
                                'action' => 'view',
                                $reference['CreatedByUser']['id']));
                            ?>
                            &nbsp;
                        </td>
                    </tr>
                    <tr>
                        <th><?php echo __('Published By'); ?></th>
                        <td>
                            <?php
                            echo $this->Html->link($reference['PublishedByUser']['username'],
                                                   array(
                                'controller' => 'users',
                                'action' => 'view',
                                $reference['PublishedByUser']['id']));
                            ?>
                            &nbsp;
                        </td>
                    </tr>
                    <tr>
                        <th><?php echo __('Status'); ?></th>
                        <td>
                            <?php echo h($reference['Reference']['status']); ?>
                            &nbsp;
                        </td>
                    </tr>
                    <tr>
                        <th><?php echo __('Created'); ?></th>
                        <td>
                            <?php echo h($reference['Reference']['created']); ?>
                            &nbsp;
                        </td>
                    </tr>
                    <tr>
                        <th><?php echo __('Modified'); ?></th>
                        <td>
                            <?php echo h($reference['Reference']['modified']); ?>
                            &nbsp;
                        </td>
                    </tr>
                </tbody>
            </table>

        </div><!-- end col md 9 -->

    </div>
</div>

<div class="related row">
    <div class="col-md-12">
        <h3><?php echo __('Related Subjects'); ?></h3>
        <?php if (!empty($reference['Subject'])): ?>
            <table cellpadding = "0" cellspacing = "0" class="table table-striped">
                <thead>
                    <tr>
                        <th><?php echo __('Id'); ?></th>
                        <th><?php echo __('Title'); ?></th>
                        <th><?php echo __('Parent Id'); ?></th>
                        <th><?php echo __('Created'); ?></th>
                        <th><?php echo __('Modified'); ?></th>
                        <th class="actions"></th>
                    </tr>
                <thead>
                <tbody>
                    <?php foreach ($reference['Subject'] as $subject): ?>
                        <tr>
                            <td><?php echo $subject['id']; ?></td>
                            <td><?php echo $subject['title']; ?></td>
                            <td><?php echo $subject['parent_id']; ?></td>
                            <td><?php echo $subject['created']; ?></td>
                            <td><?php echo $subject['modified']; ?></td>
                            <td class="actions">
                                <?php
                                echo $this->Html->link(__('<span class="glyphicon glyphicon-search"></span>'),
                                                          array(
                                    'controller' => 'subjects',
                                    'action' => 'view',
                                    $subject['id']),
                                                          array(
                                    'escape' => false));
                                ?>
                                <?php
                                echo $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>'),
                                                          array(
                                    'controller' => 'subjects',
                                    'action' => 'edit',
                                    $subject['id']),
                                                          array(
                                    'escape' => false));
                                ?>
                                <?php
                                echo $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>'),
                                                              array(
                                    'controller' => 'subjects',
                                    'action' => 'delete',
                                    $subject['id']),
                                                              array(
                                    'escape' => false),
                                                              __('Are you sure you want to delete # %s?',
                                                                 $subject['id']));
                                ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>

        <div class="actions">
            <?php
            echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;New Subject'),
                                      array(
                'controller' => 'subjects',
                'action' => 'add'),
                                      array(
                'escape' => false,
                'class' => 'btn btn-default'));
            ?>
        </div>
    </div><!-- end col md 12 -->
</div>
