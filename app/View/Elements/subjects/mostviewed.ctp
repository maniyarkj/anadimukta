<ul>
    <?php foreach ($subjects as $subject) : ?>
    <li><?php echo $this->Html->link(
        $subject['Subject']['title'],
        array('action' => 'subject', 'controller' => 'prasangs', $subject['Subject']['id'], $subject['Subject']['title']),
        array());
    ?><span></span></li>
    <?php endforeach; ?>
</ul>