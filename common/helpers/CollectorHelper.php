<?php
/**
 * Created by PhpStorm.
 */

namespace common\helpers;

class CollectorHelper
{
    /**
     * @param $number
     * @return string
     */
    public static function numFormat($number): string
    {
        return number_format($number, 0, '', ' ');
    }

    /**
     * @param $phone
     *
     * @return string|string[]|null
     *
     * Очистить номер от символов
     */
    public static function clearPhone($phone)
    {
        return preg_replace("/[^0-9]/", '', $phone);
    }

    /**
     * @param $phone
     *
     * @return string|string[]|null
     */
    public static function formatPhone($phone)
    {
        return preg_replace("/(\\d{1})(\\d{3}|\\d{4})(\\d{3}|\\d{4})(\\d{2})(\\d{2})$/i", "+$1 ($2) $3 $4 $5 $6", $phone);
    }

    /**
     * @param $phone
     *
     * @return string
     */
    public static function showPhone($phone)
    {
        return ltrim($phone, '7');
    }
}
