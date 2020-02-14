<?php

namespace Bliskapaczka\ApiClient\Bliskapaczka\Order;

use Bliskapaczka\ApiClient\BliskapaczkaInterface;
use Bliskapaczka\ApiClient\AbstractBliskapaczka;
use Bliskapaczka\ApiClient\Exception;

/**
 * Bliskapaczka class
 *
 * @author Radosław Barteczko
 */
class Tracking extends AbstractBliskapaczka implements BliskapaczkaInterface
{
    const REQUEST_URL = 'order/[[id]]/tracking';

    private $orderId = null;

    /**
     * Set order id
     *
     * @param string $orderId
     */
    public function setOrderId($orderId)
    {
        $this->orderId = $orderId;
    }

    /**
     * Return valid URL for API call get waybill for order
     *
     * @return string
     */
    public function getUrl()
    {
        if (!isset($this->orderId) || empty($this->orderId)) {
            throw new  Exception('Please set valid order ID', 1);
        }

        return str_replace('[[id]]', $this->orderId, static::REQUEST_URL);
    }

    /**
     * Call API method create order
     *
     * @return json $response
     */
    public function get()
    {
        $response = $this->doCall($this->getUrl(), json_encode(''), array(), 'GET');

        return $response;
    }

    /**
     * Validate data
     *
     * @param array $data
     * @return true
     */
    public function validate(array $data)
    {
        return true;
    }
}
