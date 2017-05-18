<?php
/**
 * Helper Abbreviator
 * @author: Daud Simbolon <daud.simbolon@gmail.com>
 *
 */


if(!function_exists('convertNumberAbbreviator')) {

    /**
     * @param $number
     * @return string
     */
    function convertNumberAbbreviator($number)
    {
        $number = floatval($number);
        $config = [12 => "T", 9 => "B", 6 => "M", 3 => "K", 0 => ""];

        foreach($config as $key => $suffix) {
            if($number >= pow(10, $key)) {
                return intval($number / pow(10, $key)) . $suffix;
            }
        }
    }
}