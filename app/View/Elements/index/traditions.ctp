<div class="sm-padding" style="padding-bottom: 10px;">
    <div class="container">
        <div class="heading main centered">
            <h3 class="uppercase lg-title"><?php echo __('Spiritual'); ?> <span class="main-color"><?php echo __('Succession'); ?></span></h3>
            <p><?php echo __('Meet our Spiritual Guides'); ?></p>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <div class="team-box box-1" style="margin-bottom: 15px;">
                    <a href="<?php echo $mainTradition['Tradition']['frontViewUrl']; ?>" class="team-img" style="display: block; margin-bottom: 5px;">
                        <?php echo $this->Html->image($mainTradition['Tradition']['image_url'] ? : '/img/default-tradition.jpg'); ?>
                    </a>
                    <div class="team-details t-center">
                        <h4 class="team-name">
                            <a href="<?php echo $mainTradition['Tradition']['frontViewUrl']; ?>"><?php echo $mainTradition['Tradition']['title']; ?></a>
                        </h4>
                        <?php /*<h5 class="uppercase main-color"></h5>
                        <div class="team-socials">
                            <div class="social-list tbl">
                                <a href="#" data-toggle="tooltip" data-placement="top" data-original-title="Facebook"><i class="fa fa-facebook ic-facebook"></i></a>
                                <a href="#" data-toggle="tooltip" data-placement="top" data-original-title="Twitter"><i class="fa fa-twitter ic-twitter"></i></a>
                                <a href="#" data-toggle="tooltip" data-placement="top" data-original-title="Linkedin"><i class="fa fa-linkedin ic-linkedin"></i></a>
                                <a href="#" data-toggle="tooltip" data-placement="top" data-original-title="Dribbble"><i class="fa fa-dribbble ic-dribbble"></i></a>
                            </div>
                        </div> */ ?>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="row">
            <?php foreach ($traditions as $idx => $tradition): ?>
            <div class="col-md-3">
                <div class="team-box box-1" style="margin-bottom: 27px;">
                    <a href="<?php echo $tradition['Tradition']['frontViewUrl']; ?>" class="team-img" style="display: block; margin-bottom: 5px;">
                        <?php echo $this->Html->image($tradition['Tradition']['image_url'] ? : '/img/default-tradition.jpg'); ?>
                    </a>
                    <div class="team-details t-center">
                        <h4 class="team-name" style="font-size: 12px; max-height: 18px; overflow-y: hidden">
                            <a href="<?php echo $tradition['Tradition']['frontViewUrl']; ?>"><?php echo $tradition['Tradition']['title']; ?></a>
                        </h4>
                        <?php /*<h5 class="uppercase main-color"></h5>
                        <div class="team-socials">
                            <div class="social-list tbl">
                                <a href="#" data-toggle="tooltip" data-placement="top" data-original-title="Facebook"><i class="fa fa-facebook ic-facebook"></i></a>
                                <a href="#" data-toggle="tooltip" data-placement="top" data-original-title="Twitter"><i class="fa fa-twitter ic-twitter"></i></a>
                                <a href="#" data-toggle="tooltip" data-placement="top" data-original-title="Linkedin"><i class="fa fa-linkedin ic-linkedin"></i></a>
                                <a href="#" data-toggle="tooltip" data-placement="top" data-original-title="Dribbble"><i class="fa fa-dribbble ic-dribbble"></i></a>
                            </div>
                        </div> */ ?>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div></div>
        </div>

    </div>
</div>