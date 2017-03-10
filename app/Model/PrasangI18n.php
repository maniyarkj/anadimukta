<?php

App::uses('AppModel', 'Model');

/**
 * Prasang Translate Model
 *
 */
class PrasangI18n extends AppModel
{
    public $displayField = 'field'; // important

    public $useTable = 'i18n_prasangs';
}