<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
<?php echo $this->Html->css(array('print'), array(
    'rel' => 'stylesheet',
    'type'=>"text/css",
    'media'=>"print")); ?>
<style>
    body{font-family: serif; font-size: 12px;}
    .label-big{font-size: 20px;}
    label{font-weight: bold;}
</style>
<script>
    $(document).ready(function(){
        window.print();
    });
</script>
<div class="prasangs index">
    <div class="row">
        <div class="col-md-12">
            <?php $cnt=0; foreach ($prasangs as $prasang): ?>
            <div class="page-header">
                <h1 style="text-align: center;"><?php echo __('Prasang Collection'); ?></h1>
            </div>
            <table cellpadding="5" cellspacing="0" style="width: 100%;">
                <tbody>
                    <tr>
                        <td colspan="3" class="label-big"><?php echo __('Writing Format'); ?></td>
                        <td>&nbsp;</td>
                        <td colspan="4" class="label-big" style="text-align: right;"><?php echo __('Prasang No'); ?>:_________</td>
                    </tr>
                    <tr>
                        <td colspan="2" width="20%">
                            <label><?php echo __('Donor Name'); ?>:</label>
                            <?php echo h($prasang['Prasangrequest']['donor_name']); ?>
                        </td>
                        <td colspan="2" width="20%">
                            <label><?php echo __('Phone No'); ?>:</label>
                            <?php echo h($prasang['Prasangrequest']['donor_phone']); ?>
                        </td>
                        <td colspan="2" width="20%">
                            <label><?php echo __('Email'); ?>:</label>
                            <?php echo h($prasang['Prasangrequest']['donor_email']); ?>
                        </td>
                        <td colspan="2" width="20%">
                            <label><?php echo __('Zone'); ?>:</label>
                            <?php echo h($prasang['DonorZone']['name']); ?>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" width="20%">
                            <label><?php echo __('Center'); ?>:</label>
                            <?php echo h($prasang['DonorCenter']['name']); ?>
                        </td>
                        <td colspan="2" width="20%">
                            <label><?php echo __('Date'); ?>:</label>
                            <?php echo h($prasang['Prasangrequest']['date']); ?>
                        </td>
                        <td colspan="2" width="20%">
                            <label><?php echo __('Place'); ?>:</label>
                            <?php echo h($prasang['Prasangrequest']['place']); ?>
                        </td>
                        <td colspan="2" width="20%">
                            <label><?php echo __('Event'); ?>:</label>
                            <?php echo h($prasang['Prasangrequest']['event']); ?>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" width="20%">
                            <label><?php echo __('Section'); ?>:</label>
                            <?php echo h($prasang['Section']['name']); ?>
                        </td>
                        <td colspan="2" width="20%">
                            <label><?php echo __('With'); ?>:</label>
                            <?php echo h($prasang['With']['name']); ?>
                        </td>
                        <td colspan="2" width="20%">
                            <label><?php echo __('Grade'); ?>:</label>
                            <?php echo h($prasang['Prasangrequest']['grade']); ?>
                        </td>
                        <td class="label">&nbsp;</td>
                        <td class="label">&nbsp;</td>
                    </tr>
                    <tr>
                        <td colspan="4">
                            <label><?php echo __('Subject'); ?>:</label>
                        </td>
                        <td colspan="4">
                            <label><?php echo __('Title'); ?>:</label>
                            <?php echo h($prasang['Prasangrequest']['title']); ?>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="6" style="vertical-align: top;">
                            <label><?php echo __('Special Note'); ?>:</label>
                        </td>
                        <td colspan="2" style="text-align: center; height: 100px; vertical-align: top;">
                            <label><?php echo __('Attachment List'); ?></label>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="8" class="label-big">
                            <?php echo __('Writing Area'); ?>
                        </td>
                    </tr>
                </tbody>
            </table>
            <?php $cnt++; if (count($prasangs) != $cnt) { ?>
            <div class="page_break_after"></div>
            <?php } ?>
            <?php endforeach; ?>
        </div> <!-- end col md 9 -->
    </div><!-- end row -->
</div><!-- end containing of content -->