<div class="talukas index">

    <div class="row">
        <div class="col-md-12">
            <div class="page-header">
                <h1><?php echo __('Talukas'); ?></h1>
            </div>
        </div><!-- end col md 12 -->
    </div><!-- end row -->

    <div class="row">
        <div class="col-md-12">
            <div>
                <?php echo $this->Html->link(
                        __('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;New Taluka'),
                        array('action' => 'add'),
                        array('escape' => false, 'class' => 'btn btn-primary')); ?>
            </div>
            <table cellpadding="0" cellspacing="0" class="table table-striped">
                <thead>
                    <tr>
                        <th><?php echo $this->Paginator->sort('id'); ?></th>
                        <th><?php echo $this->Paginator->sort('name'); ?></th>
                        <th><?php echo $this->Paginator->sort('district_id'); ?></th>
                        <th><?php echo $this->Paginator->sort('state_id'); ?></th>
                        <th><?php echo $this->Paginator->sort('country_id'); ?></th>
                        <th class="actions"></th>
                    </tr>
                </thead>
                <tbody>
				<?php foreach ($talukas as $taluka): ?>
                    <tr>
                        <td><?php echo h($taluka['Taluka']['id']); ?>&nbsp;</td>
                        <td><?php echo h($taluka['Taluka']['name']); ?>&nbsp;</td>
                        <td>
			<?php echo $this->Html->link($taluka['District']['name'], array('controller' => 'districts', 'action' => 'view', $taluka['District']['id'])); ?>
                        </td>
                        <td>
			<?php echo $this->Html->link($taluka['State']['name'], array('controller' => 'states', 'action' => 'view', $taluka['State']['id'])); ?>
                        </td>
                        <td>
			<?php echo $this->Html->link($taluka['Country']['name'], array('controller' => 'countries', 'action' => 'view', $taluka['Country']['id'])); ?>
                        </td>
                        <td class="actions">
							<?php echo $this->Html->link('<span class="glyphicon glyphicon-search"></span>', array('action' => 'view', $taluka['Taluka']['id']), array('escape' => false)); ?>
							<?php echo $this->Html->link('<span class="glyphicon glyphicon-edit"></span>', array('action' => 'edit', $taluka['Taluka']['id']), array('escape' => false)); ?>
							<?php echo $this->Form->postLink('<span class="glyphicon glyphicon-remove"></span>', array('action' => 'delete', $taluka['Taluka']['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $taluka['Taluka']['id'])); ?>
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