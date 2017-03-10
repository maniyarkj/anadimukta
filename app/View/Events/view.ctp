<div class="pageContent">

    <div class="xl-padding parallax portfolio single-pro-img" style="background-image: url(/img/default-event-banner.jpg);" data-stellar-background-ratio="0.65" data-overlay="rgba(0,0,0,.7)">
        <div class="container">
            <div class="row">
                <div class="t-center margin-top-100">
                    <h1 class="white font-50"><?php echo $event['Event']['title']; ?></h1>
                    <p class="white font-15"><?php echo $event['Event']['place']; ?></p>
                </div>
            </div>
        </div>
    </div>

    <div class="md-padding">
        <div class="container">
            <div class="row row-eq-height">
                <div class="col-md-4">
                    <div class="heading style3">
                        <h3 class="uppercase"><i class="fa fa-info-circle"></i><span class="main-color"><?php echo __('More'); ?> </span><?php echo __('Info'); ?></h3>
                    </div>
                    <ul class="list lg-v-pad">
                        <li>
                            <i class="fa fa-map-marker"></i>
                            <span class="bold main-color"><?php echo __('Place'); ?>:</span>
                            <?php echo $event['Event']['place']; ?>
                        </li>
                        <li>
                            <i class="fa fa-calendar"></i>
                            <span class="bold main-color"><?php echo __('Starts') ?>:</span>
                            <?php echo $event['Event']['startdate']; ?>
                            <?php echo $event['Event']['starttime']; ?>
                        </li>
                        <li>
                            <i class="fa fa-calendar"></i>
                            <span class="bold main-color"><?php echo __('Ends'); ?>:</span>
                            <?php echo $event['Event']['enddate']; ?>
                            <?php echo $event['Event']['endtime']; ?>
                        </li>

                        <li class="social-list">
                            <span class="f-left m-r-1" style="margin-top: 5px"><i class="fa fa-share-alt"></i> <span class="bold main-color"><?php echo __('Share'); ?> :</span> </span>
                            <a href="#" data-toggle="tooltip" data-placement="top" data-original-title="Facebook"><i class="fa fa-facebook ic-facebook sm-icon no-border"></i></a>
                            <a href="#" data-toggle="tooltip" data-placement="top" data-original-title="Twitter"><i class="fa fa-twitter ic-twitter sm-icon no-border"></i></a>
                            <a href="#" data-toggle="tooltip" data-placement="top" data-original-title="Linkedin"><i class="fa fa-linkedin ic-linkedin sm-icon no-border"></i></a>
                            <a href="#" data-toggle="tooltip" data-placement="top" data-original-title="Dribbble"><i class="fa fa-dribbble ic-dribbble sm-icon no-border"></i></a>
                            <a href="#" data-toggle="tooltip" data-placement="top" data-original-title="Google Plus"><i class="fa fa-google-plus ic-gplus sm-icon no-border"></i></a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-1">
                    <div class="vertical-sep"></div>
                </div>
                <div class="col-md-7">
                    <?php /* <div class="heading style3">
                        <h3 class="uppercase"><i class="fa fa-map-marker"></i><?php echo $event['Event']['title']; ?></h3>
                    </div> */ ?>
                    <?php echo $event['Event']['details']; ?>
                </div>
            </div>
        </div>
    </div>

    <div class="md-padding gry-bg">
        <div class="container">
            <div class="heading style3">
                <h3 class="uppercase"><i class="fa fa-desktop"></i><span class="main-color"><?php echo __('Other'); ?> </span><?php echo __('Videos'); ?></h3>
            </div>
            <div class="portfolio p-5-cols grid p-style3 no-margin" id="grid" style="margin: 0 auto; width: <?php echo $width; ?>%;">
                <?php foreach ($otherEvents as $event) : ?>
                <div class="portfolio-item design">
                    <?php echo $this->element('events/single-box', array('event' => $event)); ?>
                </div>
                <?php endforeach; ?>
            </div>
            <?php /* <div class="row">
                <div class="portfolio p-style5">
                    <?php foreach ($otherEvents as $event) : ?>
                    <div class="portfolio-item col-md-3">
                        <?php echo $this->element('events/single-box', array('event' => $event)); ?>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div> */ ?>

        </div>
    </div>
</div>