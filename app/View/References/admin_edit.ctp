<div class="references form">
    <div class="row">
        <div class="col-md-12">
            <div class="page-header">
                <h1><?php echo __('Admin Edit Reference'); ?></h1>
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
                                echo $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>&nbsp;&nbsp;Delete'),
                                                              array(
                                    'action' => 'delete',
                                    $this->Form->value('Reference.id')),
                                                       array(
                                    'escape' => false),
                                                       __('Are you sure you want to delete # %s?',
                                                          $this->Form->value('Reference.id')));
                                ?></li>
                            <li><?php
                                echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;List References'),
                                                          array(
                                    'action' => 'index'),
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
                    </div>
                </div>
            </div>
        </div><!-- end col md 3 -->
        <div class="col-md-9">
            <?php echo $this->element('references/form_reference'); ?>
        </div><!-- end col md 12 -->
    </div><!-- end row -->
</div>
