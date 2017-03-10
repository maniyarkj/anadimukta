<div class="blog-posts small-image">

    <div class="post-item">
        <article class="post-content" style="width: 100%">
            <div class="post-image main-border bot-4-border">
                <a href="<?php echo $prasang['Prasang']['frontViewUrl']; ?>">
                    <?php echo $this->Html->image(
                        $prasang['Prasang']['image_url'] ?: "/img/default-prasang.jpg",
                        array('style' => 'width:287px; height:172px;' , 'class' => 'no-transform')
                    ); ?>
                </a>
            </div>
            <div class="post-item-rit" style="padding-bottom: 5px; float: left; max-width: 62%;">
                <div class="post-info-container">
                    <div class="post-info">
                        <h4><a href="<?php echo $prasang['Prasang']['frontViewUrl']; ?>"><?php echo $prasang['Prasang']['title']; ?></a></h4>
                        <ul class="post-meta">
                            <li class="meta-user">
                                <i class="fa fa-user"></i>
                                <?php /*echo $this->Html->link(
                                    $prasang['With']['name'],
                                    array('action' => 'with', 'controller' => 'prasangs', $prasang['With']['id'], $prasang['With']['name']),
                                    array());*/
                                echo $prasang['With']['name'];
                                ?>
                            </li>
                            <?php if ($prasang['Prasang']['subjectTitles']) : ?>
                            <li>
                                <i class="fa fa-folder-open"></i>
                                <?php echo __('Subject'); ?>:
                                <?php
                                // TODO: Add link on subject
                                echo implode(', ', $prasang['Prasang']['subjectTitles']); ?>
                            </li>
                            <?php endif; ?>
                            <?php if ($prasang['Prasang']['date']) : ?>
                            <li class="meta_date">
                                <i class="fa fa-clock-o"></i>
                                <?php echo $this->BaseText->toDateText($prasang['Prasang']['date'], 'd M Y'); ?>
                            </li>
                            <?php endif; ?>
                            <?php if ($prasang['Prasang']['published_date']) : ?>
                            <li class="meta_date">
                                <i class="fa fa-clock-o"></i>
                                <?php echo __('Published'); ?> :
                                <?php echo $this->BaseText->toDateText($prasang['Prasang']['published_date'], 'd M Y'); ?>
                            </li>
                            <?php endif; ?>
                            <?php /* <li><a href="#"><i class="fa fa-comments"></i><span>35</span></a></li>
                            <li><a href="#"><i class="fa fa-heart"></i><span>20</span></a></li> */ ?>
                        </ul>
                    </div>
                </div>
                <?php
                echo $this->BaseText->baseExcerpt($prasang['Prasang']['content'], 27, '...', array('byWords' => true)); ?>
                <div class="readmore" style="text-align: right; font-weight: normal; font-size: 12px;"><?php
                    echo $this->Html->link(
                        __('Read more »'),
                        $prasang['Prasang']['frontViewUrl'],
                        array()
                    );
                ?></div>
            </div>
        </article>
    </div>
</div>
<hr class="divider dev-style2" style="margin-top: 0px;">