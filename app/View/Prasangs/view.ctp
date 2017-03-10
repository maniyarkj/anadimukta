<div class="pageContent">

    <?php /*<div class="page-title">
        <div class="container">
            <h1><?php echo $prasang['Prasang']['title']; ?></h1>
            <h3><?php echo implode(', ', $prasang['Prasang']['subjectTitles']); ?></h3>
        </div>
    </div>*/ ?>
    <div class="breadcrumbs">
        <div class="container">
            <?php echo $this->Html->link(
                __('Home'),
                array('action' => 'index', 'controller' => 'index'),
                array());
            ?><i class="fa fa-long-arrow-right main-color"></i><?php echo $this->Html->link(
                __('All Prasangs'),
                array('action' => 'index', 'controller' => 'prasangs'),
                array());
            ?><i class="fa fa-long-arrow-right main-color"></i><span><?php echo $prasang['Prasang']['title']; ?></span>
        </div>
    </div>

    <div class="container">
        <div class="row row-eq-height">
            <div class="col-md-9 xs-padding main-content">

                <div class="blog-single">

                    <div class="post-item">

                        <div class="details-img">
                            <?php echo $this->Html->image(
                                $prasang['Prasang']['image_url'] ?: "/img/default-prasang.jpg",
                                array()
                            ); ?>
                        </div>

                        <article class="post-content">

                            <div class="post-info-container">
                                <div class="post-info">
                                    <h2><?php echo $prasang['Prasang']['title']; ?></h2>
                                    <ul class="post-meta">
                                        <?php if ($prasang['With']['name']) : ?>
                                        <li class="meta-user">
                                            <i class="fa fa-user"></i>
                                            <a href="#"><?php echo $prasang['With']['name']; ?></a>
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
                                        <?php if ($prasang['Prasang']['subjectTitles']) : ?>
                                        <li>
                                            <i class="fa fa-folder-open"></i>
                                            <?php echo __('Subject'); ?>:
                                            <?php echo implode(', ', $prasang['Prasang']['subjectTitles']); ?>
                                        </li>
                                        <?php endif; ?>
                                    </ul>
                                </div>
                            </div>

                            <?php echo $prasang['Prasang']['content']; ?>

                            <div class="post-tools">
                                <?php /*<div class="post-tags">
                                    <i class="fa fa-tags"></i><span class="main-color"><strong>Tags: </strong> </span>
                                    <a href="#">Responsive</a>,
                                    <a href="#"> Business</a>,
                                    <a href="#"> HTML</a>,
                                    <a href="#"> Design</a>,
                                    <a href="#"> WordPress</a>
                                </div> */ ?>

                                <?php echo $this->element('prasangs/share', compact(array('prasang'))); ?>

                                <?php /*<nav class="nav-single over-hidden">
                                    <span class="nav-previous f-left"><a href="#" rel="prev"><span class="meta-nav">← Previous post</span><span class="nav-block main-color">Twitter Embeds Post Type</span></a></span>
                                    <span class="nav-next f-right"><a href="#" rel="next"><span class="meta-nav">Next post →</span><span class="nav-block main-color">Your children surprise here</span></a></span>
                                </nav>

                                <div class="author-info gry-bg p-a-3">
                                    <div class="author-avatar">
                                        <img alt="" src="assets/images/testimonials/2.jpg" class="avatar">
                                    </div>
                                    <h5 class="author-name"><a href="#" rel="author">Robert Morrison</a></h5>
                                    <div class="author-description">
                                        I'm a web developer, designer, and Team Leader with over 12 years of experience. also the founder of IT-RAYS Company.
                                    </div>
                                </div> */ ?>
                            </div>

                        </article>
                    </div><!-- .post-item end -->

                </div>

            </div>

            <?php echo $this->requestAction(
                    array('controller' => 'prasangs', 'action' => 'sidebar'),
                    array('return')
            ); ?>
        </div>
    </div>

</div>