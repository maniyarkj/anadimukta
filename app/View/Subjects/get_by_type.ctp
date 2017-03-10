<?php
$subjectInput = explode("\n", $this->Form->input('subjects', array('value' => $value)));
array_shift($subjectInput);
array_pop($subjectInput);
echo implode("\n", $subjectInput);
