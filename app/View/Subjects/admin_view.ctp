<div class="subjects view">
    <div class="row">
        <div class="col-md-12">
            <div class="page-header">
                <h1><?php echo __('Subject'); ?></h1>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <table cellpadding="0" cellspacing="0" class="table table-striped">
                <tbody>
                    <tr>
                        <th><?php echo __('Id'); ?></th>
                        <td>
                            <?php echo h($subject['Subject']['id']); ?>
                            &nbsp;
                        </td>
                    </tr>
                    <tr>
                        <th><?php echo __('Title'); ?></th>
                        <td>
                            <?php echo h($subject['Subject']['title']); ?>
                            &nbsp;
                        </td>
                    </tr>
                    <tr>
                        <th><?php echo __('Self'); ?></th>
                        <td>
                            <?php echo $this->Html->link($subject['self']['title'], array('controller' => 'subjects', 'action' => 'view', $subject['self']['id'])); ?>
                            &nbsp;
                        </td>
                    </tr>
                    <tr>
                        <th><?php echo __('Created'); ?></th>
                        <td>
                            <?php echo h($subject['Subject']['created']); ?>
                            &nbsp;
                        </td>
                    </tr>
                    <tr>
                        <th><?php echo __('Modified'); ?></th>
                        <td>
                            <?php echo h($subject['Subject']['modified']); ?>
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
        <h3><?php echo __('Related Prasangs'); ?></h3>
        <?php if (!empty($subject['Prasang'])): ?>
        <table cellpadding = "0" cellspacing = "0" class="table table-striped">
            <thead>
                <tr>
                    <th><?php echo __('Id'); ?></th>
                    <th><?php echo __('Section Id'); ?></th>
                    <th><?php echo __('With Id'); ?></th>
                    <th><?php echo __('Grade'); ?></th>
                    <th><?php echo __('Title'); ?></th>
                    <th><?php echo __('Date'); ?></th>
                    <th><?php echo __('Place'); ?></th>
                    <th><?php echo __('Event'); ?></th>
                    <th><?php echo __('Content English'); ?></th>
                    <th><?php echo __('Content Hindi'); ?></th>
                    <th><?php echo __('Content Gujarati'); ?></th>
                    <th><?php echo __('Notes'); ?></th>
                    <th><?php echo __('Is Personal'); ?></th>
                    <th><?php echo __('Donor Name'); ?></th>
                    <th><?php echo __('Donor Phone'); ?></th>
                    <th><?php echo __('Donor Email'); ?></th>
                    <th><?php echo __('Donor Zone Id'); ?></th>
                    <th><?php echo __('Donor Center Id'); ?></th>
                    <th><?php echo __('Author Id'); ?></th>
                    <th><?php echo __('Is Rewrite'); ?></th>
                    <th><?php echo __('Rewrite Date'); ?></th>
                    <th><?php echo __('Has Proof'); ?></th>
                    <th><?php echo __('Proof Date'); ?></th>
                    <th><?php echo __('X Publish Date'); ?></th>
                    <th><?php echo __('Status'); ?></th>
                    <th><?php echo __('Created'); ?></th>
                    <th><?php echo __('Modified'); ?></th>
                    <th><?php echo __('Published'); ?></th>
                    <th><?php echo __('Dtp User Id'); ?></th>
                    <th><?php echo __('Published By'); ?></th>
                    <th class="actions"></th>
                </tr>
            <thead>
            <tbody>
                    <?php foreach ($subject['Prasang'] as $prasang): ?>
                <tr>
                    <td><?php echo $prasang['id']; ?></td>
                    <td><?php echo $prasang['section_id']; ?></td>
                    <td><?php echo $prasang['with_id']; ?></td>
                    <td><?php echo $prasang['grade']; ?></td>
                    <td><?php echo $prasang['title']; ?></td>
                    <td><?php echo $prasang['date']; ?></td>
                    <td><?php echo $prasang['place']; ?></td>
                    <td><?php echo $prasang['event']; ?></td>
                    <td><?php echo $prasang['content_english']; ?></td>
                    <td><?php echo $prasang['content_hindi']; ?></td>
                    <td><?php echo $prasang['content_gujarati']; ?></td>
                    <td><?php echo $prasang['notes']; ?></td>
                    <td><?php echo $prasang['is_personal']; ?></td>
                    <td><?php echo $prasang['donor_name']; ?></td>
                    <td><?php echo $prasang['donor_phone']; ?></td>
                    <td><?php echo $prasang['donor_email']; ?></td>
                    <td><?php echo $prasang['donor_zone_id']; ?></td>
                    <td><?php echo $prasang['donor_center_id']; ?></td>
                    <td><?php echo $prasang['author_id']; ?></td>
                    <td><?php echo $prasang['is_rewrite']; ?></td>
                    <td><?php echo $prasang['rewrite_date']; ?></td>
                    <td><?php echo $prasang['has_proof']; ?></td>
                    <td><?php echo $prasang['proof_date']; ?></td>
                    <td><?php echo $prasang['x_publish_date']; ?></td>
                    <td><?php echo $prasang['status']; ?></td>
                    <td><?php echo $prasang['created']; ?></td>
                    <td><?php echo $prasang['modified']; ?></td>
                    <td><?php echo $prasang['published']; ?></td>
                    <td><?php echo $prasang['dtp_user_id']; ?></td>
                    <td><?php echo $prasang['published_by']; ?></td>
                    <td class="actions">
                                <?php echo $this->Html->link(__('<span class="glyphicon glyphicon-search"></span>'), array('controller' => 'prasangs', 'action' => 'view', $prasang['id']), array('escape' => false)); ?>
                                <?php echo $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>'), array('controller' => 'prasangs', 'action' => 'edit', $prasang['id']), array('escape' => false)); ?>
                                <?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>'), array('controller' => 'prasangs', 'action' => 'delete', $prasang['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $prasang['id'])); ?>
                    </td>
                </tr>
                    <?php endforeach; ?>
            </tbody>
        </table>
        <?php endif; ?>

        <div class="actions">
            <?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;New Prasang'), array('controller' => 'prasangs', 'action' => 'add'), array('escape' => false, 'class' => 'btn btn-default')); ?>
        </div>
    </div><!-- end col md 12 -->
</div>
<div class="related row">
    <div class="col-md-12">
        <h3><?php echo __('Related References'); ?></h3>
        <?php if (!empty($subject['Reference'])): ?>
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
                    <?php foreach ($subject['Reference'] as $reference): ?>
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
