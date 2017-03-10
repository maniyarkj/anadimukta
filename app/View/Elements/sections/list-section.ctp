<ul>
    <?php foreach ($sections as $section) : ?>
    <li><?php echo $this->Html->link(
        $section['Section']['name'],
        array(
            'action' => 'section', 
            'controller' => 'prasangs', 
            $section['Section']['id'], 
            $section['Section']['name']),
        array());
    ?><span></span></li>
    <?php endforeach; ?>
</ul>