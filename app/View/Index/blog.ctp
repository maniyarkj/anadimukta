<?php foreach ($prasangs as $prasang) : ?>
<?php
$prasangUrl = $this->Html->url(
    array(
        'controller' => 'prasangs',
        'action' => 'view',
        $prasang['Prasang']['id'],
        'full_base' => false,
        'admin' => false,
    ),
    array()
);
?>
<article>
    <header class="entry-header">
        <h1><a class="" href="<?php echo $prasangUrl; ?>"><?php echo $prasang['Prasang']['title']; ?></a></h1>
    </header>
    <div class="row">
        <div class="col-md-3 entry-thumb left">
            <img width="100%" src="http://kopatheme.net/demo/news-mix/wp-content/uploads/2013/08/5113427618_1c39dc1cd2_b-207x191.jpg" class="wp-post-image" alt="5113427618_1c39dc1cd2_b">
        </div>
        <div class="col-md-9 entry-content right">
            <?php echo $prasang['Prasang']['content']; ?>
            <a class="btn btn-primary readmore" href="<?php echo $prasangUrl; ?>">Read More</a>
        </div>
    </div>
</article>
<?php endforeach; ?>

<?php
$params = $this->Paginator->params();
if ($params['pageCount'] > 1) {
    ?>
    <ul class="pagination pagination-sm">
        <?php
        echo $this->Paginator->prev('&larr; Previous', array(
            'class' => 'prev',
            'tag' => 'li',
            'escape' => false), '<a onclick="return false;">&larr; Previous</a>',
                array(
            'class' => 'prev disabled',
            'tag' => 'li',
            'escape' => false));
        echo $this->Paginator->numbers(array(
            'separator' => '',
            'tag' => 'li',
            'currentClass' => 'active',
            'currentTag' => 'a'));
        echo $this->Paginator->next('Next &rarr;', array(
            'class' => 'next',
            'tag' => 'li',
            'escape' => false), '<a onclick="return false;">Next &rarr;</a>',
                array(
            'class' => 'next disabled',
            'tag' => 'li',
            'escape' => false));
        ?>
    </ul>
<?php } ?>