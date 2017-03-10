<div class="xs-padding">
    <div class="container">
        <div class="heading main centered">
            <h3 class="uppercase lg-title"><?php echo __('Featured'); ?> <span class="main-color"><?php echo __('Prasangs'); ?></span></h3>
        </div>

        <div class="row">
            <?php foreach ($featuredPrasangs as $idx => $prasang) : ?>
            <div class="col-md-4 fx" data-animate="fadeInUp" data-animation-delay="<?php echo ($idx*100); ?>">
                <div class="post-item main-border bot-1-border">
                    <a href="<?php echo $prasang['Prasang']['frontViewUrl']; ?>">
                    <div class="post-image main-border bot-3-border">
                        <?php echo $this->Html->image(
                            $prasang['Prasang']['image_url'] ?: "/img/default-prasang.jpg",
                            array('class' => 'no-transform featured-p-home')
                        ); ?>
                    </div>
                    </a>

                    <article class="post-content" style="height: 210px; overflow-y: scroll;">
                        <div class="lft-tools">
                            <ul>
                                <li class="main-bg"><i class="fa fa-camera"></i></li>
                                <?php if ($prasang['Prasang']['date']) : ?>
                                <li class="meta_date">
                                    <i class="fa fa-clock-o"></i>
                                    <?php echo $this->BaseText->toDateText($prasang['Prasang']['date'], 'd M'); ?>
                                    <br> <?php echo $this->BaseText->toDateText($prasang['Prasang']['date'], 'Y'); ?></li>
                                <?php endif; ?>
                                <?php if ($prasang['Prasang']['published_date']) : ?>
                                <li class="meta_date">
                                    <i class="fa fa-clock-o"></i>
                                    <?php echo __('Published'); ?>
                                    <?php echo $this->BaseText->toDateText($prasang['Prasang']['published_date'], 'd M Y'); ?>
                                </li>
                                <?php endif; ?>
                                <?php /*<li><a href="#"><i class="fa fa-comments"></i><span>35</span></a></li>
                                <li><a href="#"><i class="fa fa-heart"></i><span>20</span></a></li> */ ?>
                            </ul>
                        </div>
                        <div class="post-item-rit">
                            <div class="post-info-container">
                                <div class="post-info">
                                    <h4><a href="<?php echo $prasang['Prasang']['frontViewUrl']; ?>">
                                        <?php echo $prasang['Prasang']['title']; ?>
                                    </a></h4>
                                    <ul class="post-meta">
                                        <?php if ($prasang['With']['name']) : ?>
                                        <li class="meta-user"><i class="fa fa-user"></i>
                                            <?php echo $prasang['With']['name']; ?>
                                        </li>
                                        <?php endif; ?>
                                        <?php if ($prasang['Prasang']['place']) : ?>
                                        <li class="meta_date"><i class="fa fa-check-circle"></i><?php echo __('at'); ?>
                                            <?php echo $prasang['Prasang']['place'];  ?>
                                        </li>
                                        <?php endif; ?>
                                    </ul>
                                </div>
                            </div>
                            <p>
                                <?php echo $this->BaseText->baseExcerpt(
                                        $prasang['Prasang']['content'],
                                        27,
                                        '...',
                                        array('byWords' => true));
                               ?>
                                <a class="more-btn main-bg" href="<?php echo $prasang['Prasang']['frontViewUrl']; ?>"><?php echo __('Read More'); ?></a></p>
                        </div>
                    </article>
                </div>
            </div>
            <?php endforeach; ?>
        </div>

    </div>
</div>