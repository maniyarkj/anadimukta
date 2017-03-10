<ul>
    <?php foreach ($withs as $with) : ?>
    <li><?php echo $this->Html->link(
        $with['With']['name'],
        array('action' => 'with', 'controller' => 'prasangs', $with['With']['id'], $with['With']['name']),
        array());
    ?><span></span></li>
    <?php endforeach; ?>
</ul>