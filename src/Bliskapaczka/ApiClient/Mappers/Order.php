<?php

namespace Bliskapaczka\ApiClient\Mappers;

/**
 * Order Mapper class
 *
 * @author  Mateusz Koszutowski (mkoszutowski@divante.pl)
 * @version 0.1.0
 */
class Order
{
    private $senderEmail;
    private $receiverEmail;
    private $senderPhoneNumber;
    private $receiverPhoneNumber;
    private $senderPostCode;
    private $senderFirstName;
    private $senderLastName;
    private $senderStreet;
    private $senderBuildingNumber;
    private $senderFlatNumber;
    private $senderCity;
    private $receiverFirstName;
    private $receiverLastName;
    private $operatorName;
    private $destinationCode;
    private $postingCode;
    private $codValue;
    private $insuranceValue;
    private $additionalInformation;
    private $parcels;

    /**
     * Magic method implementation
     *
     * @param string $property
     */
    public function __get($property)
    {
        if (property_exists($this, $property)) {
            return $this->$property;
        }
    }

    /**
     * Magic method implementation
     *
     * @param string $property
     * @param mixed $value
     */
    public function __set($property, $value)
    {
        if (property_exists($this, $property)) {
              $this->$property = $value;
        }

        return $this;
    }

    /**
     * Create new instance of this class with data mapped form array
     *
     * @param array $data
     */
    public static function createFromArray(array $data)
    {
        $order = new self();

        foreach ($data as $key => $value) {
            $order->$key = $value;
        }

        return $order;
    }

    /**
     * Validate data
     */
    public function validate()
    {
        
        $postCodePattern = '/^\d{2}\-\d{3}$/';

        /* Original Bliskapaczka validator regexps
        numer konta: /^\d{26}$/
        nip: /^\d{10}$/
        kod pocztowy: /^\d{2}\-\d{3}$/
        */

        # Email validation
        if ($this->senderEmail) {
            Order\Validator::email($this->senderEmail);
        }
        Order\Validator::email($this->receiverEmail);

        # Phone number validation
        if ($this->senderPhoneNumber) {
            Order\Validator::phone($this->senderPhoneNumber);
        }
        Order\Validator::phone($this->receiverPhoneNumber);


        # Post code validation
        if ($this->senderPhoneNumber) {
            preg_match($postCodePattern, $this->senderPostCode, $senderPostCodeMatches);

            if (!is_array($senderPostCodeMatches) || count($senderPostCodeMatches) == 0) {
                throw new \Bliskapaczka\ApiClient\Exception('Invalid sender post code', 1);
            }
        }

        # Parcels validation
        if (!is_array($this->parcels) || !array_key_exists('dimensions', $this->parcels[0])) {
            throw new \Bliskapaczka\ApiClient\Exception('Invalid parcels', 1);
        }

        $dimensions = ['height', 'length', 'width', 'weight'];

        # Parcel dimesnsions should be graten than 0
        foreach ($dimensions as $dimension) {
            if ($this->parcels[0]['dimensions'][$dimension] <= 0) {
                throw new \Bliskapaczka\ApiClient\Exception('Dimesnion must be grate than 0', 1);
            }
        }

        # Rest of string properties
        $properties = [
            'receiverFirstName',
            'receiverLastName',
            'operatorName',
            'destinationCode'
        ];

        foreach ($properties as $property) {
            if (is_null($this->$property) || strlen($this->$property) == 0) {
                throw new \Bliskapaczka\ApiClient\Exception('Invalid ' . $property, 1);
            }
        }
    }
}
