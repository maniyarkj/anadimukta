<div class="userDetails index">

    <div class="row">
        <div class="col-md-12">
            <div class="page-header">
                <h1><?php echo __('User Details'); ?></h1>
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
                            <li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;New User Detail'), array('action' => 'add'), array('escape' => false)); ?></li>
                            <li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;List Users'), array('controller' => 'users', 'action' => 'index'), array('escape' => false)); ?> </li>
                            <li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;New User'), array('controller' => 'users', 'action' => 'add'), array('escape' => false)); ?> </li>
                            <li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;List User Types'), array('controller' => 'user_types', 'action' => 'index'), array('escape' => false)); ?> </li>
                            <li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;New User Type'), array('controller' => 'user_types', 'action' => 'add'), array('escape' => false)); ?> </li>
                            <li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;List Countries'), array('controller' => 'countries', 'action' => 'index'), array('escape' => false)); ?> </li>
                            <li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;New Country'), array('controller' => 'countries', 'action' => 'add'), array('escape' => false)); ?> </li>
                            <li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;List States'), array('controller' => 'states', 'action' => 'index'), array('escape' => false)); ?> </li>
                            <li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;New State'), array('controller' => 'states', 'action' => 'add'), array('escape' => false)); ?> </li>
                            <li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;List Districts'), array('controller' => 'districts', 'action' => 'index'), array('escape' => false)); ?> </li>
                            <li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;New District'), array('controller' => 'districts', 'action' => 'add'), array('escape' => false)); ?> </li>
                            <li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;List Talukas'), array('controller' => 'talukas', 'action' => 'index'), array('escape' => false)); ?> </li>
                            <li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;New Taluka'), array('controller' => 'talukas', 'action' => 'add'), array('escape' => false)); ?> </li>
                            <li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;List Cities'), array('controller' => 'cities', 'action' => 'index'), array('escape' => false)); ?> </li>
                            <li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;New City'), array('controller' => 'cities', 'action' => 'add'), array('escape' => false)); ?> </li>
                            <li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;List Zones'), array('controller' => 'zones', 'action' => 'index'), array('escape' => false)); ?> </li>
                            <li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;New Zone'), array('controller' => 'zones', 'action' => 'add'), array('escape' => false)); ?> </li>
                            <li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;List Centers'), array('controller' => 'centers', 'action' => 'index'), array('escape' => false)); ?> </li>
                            <li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;New Center'), array('controller' => 'centers', 'action' => 'add'), array('escape' => false)); ?> </li>
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
                        <th><?php echo $this->Paginator->sort('user_id'); ?></th>
                        <th><?php echo $this->Paginator->sort('user_type_id'); ?></th>
                        <th><?php echo $this->Paginator->sort('first_name'); ?></th>
                        <th><?php echo $this->Paginator->sort('middle_name'); ?></th>
                        <th><?php echo $this->Paginator->sort('last_name'); ?></th>
                        <th><?php echo $this->Paginator->sort('email'); ?></th>
                        <th><?php echo $this->Paginator->sort('mobile'); ?></th>
                        <th><?php echo $this->Paginator->sort('country_id'); ?></th>
                        <th><?php echo $this->Paginator->sort('state_id'); ?></th>
                        <th><?php echo $this->Paginator->sort('district_id'); ?></th>
                        <th><?php echo $this->Paginator->sort('taluka_id'); ?></th>
                        <th><?php echo $this->Paginator->sort('city_id'); ?></th>
                        <th><?php echo $this->Paginator->sort('dob'); ?></th>
                        <th><?php echo $this->Paginator->sort('gender'); ?></th>
                        <th><?php echo $this->Paginator->sort('referral_name'); ?></th>
                        <th><?php echo $this->Paginator->sort('photo'); ?></th>
                        <th><?php echo $this->Paginator->sort('zone_id'); ?></th>
                        <th><?php echo $this->Paginator->sort('center_id'); ?></th>
                        <th><?php echo $this->Paginator->sort('status'); ?></th>
                        <th><?php echo $this->Paginator->sort('created'); ?></th>
                        <th><?php echo $this->Paginator->sort('modified'); ?></th>
                        <th class="actions"></th>
                    </tr>
                </thead>
                <tbody>
				<?php foreach ($userDetails as $userDetail): ?>
                    <tr>
                        <td><?php echo h($userDetail['UserDetail']['id']); ?>&nbsp;</td>
                        <td>
			<?php echo $this->Html->link($userDetail['User']['username'], array('controller' => 'users', 'action' => 'view', $userDetail['User']['id'])); ?>
                        </td>
                        <td>
			<?php echo $this->Html->link($userDetail['UserType']['id'], array('controller' => 'user_types', 'action' => 'view', $userDetail['UserType']['id'])); ?>
                        </td>
                        <td><?php echo h($userDetail['UserDetail']['first_name']); ?>&nbsp;</td>
                        <td><?php echo h($userDetail['UserDetail']['middle_name']); ?>&nbsp;</td>
                        <td><?php echo h($userDetail['UserDetail']['last_name']); ?>&nbsp;</td>
                        <td><?php echo h($userDetail['UserDetail']['email']); ?>&nbsp;</td>
                        <td><?php echo h($userDetail['UserDetail']['mobile']); ?>&nbsp;</td>
                        <td>
			<?php echo $this->Html->link($userDetail['Country']['name'], array('controller' => 'countries', 'action' => 'view', $userDetail['Country']['id'])); ?>
                        </td>
                        <td>
			<?php echo $this->Html->link($userDetail['State']['name'], array('controller' => 'states', 'action' => 'view', $userDetail['State']['id'])); ?>
                        </td>
                        <td>
			<?php echo $this->Html->link($userDetail['District']['name'], array('controller' => 'districts', 'action' => 'view', $userDetail['District']['id'])); ?>
                        </td>
                        <td>
			<?php echo $this->Html->link($userDetail['Taluka']['name'], array('controller' => 'talukas', 'action' => 'view', $userDetail['Taluka']['id'])); ?>
                        </td>
                        <td>
			<?php echo $this->Html->link($userDetail['City']['name'], array('controller' => 'cities', 'action' => 'view', $userDetail['City']['id'])); ?>
                        </td>
                        <td><?php echo h($userDetail['UserDetail']['dob']); ?>&nbsp;</td>
                        <td><?php echo h($userDetail['UserDetail']['gender']); ?>&nbsp;</td>
                        <td><?php echo h($userDetail['UserDetail']['referral_name']); ?>&nbsp;</td>
                        <td><?php echo h($userDetail['UserDetail']['photo']); ?>&nbsp;</td>
                        <td>
			<?php echo $this->Html->link($userDetail['Zone']['name'], array('controller' => 'zones', 'action' => 'view', $userDetail['Zone']['id'])); ?>
                        </td>
                        <td>
			<?php echo $this->Html->link($userDetail['Center']['name'], array('controller' => 'centers', 'action' => 'view', $userDetail['Center']['id'])); ?>
                        </td>
                        <td><?php echo h($userDetail['UserDetail']['status']); ?>&nbsp;</td>
                        <td><?php echo h($userDetail['UserDetail']['created']); ?>&nbsp;</td>
                        <td><?php echo h($userDetail['UserDetail']['modified']); ?>&nbsp;</td>
                        <td class="actions">
							<?php echo $this->Html->link('<span class="glyphicon glyphicon-search"></span>', array('action' => 'view', $userDetail['UserDetail']['id']), array('escape' => false)); ?>
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