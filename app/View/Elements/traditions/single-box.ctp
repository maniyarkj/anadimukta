<div class="col-md-4">
    <div class="team-box box-1">
        <a href="<?php echo $tradition['Tradition']['frontViewUrl']; ?>" class="team-img" style="display: block">
            <?php echo $this->Html->image($tradition['Tradition']['image_url'] ? : '/img/default-tradition.jpg'); ?>
        </a>
        <div class="team-details t-center">
            <h4 class="team-name">
                <a href="<?php echo $tradition['Tradition']['frontViewUrl']; ?>"><?php echo $tradition['Tradition']['title']; ?></a>
            </h4>
            <h5 class="uppercase main-color"></h5>
            <div class="team-socials">
                <div class="social-list tbl">
                    <a href="#" data-toggle="tooltip" data-placement="top" data-original-title="Facebook"><i class="fa fa-facebook ic-facebook"></i></a>
                    <a href="#" data-toggle="tooltip" data-placement="top" data-original-title="Twitter"><i class="fa fa-twitter ic-twitter"></i></a>
                    <a href="#" data-toggle="tooltip" data-placement="top" data-original-title="Linkedin"><i class="fa fa-linkedin ic-linkedin"></i></a>
                    <a href="#" data-toggle="tooltip" data-placement="top" data-original-title="Dribbble"><i class="fa fa-dribbble ic-dribbble"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>