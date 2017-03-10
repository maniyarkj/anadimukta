<div class="post-item">
    <div class="lft-tools">
        <ul>
            <li class="main-bg"><i class="fa fa-image"></i></li>
            <li class="meta_date"><i class="fa fa-clock-o"></i>
                <?php echo $this->BaseText->toDateText($prasang['Prasang']['date'], 'd M'); ?>
                <br> <?php echo $this->BaseText->toDateText($prasang['Prasang']['date'], 'Y'); ?></li>
            <?php /* <li><a href="#"><i class="fa fa-comments"></i><span>35</span></a></li>
            <li><a href="#"><i class="fa fa-heart"></i><span>20</span></a></li> */ ?>
        </ul>
    </div>

    <article class="post-content">
        <div class="post-image main-border bot-4-border">
            <a href="<?php echo $prasang['Prasang']['frontViewUrl']; ?>">
                <?php echo $this->Html->image(
                    $prasang['Prasang']['image_url'] ?: "/img/default-prasang.jpg",
                    array()
                ); ?>
            </a>
        </div>
        <div class="post-item-rit">
            <div class="post-info-container">
                <div class="post-info">
                    <h4><a href="<?php echo $prasang['Prasang']['frontViewUrl']; ?>"><?php echo $prasang['Prasang']['title']; ?></a></h4>
                    <ul class="post-meta">
                        <li class="meta-user"><i class="fa fa-user"></i><?php echo __('with') ?>: <a href="#"><?php echo $prasang['With']['name']; ?></a></li>
                        <li class="meta_date"><i class="fa fa-clock-o"></i><?php echo $prasang['Prasang']['date']; ?></li>
                        <li><i class="fa fa-folder-open"></i><?php echo __('Subject'); ?>: <?php echo implode(', ', $prasang['Prasang']['subjectTitles']); ?></a></li>
                    </ul>
                </div>
            </div>
            <?php echo $this->BaseText->baseExcerpt($prasang['Prasang']['content'], 300, '...'); ?>
        </div>
    </article>
</div>

<div class="xs-padding">
    <hr class="divider dev-style3">
</div>