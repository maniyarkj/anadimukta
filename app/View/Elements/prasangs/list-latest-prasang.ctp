<ul>
    <?php foreach ($prasangs as $prasang) : ?>
    <li>
        <div class="post-img" style="min-height: 55px;">
            <a href="<?php echo $prasang['Prasang']['frontViewUrl']; ?>"><?php
            echo $this->Html->image($prasang['Prasang']['image_url']? : '/img/default-prasang.jpg', array(
                'alt' => '',
            ));
            ?></a>
        </div>
        <div class="widget-post-info">
            <h5 style="margin-bottom: 1px;"><?php echo $this->Html->link(
                $prasang['Prasang']['title'],
                array('action' => 'view', 'controller' => 'prasangs', $prasang['Prasang']['id']),
                array()); ?></h5>
            <div class="meta">
                <?php if ($prasang['Prasang']['date']) : ?>
                <span>
                    <i class="fa fa-clock-o"></i><?php echo $prasang['Prasang']['date']; ?>
                </span>
                <?php endif; ?>
                <?php if ($prasang['Prasang']['subjectTitles']) : ?>
                <i class="fa fa-tag"></i><?php echo implode(', ', $prasang['Prasang']['subjectTitles']); ?>
                <?php endif; ?>
            </div>
        </div>
    </li>
    <?php endforeach; ?>
</ul>