<?php

/**
 * Debug function and break
 */
function srd()
{
    $args = func_get_args();
    echo "<pre>";
    foreach ($args as $arg) {
        print_r($arg);
    }
    $debug = debug_backtrace();
    echo "</pre>";
    $text = '';
    foreach ($debug as $d) {
        if (isset($d['file'])) {
            $text = $d['file'] . '--' . $d['line'];
            break;
        }
    }
    echo $text;
    exit;
}

/**
 * Debug function
 */
function sr()
{
    $args = func_get_args();
    echo "<pre>";
    foreach ($args as $arg) {
        print_r($arg);
    }
    echo "</pre>";
    $debug = debug_backtrace();
    $text = '';
    foreach ($debug as $d) {
        if (isset($d['file'])) {
            $text = $d['file'] . '--' . $d['line'];
            break;
        }
    }
    echo $text;
}

function array_filter_recursive($input)
{
    foreach ($input as &$value) {
        if (is_array($value)) {
            $value = array_filter_recursive($value);
        }
    }

    return array_filter($input);
}

function get_value(&$var, $default = null)
{
    if (isset($var)) {
        return $var;
    }
    if (!is_null($default)) {
        return $default;
    }
    return null;
}

function randomPassword()
{
    $alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
    for ($i = 0; $i < 8; $i++) {
        $n = rand(0, strlen($alphabet)-1);
        $pass[$i] = $alphabet[$n];
    }
    return implode('', $pass);
}
