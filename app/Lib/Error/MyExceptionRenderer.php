<?php

App::uses('ExceptionRenderer', 'Error');

class MyExceptionRenderer extends ExceptionRenderer
{

    protected function _outputMessage($template)
    {
        $this->controller->layout = 'bookra';
        parent::_outputMessage($template);
    }

}
