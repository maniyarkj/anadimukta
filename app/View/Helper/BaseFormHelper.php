<?php

/**
 * Application level View Helper
 *
 * This file is application-wide helper file. You can put all
 * application-wide helper-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Helper
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
App::uses('FormHelper', 'View/Helper');

/**
 * Application helper
 *
 * Add your application-wide methods in the class below, your helpers
 * will inherit them.
 *
 * @package       app.View.Helper
 */
class BaseFormHelper extends FormHelper
{

    /**
     * Generates a form input element complete with label and wrapper div
     *
     * ### Options
     *
     * See each field type method for more information. Any options that are part of
     * $attributes or $options for the different **type** methods can be included in `$options` for input().i
     * Additionally, any unknown keys that are not in the list below, or part of the selected type's options
     * will be treated as a regular html attribute for the generated input.
     *
     * - `type` - Force the type of widget you want. e.g. `type => 'select'`
     * - `label` - Either a string label, or an array of options for the label. See FormHelper::label().
     * - `div` - Either `false` to disable the div, or an array of options for the div.
     * 	See HtmlHelper::div() for more options.
     * - `options` - For widgets that take options e.g. radio, select.
     * - `error` - Control the error message that is produced. Set to `false` to disable any kind of error reporting (field
     *    error and error messages).
     * - `errorMessage` - Boolean to control rendering error messages (field error will still occur).
     * - `empty` - String or boolean to enable empty select box options.
     * - `before` - Content to place before the label + input.
     * - `after` - Content to place after the label + input.
     * - `between` - Content to place between the label + input.
     * - `format` - Format template for element order. Any element that is not in the array, will not be in the output.
     * 	- Default input format order: array('before', 'label', 'between', 'input', 'after', 'error')
     * 	- Default checkbox format order: array('before', 'input', 'between', 'label', 'after', 'error')
     * 	- Hidden input will not be formatted
     * 	- Radio buttons cannot have the order of input and label elements controlled with these settings.
     *
     * @param string $fieldName This should be "Modelname.fieldname"
     * @param array $options Each type of input takes different options.
     * @return string Completed form widget.
     * @link http://book.cakephp.org/2.0/en/core-libraries/helpers/form.html#creating-form-elements
     */
    public function input($fieldName, $options = array())
    {
        $options += array(
            'addFormGroupDiv' => false,
            'hasLanguages' => false,
            'helpText' => '',
        );
        if ($options['addFormGroupDiv']) {
            $options['before'] = '<div class="form-group">';
            $options['after'] = '</div>';
            if ($options['helpText']) {
                $options['after'] = sprintf(
                    '<span class="help-block">%s</span>',
                    $options['helpText']
                ) . $options['after'];
            }

            unset($options['addFormGroupDiv']);
        }

        // Current language settings is only working for text field
        // Traslation alias must be in format of <fieldname>Translation to make the setting value work
        if ($options['hasLanguages']) {
            $values = $this->_getLanguageFieldValues($fieldName);
            $element = '';
            $availableLanguages = Configure::read('Config.availableLanguages');
            unset($options['hasLanguages']);
            foreach ($availableLanguages as $langCode => $lang) {
                $langFieldName = $this->model() . '.' . $fieldName . '.' . $langCode;
                $overideOptions = array('label' => $options['label'] . ' (' . $lang . ')');
                if ($values[$langCode]) {
                    $options['value'] = $values[$langCode];
                }
                $element .= parent::input($langFieldName, $overideOptions + $options);
            }

            return $element;
        }

        return parent::input($fieldName, $options);
    }

    private function _getLanguageFieldValues($fieldName)
    {
        $values = array();
        foreach (Configure::read('Config.availableLanguages') as $langCode => $lang) {
            $values[$langCode] = '';
        }

        if (!isset($this->request->data)
                || !is_array($this->request->data)
                || !isset($this->request->data[$fieldName.'Translation'])) {
            return $values;
        }

        foreach ($this->request->data[$fieldName.'Translation'] as $translation) {
            $values[$translation['locale']] = $translation['content'];
        }

        return $values;
    }
}
