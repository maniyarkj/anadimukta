<!DOCTYPE html>
<html lang="en">
    <head>
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
</head>
<body>
<div class="prasangs index">
    <?php $cnt=0; foreach ($prasangs as $prasang): ?>

    <table cellpadding="5" cellspacing="0" style="width: 100%;">
        <tr>
            <td><h3><?php echo __('Prasang Collection'); ?></h3></td>
            <td style="text-align: right;"><h3><?php echo __('Prasang No'); ?>: <?php echo h($prasang['Prasang']['id']); ?> </h3></td>
        </tr>
    </table>
    <table cellpadding="5" cellspacing="0" style="width: 100%;">
        <tbody>
            <tr>
                <td colspan="3" class="label-big"><?php echo __('Writing Format'); ?></td>
                <td>&nbsp;</td>
                <td colspan="4">&nbsp;</td>
            </tr>
            <tr>
                <td colspan="2" width="20%">
                    <label><?php echo __('Donor Name'); ?>:</label>
                    <?php echo h($prasang['Prasang']['donor_name']); ?>
                </td>
                <td colspan="2" width="20%">
                    <label><?php echo __('Phone No'); ?>:</label>
                    <?php echo h($prasang['Prasang']['donor_phone']); ?>
                </td>
                <td colspan="2" width="20%">
                    <label><?php echo __('Email'); ?>:</label>
                    <?php echo h($prasang['Prasang']['donor_email']); ?>
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
                    <?php echo h($prasang['Prasang']['date']); ?>
                </td>
                <td colspan="2" width="20%">
                    <label><?php echo __('Place'); ?>:</label>
                    <?php echo h($prasang['Prasang']['place']); ?>
                </td>
                <td colspan="2" width="20%">
                    <label><?php echo __('Event'); ?>:</label>
                    <?php echo h($prasang['Prasang']['event']); ?>
                </td>
            </tr>
            <tr>
                <td colspan="4" width="20%">
                    <label><?php echo __('Section'); ?>:</label>
                    <?php echo h($prasang['Section']['name']); ?>
                </td>
                <td colspan="2" width="20%">
                    <label><?php echo __('With'); ?>:</label>
                    <?php echo h($prasang['With']['name']); ?>
                </td>
                <td colspan="2" width="20%">
                    <label><?php echo __('Grade'); ?>:</label>
                    <?php echo h($prasang['Prasang']['grade']); ?>
                </td>
            </tr>
            <tr>
                <td colspan="4">
                    <label><?php echo __('Subject'); ?>:</label>
                    <?php echo h(implode(', ',$prasang['Prasang']['subjectTitles'])); ?>
                </td>
                <td colspan="4">
                    <label><?php echo __('Title'); ?>:</label>
                    <?php echo h($prasang['Prasang']['title']); ?>
                </td>
            </tr>
            <tr>
                <td colspan="6" style="vertical-align: top;">
                    <label><?php echo __('Special Note'); ?>:</label>
                    <?php echo $prasang['Prasang']['notes']; ?>
                </td>
                <td colspan="2" style="height: 100px; vertical-align: top;">
                    <label><?php echo __('Attachment List'); ?></label>
                    <ol>
                        <?php foreach ($prasang['Media'] as $media) : ?>
                        <li><?php echo $media['originalname']; ?></li>
                        <?php endforeach; ?>
                    </ol>
                </td>
            </tr>
            <tr>
                <td colspan="8" class="label-big">
                    <?php echo __('Writing Area'); ?>
                </td>
            </tr>
        </tbody>
    </table>
    <div class="page_break_after"></div>
    <?php if (count($prasang['Media']) || $prasang['Prasangrequest']['id']) : ?>
    <table cellpadding="5" cellspacing="0" style="width: 100%;">
        <tbody>
            <tr>
                <td colspan="3" class="label-big">&nbsp;</td>
                <td>&nbsp;</td>
                <td colspan="4" style="text-align: right;">
                    <h3>
                        <?php echo __('Prasang No'); ?>:
                        <?php echo h($prasang['Prasang']['id']); ?>
                    </h3>
                </td>
            </tr>
            <tr>
                <td colspan="8"><strong><?php echo __('User Content'); ?></strong></td>
            </tr>
            <tr>
                <td colspan="8"><?php echo $prasang['Prasangrequest']['content']; ?></td>
            </tr>

        </tbody>
    </table>
    <div class="row">
        <?php foreach ($prasang['Media'] as $media) : ?>
            <div class="col-xs-3">
                <img src="<?php echo $media['iconUrl']; ?>" width="100" height="100" />
                <p><?php echo $media['originalname']; ?></p>
            </div>
        <?php endforeach; ?>
    </div>
    <?php endif; ?>
    <?php $cnt++;
    // Don't add page break on last page
    if (count($prasangs) != $cnt) { ?>
    <div class="page_break_after"></div>
    <?php } ?>
    <?php endforeach; ?>
</div><!-- end containing of content -->
</body>
</html>