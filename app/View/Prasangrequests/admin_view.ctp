<div class="prasangrequests view">
    <div class="row">
        <div class="col-md-12">
            <div class="page-header">
                <h1><?php echo __('Request Details'); ?></h1>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <table cellpadding="0" cellspacing="0" class="table table-striped">
                <tbody>
                    <tr>
                        <th><?php echo __('Section'); ?></th>
                        <td>
                            <?php echo h($prasangrequest['Section']['name']); ?>
                            &nbsp;
                        </td>
                    </tr>
                    <tr>
                        <th><?php echo __('With'); ?></th>
                        <td>
                            <?php echo h($prasangrequest['With']['name']); ?>
                            &nbsp;
                        </td>
                    </tr>
                    <tr>
                        <th><?php echo __('Grade'); ?></th>
                        <td>
                            <?php echo h($prasangrequest['Prasangrequest']['grade']); ?>
                            &nbsp;
                        </td>
                    </tr>
                    <tr>
                        <th><?php echo __('Title'); ?></th>
                        <td>
                            <?php echo h($prasangrequest['Prasangrequest']['title']); ?>
                            &nbsp;
                        </td>
                    </tr>
                    <tr>
                        <th><?php echo __('Date'); ?></th>
                        <td>
                            <?php echo h($prasangrequest['Prasangrequest']['date_readable']); ?>
                            &nbsp;
                        </td>
                    </tr>
                    <tr>
                        <th><?php echo __('Place'); ?></th>
                        <td>
                            <?php echo h($prasangrequest['Prasangrequest']['place']); ?>
                            &nbsp;
                        </td>
                    </tr>
                    <tr>
                        <th><?php echo __('Event'); ?></th>
                        <td>
                            <?php echo h($prasangrequest['Prasangrequest']['event']); ?>
                            &nbsp;
                        </td>
                    </tr>
                    <tr>
                        <th><?php echo __('Content'); ?></th>
                        <td>
                            <?php echo $prasangrequest['Prasangrequest']['content']; ?>
                            &nbsp;
                        </td>
                    </tr>
                    <tr>
                        <th><?php echo __('Is Personal'); ?></th>
                        <td>
                            <?php echo h($prasangrequest['Prasangrequest']['is_personal_text']); ?>
                            &nbsp;
                        </td>
                    </tr>
                    <tr>
                        <th><?php echo __('Donor Name'); ?></th>
                        <td>
                            <?php echo h($prasangrequest['Prasangrequest']['donor_name']); ?>
                            &nbsp;
                        </td>
                    </tr>
                    <tr>
                        <th><?php echo __('Donor Phone'); ?></th>
                        <td>
                            <?php echo h($prasangrequest['Prasangrequest']['donor_phone']); ?>
                            &nbsp;
                        </td>
                    </tr>
                    <tr>
                        <th><?php echo __('Donor Email'); ?></th>
                        <td>
                            <?php echo h($prasangrequest['Prasangrequest']['donor_email']); ?>
                            &nbsp;
                        </td>
                    </tr>
                    <tr>
                        <th><?php echo __('Donor Zone Id'); ?></th>
                        <td>
                            <?php echo h($prasangrequest['DonorZone']['name']); ?>
                            &nbsp;
                        </td>
                    </tr>
                    <tr>
                        <th><?php echo __('Donor Center Id'); ?></th>
                        <td>
                            <?php echo h($prasangrequest['DonorCenter']['name']); ?>
                            &nbsp;
                        </td>
                    </tr>
                    <tr>
                        <th><?php echo __('Submitted By User'); ?></th>
                        <td>
                            <?php echo h($prasangrequest['SubmittedByUser']['username']); ?>
                            &nbsp;
                        </td>
                    </tr>
                    <tr>
                        <th><?php echo __('Status'); ?></th>
                        <td>
                            <?php echo $statuses[$prasangrequest['Prasangrequest']['status']]; ?>
                            &nbsp;
                        </td>
                    </tr>
                    <tr>
                        <th><?php echo __('Submitted On'); ?></th>
                        <td>
                            <?php echo h($prasangrequest['Prasangrequest']['created_readable']); ?>
                            &nbsp;
                        </td>
                    </tr>
                </tbody>
            </table>

        </div><!-- end col md 9 -->

    </div>
</div>

