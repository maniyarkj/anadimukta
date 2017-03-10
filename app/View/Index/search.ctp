<div class="pageContent">

    <?php /* <div class="page-title">
        <div class="container">
            <h1>Blog Right Sidebar</h1>
            <h3>This is sub heading text to describe the page functionality</h3>
        </div>
    </div> */ ?>
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
            ?><i class="fa fa-long-arrow-right main-color"></i>
            <span><?php echo filter_input(INPUT_GET, 'q', FILTER_SANITIZE_SPECIAL_CHARS); ?></span>
        </div>
    </div>

    <div class="container">
        <div class="row row-eq-height">
            <div class="col-md-9 xs-padding main-content">
                <form action="/index/search" method="get" class="form-inline">
                    <div class="form-group">
                        <label for="q">Search</label>
                        <input type="text" class="form-control" name="q" placeholder="Type And Hit Enter..." value="<?php echo filter_input(INPUT_GET, 'q', FILTER_SANITIZE_SPECIAL_CHARS); ?>" />
                    </div>
                    <button type="submit" class="btn btn-primary">Search</button>
                </form>
                <br>
                <?php /* <div class="blog-posts lg-image"> */ ?>
                <div class="blog-posts small-image">
                    <?php if (!count($prasangs)) : ?>
                    <?php echo $this->element('errors/norecords'); ?>
                    <?php endif; ?>
                    <?php foreach ($prasangs as $prasang) : ?>
                        <?php echo $this->element('prasangs/single-sm', array('prasang' => $prasang)); ?>
                    <?php endforeach; ?>

                </div>
                <div class="pager">
                    <?php
                    $params = $this->Paginator->params();
                    if ($params['pageCount'] > 1) {
                    ?>
                    <ul class="pagination pagination-sm">
                        <?php
                        echo $this->Paginator->prev('&larr; Previous',
                                array('class' => 'prev', 'tag' => 'li', 'escape' => false),
                                '<a onclick="return false;">&larr; Previous</a>',
                                array('class' => 'prev disabled', 'tag' => 'li', 'escape' => false));
                        echo $this->Paginator->numbers(array('separator' => '', 'tag' => 'li', 'currentClass' => 'active',
                            'currentTag' => 'a'));
                        echo $this->Paginator->next('Next &rarr;',
                                array('class' => 'next', 'tag' => 'li', 'escape' => false),
                                '<a onclick="return false;">Next &rarr;</a>',
                                array('class' => 'next disabled', 'tag' => 'li', 'escape' => false));
                        ?>
                    </ul>
                    <?php } ?>
                </div>

            </div>

            <?php echo $this->requestAction(
                    array('controller' => 'prasangs', 'action' => 'sidebar'),
                    array('return')
            ); ?>
        </div>
    </div>

</div>