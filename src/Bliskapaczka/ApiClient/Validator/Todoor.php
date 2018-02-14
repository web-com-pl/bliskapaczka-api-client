<?php

namespace Bliskapaczka\ApiClient\Validator;

use Bliskapaczka\ApiClient\AbstractValidator;
use Bliskapaczka\ApiClient\ValidatorInterface;
use Bliskapaczka\ApiClient\Exception;

/**
 * Todoor Mapper class
 *
 * @author  Mateusz Koszutowski (mkoszutowski@divante.pl)
 * @version 0.1.0
 */
class Todoor extends AbstractValidator implements ValidatorInterface
{
    private $properties = [
        'senderEmail' => ['maxlength' => 60, 'notblank' => true],
        'receiverEmail' => ['maxlength' => 60],
        'senderPhoneNumber',
        'receiverPhoneNumber',
        'senderPostCode',
        'senderFirstName' => ['maxlength' => 30, 'notblank' => true],
        'senderLastName' => ['maxlength' => 30, 'notblank' => true],
        'senderStreet' => ['maxlength' => 30, 'notblank' => true],
        'senderBuildingNumber' => ['maxlength' => 10, 'notblank' => true],
        'senderFlatNumber' => ['maxlength' => 10],
        'senderCity' => ['maxlength' => 30, 'notblank' => true],
        'receiverFirstName' => ['maxlength' => 30, 'notblank' => true],
        'receiverLastName' => ['maxlength' => 30, 'notblank' => true],
        'receiverStreet' => ['maxlength' => 30, 'notblank' => true],
        'receiverBuildingNumber' => ['maxlength' => 10, 'notblank' => true],
        'receiverFlatNumber' => ['maxlength' => 10],
        'receiverPostCode',
        'receiverCity' => ['maxlength' => 30, 'notblank' => true],
        'operatorName' => ['notblank' => true],
        'postingCode',
        'codValue',
        'insuranceValue',
        'additionalInformation',
        'parcel'
    ];

    /**
     * Validate data
     */
    public function validate()
    {
        /* Original Bliskapaczka validator regexps
        numer konta: /^\d{26}$/
        nip: /^\d{10}$/
        kod pocztowy: /^\d{2}\-\d{3}$/

        @NotBlank
        @Size(max = 30)
        private String senderFirstName;
        @NotBlank
        @Size(max = 30)
        private String senderLastName;
        @NotBlank
        @PhoneNumber
        private String senderPhoneNumber;
        @NotBlank
        @Email
        @Size(max = 60)
        private String senderEmail;
        @NotBlank
        @Size(max = 30)
        private String senderStreet;
        @NotBlank
        @Size(max = 10)
        private String senderBuildingNumber;
        @Size(max = 10)
        private String senderFlatNumber;
        @NotBlank
        @PostCode
        private String senderPostCode;
        @NotBlank
        @Size(max = 30)
        private String senderCity;

        @NotBlank
        @Size(max = 30)
        private String receiverFirstName;
        @NotBlank
        @Size(max = 30)
        private String receiverLastName;
        @NotBlank
        @PhoneNumber
        private String receiverPhoneNumber;
        @NotBlank
        @Email
        @Size(max = 60)
        private String receiverEmail;
        @NotBlank
        private OperatorName operatorName;
        */

        # Rest of required string properties
        foreach ($this->properties as $property => $settings) {
            if (
                isset($settings['notblank'])
                && isset($settings['notblank']) === true
                && (is_null($this->data[$property]) || strlen($this->data[$property]) == 0)
            ) {
                throw new Exception('Invalid ' . $property, 1);
            }
            
            if (
                isset($settings['maxlength'])
                && $settings['maxlength'] > 0
                && strlen($this->data[$property]) > $settings['maxlength']
            ) {
                throw new Exception('Invalid ' . $property, 1); 
            }
        }

        # Firstname Validation
        if ($this->data['senderFirstName']) {
            
        }

        # Email validation
        if ($this->data['senderEmail']) {
            self::email($this->data['senderEmail']);
        }
        self::email($this->data['receiverEmail']);

        # Phone number validation
        if ($this->data['senderPhoneNumber']) {
            self::phone($this->data['senderPhoneNumber']);
        }
        self::phone($this->data['receiverPhoneNumber']);

        # Post code validation
        if ($this->data['senderPostCode']) {
            self::postCode($this->data['senderPostCode']);
        }
        self::postCode($this->data['receiverPostCode']);

        # Parcel validation
        self::parcel($this->data['parcel']);
    }

    /**
     * Validate parcel
     *
     * @param array $data
     */
    public static function parcel($data)
    {
        if (!is_array($data) || !array_key_exists('dimensions', $data)) {
            throw new \Bliskapaczka\ApiClient\Exception('Invalid parcel', 1);
        }

        $dimensions = ['height', 'length', 'width', 'weight'];

        # Parcel dimesnsions should be graten than 0
        foreach ($dimensions as $dimension) {
            if ($data['dimensions'][$dimension] <= 0) {
                throw new \Bliskapaczka\ApiClient\Exception('Dimesnion must be greater than 0', 1);
            }
        }
    }
}
