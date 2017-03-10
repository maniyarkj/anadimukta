<div class="col-md-3 xs-padding sidebar">
    <div class="sidebar-widgets">
        <ul>
            <li class="widget w-recent-posts">
                <h4 class="widget-title"><span class="main-color"><?php echo __('Recent'); ?> </span><?php echo __('Prasangs'); ?></h4>
                <div class="widget-content">
                    <?php echo $this->element('prasangs/list-latest-prasang', array('prasangs' => $latestPrasangs)); ?>
                </div>
            </li>

            <li class="widget widget-categories">
                <h4 class="widget-title"><span class="main-color"><?php echo __('Featured'); ?></span> <?php echo __('Category'); ?></h4>
                <div class="widget-content">
                    <?php echo $this->element('subjects/mostviewed', array('subjects' => $featuredSubjects)); ?>
                </div>
            </li>

            <?php /* <li class="widget widget-categories">
                <h4 class="widget-title"><span class="main-color"><?php echo __('Prasang'); ?></span> <?php echo __('With'); ?></h4>
                <div class="widget-content">
                    <?php echo $this->element('withs/list-with', array('withs' => $withs)); ?>
                </div>
            </li> */ ?>

            <li class="widget widget-categories">
                <h4 class="widget-title"><span class="main-color"><?php echo __('Prasang'); ?></span> <?php echo __('Section'); ?></h4>
                <div class="widget-content">
                    <?php echo $this->element('sections/list-section', array('sections' => $sections)); ?>
                </div>
            </li>

            <?php /* <li class="widget widget-tags">
                <h4 class="widget-title"><span class="main-color">Tags</span> Cloud</h4>
                <div class="widget-content">
                    <?php echo $this->element('subjects/tagcloud', array('subjects' => $featuredSubjects)); ?>
                </div>
            </li> */ ?>

        </ul>
    </div>

</div>