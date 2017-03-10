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
App::uses('TextHelper', 'View/Helper');

/**
 * Application helper
 *
 * Add your application-wide methods in the class below, your helpers
 * will inherit them.
 *
 * @package       app.View.Helper
 */
class BaseTextHelper extends TextHelper
{
    /**
     * Convert date to string in specific format
     *
     * @param string $sqlFormatDate
     * @param string $format
     * @return string
     */
    public function toDateText($sqlFormatDate, $format = 'd/m/Y')
    {
        return $this->toDateTimeText($sqlFormatDate, $format);
    }

    /**
     * Convert date to string in specific format
     *
     * @param string $sqlFormatDate
     * @param string $format
     * @return string
     */
    public function toDateTimeText($sqlFormatDate, $format = 'd/m/Y H:i:s')
    {
        return date($format, strtotime($sqlFormatDate));
    }

    /**
     * get short text with striping tags
     * @param type $content
     * @param type $length
     * @return type
     */
    public function baseExcerpt($content, $length = 100, $endWith = '', $options = array())
    {
        if (!$content) {
            return '';
        }
        $options += array('byWords' => false);

        // strip tags to avoid breaking any html
        $content = strip_tags($content);
        if (!$options['byWords']) {
            if (strlen($content) > $length) {
                // truncate string
                $stringCut = substr($content, 0, $length);
                // make sure it ends in a word so assassinate doesn't become ass...
                return substr($stringCut, 0, strrpos($stringCut, ' ')) . $endWith;
            }
        }
        else {
            $arrContent = explode(' ', $content);
            if (count($arrContent) > $length) {
                $arrContent = array_chunk($arrContent, $length);
            }

            if (is_array($arrContent[0])) {
                $content = implode(' ', $arrContent[0]) . $endWith;
            }
        }
        return $content;

    }

    /**
     * Change last word of text to theme color
     *
     * @param string $string
     * @return string
     */
    public function colored($string)
    {
        $strArr = explode(' ', $string);
        if (count($strArr) > 1) {
            $strArr[count($strArr) - 1] = '<span class="main-color">' . $strArr[count($strArr) - 1] . '</span>';
        }

        return implode(' ', $strArr);
    }
}