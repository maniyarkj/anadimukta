<div class="prasang index">
    <div class="row">
        <div class="col-md-12">
            <div class="page-header">
                <h1><?php echo __('Edit Prasang'); ?></h1>
            </div>
        </div><!-- end col md 12 -->
    </div><!-- end row -->
    <div class="row">
        <div class="col-md-12">
            <ul class="nav nav-tabs">
                <li><?php echo $this->Html->link(
                    __('Edit'),
                    array('action' => 'edit', 'controller' => 'prasangs', $prasangId),
                    array('escape' => false, 'class' => '')); 
                ?></li>
                <li class="active"><a href="#">Add Media</a></li>
            </ul>
            <br>
            <div style="margin-bottom: 10px;">
                <form action="" method="post" id="uploadform" enctype="multipart/form-data">
                    <div class="row">
                        <div class="form-group col-md-3">
                            <input type="file" name="file" id="file" />
                        </div>
                        <div class="form-group col-md-9">
                            <input class="btn btn-default" id="uploadimage" type="submit" value="Upload">
                        </div>
                    </div>
                </form>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <?php foreach ($media as $media): ?>
                    <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                        <div class="thumbnail">
                            <?php
                                echo $this->Form->postLink('<span class="glyphicon glyphicon-remove"></span>',
                                    array('action' => 'delete', $media['Media']['id'], 'prasang' => $prasangId),
                                    array('escape' => false),
                                    __('Are you sure you want to delete # %s?',
                                            $media['Media']['id']));
                            ?>
                            <a href="<?php echo $media['Media']['fileUrl']; ?>" target="_blank">
                                <img class="img-responsive" style="height: 200px; width: auto;" src="<?php echo $media['Media']['iconUrl']; ?>" alt="">
                            </a>
                            <?php echo h($media['Media']['originalname']); ?>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <p>
                <small><?php echo $this->Paginator->counter(array('format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}'))); ?></small>
            </p>

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

        </div> <!-- end col md 9 -->
    </div><!-- end row -->


</div><!-- end containing of content -->