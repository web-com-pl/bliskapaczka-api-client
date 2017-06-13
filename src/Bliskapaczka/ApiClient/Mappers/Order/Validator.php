<?php

namespace Bliskapaczka\ApiClient\Mappers\Order;

/**
 * Order Mapper class
 *
 * @author  Mateusz Koszutowski (mkoszutowski@divante.pl)
 * @version 0.1.0
 */
class Validator
{
    const PHONE_NUMBER_PATTERN = '/^(5[0137]|6[069]|7[2389]|88)\d{7}$/';

    /**
     * Validate email address
     *
     * @param array $data
     */
    public static function email($data)
    {
        if (filter_var($data, FILTER_VALIDATE_EMAIL) == false) {
            throw new \Bliskapaczka\ApiClient\Exception('Invalid email', 1);
        }

        return true;
    }

    /**
     * Validate phone number
     *
     * @param array $data
     */
    public static function phone($data)
    {
        preg_match(self::PHONE_NUMBER_PATTERN, $data, $phoneNumberMatches);

        if (!is_array($phoneNumberMatches) || count($phoneNumberMatches) == 0) {
            throw new \Bliskapaczka\ApiClient\Exception('Invalid phone number', 1);
        }

        return true;
    }
}
