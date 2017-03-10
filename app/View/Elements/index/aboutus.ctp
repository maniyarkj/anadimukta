<div class="row">
    <div class="col-md-5 hidden-md"></div>
    <div class="col-md-6 mn-cell md-pd-40">
        <div class="heading style3">
            <h4 class="uppercase"><?php echo __('About'); ?> <span class="main-color uppercase"><?php echo __('Anadimukta'); ?></span></h4>
        </div>
        <a href="<?php echo $aboutUsPage['Page']['frontViewUrl']; ?>">
            <?php echo $this->Html->image(
                $aboutUsPage['Page']['image_url'] ?: "/img/default-prasang.jpg",
                array()
            ); ?>
        </a>
        <p>&nbsp;</p>
        <p class="text-justify">
        <?php
        echo $this->BaseText->baseExcerpt($aboutUsPage['Page']['content'], 100, '...&nbsp;', array('byWords' => true));
        ?>
        <div class="readmore" style="text-align: right; font-weight: normal; font-size: 12px;"><?php
            echo $this->Html->link(
                __('Read more »'),
                $aboutUsPage['Page']['frontViewUrl'],
                array()
            );
        ?></div>
        </p>
    </div>
    <div class="col-md-1"></div>
</div>