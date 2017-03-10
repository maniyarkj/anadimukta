<div class="cities view">
    <div class="row">
        <div class="col-md-12">
            <div class="page-header">
                <h1><?php echo __('City'); ?></h1>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-9">
            <table cellpadding="0" cellspacing="0" class="table table-striped">
                <tbody>
                    <tr>
                        <th><?php echo __('Id'); ?></th>
                        <td>
                            <?php echo h($city['City']['id']); ?>
                            &nbsp;
                        </td>
                    </tr>
                    <tr>
                        <th><?php echo __('Name'); ?></th>
                        <td>
                            <?php echo h($city['City']['name']); ?>
                            &nbsp;
                        </td>
                    </tr>
                    <tr>
                        <th><?php echo __('State'); ?></th>
                        <td>
                            <?php echo $this->Html->link($city['State']['name'], array('controller' => 'states', 'action' => 'view', $city['State']['id'])); ?>
                            &nbsp;
                        </td>
                    </tr>
                    <tr>
                        <th><?php echo __('Country'); ?></th>
                        <td>
                            <?php echo $this->Html->link($city['Country']['name'], array('controller' => 'countries', 'action' => 'view', $city['Country']['id'])); ?>
                            &nbsp;
                        </td>
                    </tr>
                    <tr>
                        <th><?php echo __('District'); ?></th>
                        <td>
                            <?php echo $this->Html->link($city['District']['name'], array('controller' => 'districts', 'action' => 'view', $city['District']['id'])); ?>
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
        <?php if (!empty($city['UserDetail'])): ?>
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
                    <?php foreach ($city['UserDetail'] as $userDetail): ?>
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
