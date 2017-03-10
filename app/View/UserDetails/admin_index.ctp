<div class="userDetails index">

    <div class="row">
        <div class="col-md-12">
            <div class="page-header">
                <h1><?php echo __('Front-end Users'); ?></h1>
            </div>
        </div><!-- end col md 12 -->
    </div><!-- end row -->
    <div class="row">
        <div class="col-md-12">
            <?php
            if ($Acl->check(
                            array('model' => 'Group', 'foreign_key' => $Auth->user('group_id')),
                            'users/admin_add')) {
                echo $this->Html->link(
                        __('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;New Front User'),
                        array('action' => 'add', 'admin' => true),
                        array('escape' => false, 'class' => 'btn btn-primary'));
            }
            ?>
            <table cellpadding="0" cellspacing="0" class="table table-striped">
                <thead>
                    <tr>
                        <th><?php echo __('Username'); ?></th>
                        <th><?php echo $this->Paginator->sort('user_type_id'); ?></th>
                        <th><?php echo $this->Paginator->sort('first_name'); ?></th>
                        <th><?php echo $this->Paginator->sort('last_name'); ?></th>
                        <th><?php echo $this->Paginator->sort('city_id'); ?></th>
                        <th><?php echo $this->Paginator->sort('referral_name'); ?></th>
                        <th><?php echo $this->Paginator->sort('center_id'); ?></th>
                        <th><?php echo $this->Paginator->sort('status'); ?></th>
                        <th class="actions"></th>
                    </tr>
                </thead>
                <tbody>
				<?php foreach ($userDetails as $userDetail): ?>
                    <tr>
                        <td>
			<?php echo $userDetail['User']['username']; ?>
                        </td>
                        <td>
			<?php echo $userTypes[$userDetail['UserDetail']['user_type_id']]; ?>
                        </td>
                        <td><?php echo h($userDetail['UserDetail']['first_name']); ?>&nbsp;</td>
                        <td><?php echo h($userDetail['UserDetail']['last_name']); ?>&nbsp;</td>
                        <td>
			<?php echo $userDetail['City']['name']; ?>
                        </td>
                        <td><?php echo h($userDetail['UserDetail']['referral_name']); ?>&nbsp;</td>
                        <td>
			<?php echo $userDetail['Center']['name']; ?>
                        </td>
                        <td><?php echo h($statuses[$userDetail['UserDetail']['status']]); ?>&nbsp;</td>
                        <td class="actions">
                            <?php //echo $this->Html->link('<span class="glyphicon glyphicon-search"></span>', array('action' => 'view', $userDetail['UserDetail']['id']), array('escape' => false)); ?>
                            <?php echo $this->Html->link('<span class="glyphicon glyphicon-edit"></span>', array('action' => 'edit', $userDetail['UserDetail']['id']), array('escape' => false)); ?>
                            <?php echo $this->Form->postLink('<span class="glyphicon glyphicon-remove"></span>', array('action' => 'delete', $userDetail['UserDetail']['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $userDetail['UserDetail']['id'])); ?>
                        </td>
                    </tr>
				<?php endforeach; ?>
                </tbody>
            </table>

            <p>
                <small><?php echo $this->Paginator->counter(array('format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')));?></small>
            </p>

			<?php
			$params = $this->Paginator->params();
			if ($params['pageCount'] > 1) {
			?>
            <ul class="pagination pagination-sm">
				<?php
					echo $this->Paginator->prev('&larr; Previous', array('class' => 'prev','tag' => 'li','escape' => false), '<a onclick="return false;">&larr; Previous</a>', array('class' => 'prev disabled','tag' => 'li','escape' => false));
					echo $this->Paginator->numbers(array('separator' => '','tag' => 'li','currentClass' => 'active','currentTag' => 'a'));
					echo $this->Paginator->next('Next &rarr;', array('class' => 'next','tag' => 'li','escape' => false), '<a onclick="return false;">Next &rarr;</a>', array('class' => 'next disabled','tag' => 'li','escape' => false));
				?>
            </ul>
			<?php } ?>

        </div> <!-- end col md 9 -->
    </div><!-- end row -->


</div><!-- end containing of content -->