<?php
echo $this->BaseForm->create('Subject', array('role' => 'form', 'class' => 'form-simple'));
echo $this->BaseForm->input('title', array(
    'class' => 'form-control',
    'label' => 'Title',
    'hasLanguages' => true,
    'addFormGroupDiv' => true,
));

echo $this->BaseForm->input('type',
        array('class' => 'form-control', 'type' => 'hidden', 'value' => $type));

echo $this->BaseForm->input('main_id',
        array('class' => 'form-control', 'type' => 'hidden', 'value' => $main_id));
echo $this->BaseForm->input('secondary_id',
        array('class' => 'form-control', 'type' => 'hidden', 'value' => $secondary_id));
echo $this->BaseForm->submit(__('Submit'), array('class' => 'btn btn-default'));

echo $this->BaseForm->end();