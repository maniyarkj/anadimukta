<div class="referenceTypes view">
    <div class="row">
        <div class="col-md-12">
            <div class="page-header">
                <h1><?php echo __('Reference Type'); ?></h1>
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
                            <li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>&nbsp&nbsp;Edit Reference Type'), array('action' => 'edit', $referenceType['ReferenceType']['id']), array('escape' => false)); ?> </li>
                            <li><?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>&nbsp;&nbsp;Delete Reference Type'), array('action' => 'delete', $referenceType['ReferenceType']['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $referenceType['ReferenceType']['id'])); ?> </li>
                            <li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;List Reference Types'), array('action' => 'index'), array('escape' => false)); ?> </li>
                            <li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;New Reference Type'), array('action' => 'add'), array('escape' => false)); ?> </li>
                            <li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;List References'), array('controller' => 'references', 'action' => 'index'), array('escape' => false)); ?> </li>
                            <li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;New Reference'), array('controller' => 'references', 'action' => 'add'), array('escape' => false)); ?> </li>
                        </ul>
                    </div><!-- end body -->
                </div><!-- end panel -->
            </div><!-- end actions -->
        </div><!-- end col md 3 -->

        <div class="col-md-9">			
            <table cellpadding="0" cellspacing="0" class="table table-striped">
                <tbody>
                    <tr>
                        <th><?php echo __('Id'); ?></th>
                        <td>
                            <?php echo h($referenceType['ReferenceType']['id']); ?>
                            &nbsp;
                        </td>
                    </tr>
                    <tr>
                        <th><?php echo __('Type'); ?></th>
                        <td>
                            <?php echo h($referenceType['ReferenceType']['type']); ?>
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
        <h3><?php echo __('Related References'); ?></h3>
        <?php if (!empty($referenceType['Reference'])): ?>
        <table cellpadding = "0" cellspacing = "0" class="table table-striped">
            <thead>
                <tr>
                    <th><?php echo __('Id'); ?></th>
                    <th><?php echo __('Title'); ?></th>
                    <th><?php echo __('Grade'); ?></th>
                    <th><?php echo __('Reference Type Id'); ?></th>
                    <th><?php echo __('Content'); ?></th>
                    <th><?php echo __('Dtp User Id'); ?></th>
                    <th><?php echo __('Published By'); ?></th>
                    <th><?php echo __('Status'); ?></th>
                    <th><?php echo __('Created'); ?></th>
                    <th><?php echo __('Modified'); ?></th>
                    <th class="actions"></th>
                </tr>
            <thead>
            <tbody>
                    <?php foreach ($referenceType['Reference'] as $reference): ?>
                <tr>
                    <td><?php echo $reference['id']; ?></td>
                    <td><?php echo $reference['title']; ?></td>
                    <td><?php echo $reference['grade']; ?></td>
                    <td><?php echo $reference['reference_type_id']; ?></td>
                    <td><?php echo $reference['content']; ?></td>
                    <td><?php echo $reference['dtp_user_id']; ?></td>
                    <td><?php echo $reference['published_by']; ?></td>
                    <td><?php echo $reference['status']; ?></td>
                    <td><?php echo $reference['created']; ?></td>
                    <td><?php echo $reference['modified']; ?></td>
                    <td class="actions">
                                <?php echo $this->Html->link(__('<span class="glyphicon glyphicon-search"></span>'), array('controller' => 'references', 'action' => 'view', $reference['id']), array('escape' => false)); ?>
                                <?php echo $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>'), array('controller' => 'references', 'action' => 'edit', $reference['id']), array('escape' => false)); ?>
                                <?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>'), array('controller' => 'references', 'action' => 'delete', $reference['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $reference['id'])); ?>
                    </td>
                </tr>
                    <?php endforeach; ?>
            </tbody>
        </table>
        <?php endif; ?>

        <div class="actions">
            <?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;New Reference'), array('controller' => 'references', 'action' => 'add'), array('escape' => false, 'class' => 'btn btn-default')); ?> 
        </div>
    </div><!-- end col md 12 -->
</div>
