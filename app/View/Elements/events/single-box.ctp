<figure>
    <?php echo $this->Html->image(
            $event['Event']['image_url'] ?: '/img/default-event.jpg',
            array()
    ); ?>
    <figcaption>
        <div class="port-captions">
            <h4><a href="<?php echo $event['Event']['frontViewUrl']; ?>"><?php echo $event['Event']['title']; ?></a></h4>
            <?php //<p class="description"><a href="#">Design</a>, <a href="#">Development</a></p> ?>
        </div>
        <div class="icon-links">
            <a href="<?php echo $event['Event']['frontViewUrl']; ?>" class="link"><i class="fa fa-link"></i></a>
            <a href="<?php echo $event['Event']['image_url']; ?>" class="zoom" title="<?php echo $event['Event']['title']; ?>"><i class="fa fa-search-plus"></i></a>
        </div>
    </figcaption>
</figure>