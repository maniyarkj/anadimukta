<div class="sm-padding pattern-2 p-b-0">
    <div class="container">
        <div class="heading main centered">
            <h3 class="uppercase lg-title"><?php echo __('Devine'); ?> <span class="main-color"><?php echo __('Satpurush Videos'); ?></span></h3>
            <p><?php echo __('Blessings from Bapji and Swamishree'); ?></p>
        </div>
    </div>

    <div class="container">
        <?php
        $fCount = count($featuredEvents);
        if ($fCount > 5) {
            $fCount = 5;
        }
        $width = ($fCount * 100) / 5;
        ?>
        <div class="portfolio p-<?php echo $fCount; ?>-cols grid p-style3 no-margin" id="grid" style="margin: 0 auto; width: <?php echo $width; ?>%;">
            <?php foreach ($featuredEvents as $event) : ?>
            <div class="portfolio-item design">
                <?php echo $this->element('events/single-box', array('event' => $event)); ?>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>