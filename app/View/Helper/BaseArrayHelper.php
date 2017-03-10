<?php

App::uses('FormHelper', 'View/Helper');

/**
 * Application helper
 *
 * Add your application-wide methods in the class below, your helpers
 * will inherit them.
 *
 * @package       app.View.Helper
 */
class BaseArrayHelper extends FormHelper
{
    public function getTranslationTextFromResultRow(
            array $row,
            $translationField,
            $locale)
    {
        if (is_array($row[$translationField])) {
            foreach ($row[$translationField] as $translatedData) {
                if ($translatedData['locale'] == $locale) {
                    return $translatedData['content'];
                }
            }
        }

        return '';
    }
}
