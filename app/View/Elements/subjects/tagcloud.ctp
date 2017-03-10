<ul class="tags">
    <?php foreach ($subjects as $subject) : ?>
    <li><?php echo $this->Html->link(
        $subject['Subject']['title'],
        array('action' => 'subject', 'controller' => 'prasangs', $subject['Subject']['title']),
        array());
    ?></li>
    <?php endforeach; ?>
</ul>