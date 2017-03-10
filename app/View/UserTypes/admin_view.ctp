<div class="userTypes view">
    <div class="row">
        <div class="col-md-12">
            <div class="page-header">
                <h1><?php echo __('User Type'); ?></h1>
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
                            <li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>&nbsp&nbsp;Edit User Type'), array('action' => 'edit', $userType['UserType']['id']), array('escape' => false)); ?> </li>
                            <li><?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>&nbsp;&nbsp;Delete User Type'), array('action' => 'delete', $userType['UserType']['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $userType['UserType']['id'])); ?> </li>
                            <li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;List User Types'), array('action' => 'index'), array('escape' => false)); ?> </li>
                            <li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;New User Type'), array('action' => 'add'), array('escape' => false)); ?> </li>
                            <li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;List User Details'), array('controller' => 'user_details', 'action' => 'index'), array('escape' => false)); ?> </li>
                            <li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;New User Detail'), array('controller' => 'user_details', 'action' => 'add'), array('escape' => false)); ?> </li>
                            <li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;List Prasangs'), array('controller' => 'prasangs', 'action' => 'index'), array('escape' => false)); ?> </li>
                            <li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;New Prasang'), array('controller' => 'prasangs', 'action' => 'add'), array('escape' => false)); ?> </li>
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
                            <?php echo h($userType['UserType']['id']); ?>
                            &nbsp;
                        </td>
                    </tr>
                    <tr>
                        <th><?php echo __('Type'); ?></th>
                        <td>
                            <?php echo h($userType['UserType']['type']); ?>
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
        <h3><?php echo __('Related User Details'); ?></h3>
        <?php if (!empty($userType['UserDetail'])): ?>
        <table cellpadding = "0" cellspacing = "0" class="table table-striped">
            <thead>
                <tr>
                    <th><?php echo __('Id'); ?></th>
                    <th><?php echo __('User Id'); ?></th>
                    <th><?php echo __('User Type Id'); ?></th>
                    <th><?php echo __('First Name'); ?></th>
                    <th><?php echo __('Middle Name'); ?></th>
                    <th><?php echo __('Last Name'); ?></th>
                    <th><?php echo __('Email'); ?></th>
                    <th><?php echo __('Mobile'); ?></th>
                    <th><?php echo __('Country Id'); ?></th>
                    <th><?php echo __('State Id'); ?></th>
                    <th><?php echo __('District Id'); ?></th>
                    <th><?php echo __('Taluka Id'); ?></th>
                    <th><?php echo __('City Id'); ?></th>
                    <th><?php echo __('Dob'); ?></th>
                    <th><?php echo __('Gender'); ?></th>
                    <th><?php echo __('Referral Name'); ?></th>
                    <th><?php echo __('Photo'); ?></th>
                    <th><?php echo __('Zone Id'); ?></th>
                    <th><?php echo __('Center Id'); ?></th>
                    <th><?php echo __('Status'); ?></th>
                    <th><?php echo __('Created'); ?></th>
                    <th><?php echo __('Modified'); ?></th>
                    <th class="actions"></th>
                </tr>
            <thead>
            <tbody>
                    <?php foreach ($userType['UserDetail'] as $userDetail): ?>
                <tr>
                    <td><?php echo $userDetail['id']; ?></td>
                    <td><?php echo $userDetail['user_id']; ?></td>
                    <td><?php echo $userDetail['user_type_id']; ?></td>
                    <td><?php echo $userDetail['first_name']; ?></td>
                    <td><?php echo $userDetail['middle_name']; ?></td>
                    <td><?php echo $userDetail['last_name']; ?></td>
                    <td><?php echo $userDetail['email']; ?></td>
                    <td><?php echo $userDetail['mobile']; ?></td>
                    <td><?php echo $userDetail['country_id']; ?></td>
                    <td><?php echo $userDetail['state_id']; ?></td>
                    <td><?php echo $userDetail['district_id']; ?></td>
                    <td><?php echo $userDetail['taluka_id']; ?></td>
                    <td><?php echo $userDetail['city_id']; ?></td>
                    <td><?php echo $userDetail['dob']; ?></td>
                    <td><?php echo $userDetail['gender']; ?></td>
                    <td><?php echo $userDetail['referral_name']; ?></td>
                    <td><?php echo $userDetail['photo']; ?></td>
                    <td><?php echo $userDetail['zone_id']; ?></td>
                    <td><?php echo $userDetail['center_id']; ?></td>
                    <td><?php echo $userDetail['status']; ?></td>
                    <td><?php echo $userDetail['created']; ?></td>
                    <td><?php echo $userDetail['modified']; ?></td>
                    <td class="actions">
                                <?php echo $this->Html->link(__('<span class="glyphicon glyphicon-search"></span>'), array('controller' => 'user_details', 'action' => 'view', $userDetail['id']), array('escape' => false)); ?>
                                <?php echo $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>'), array('controller' => 'user_details', 'action' => 'edit', $userDetail['id']), array('escape' => false)); ?>
                                <?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>'), array('controller' => 'user_details', 'action' => 'delete', $userDetail['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $userDetail['id'])); ?>
                    </td>
                </tr>
                    <?php endforeach; ?>
            </tbody>
        </table>
        <?php endif; ?>

        <div class="actions">
            <?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;New User Detail'), array('controller' => 'user_details', 'action' => 'add'), array('escape' => false, 'class' => 'btn btn-default')); ?> 
        </div>
    </div><!-- end col md 12 -->
</div>
<div class="related row">
    <div class="col-md-12">
        <h3><?php echo __('Related Prasangs'); ?></h3>
        <?php if (!empty($userType['Prasang'])): ?>
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
                    <?php foreach ($userType['Prasang'] as $prasang): ?>
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
