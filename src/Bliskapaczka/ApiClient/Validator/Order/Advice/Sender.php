<?php

namespace Bliskapaczka\ApiClient\Validator\Order\Advice;

use Bliskapaczka\ApiClient\Validator\Order\Advice;
use Bliskapaczka\ApiClient\AbstractValidator;
use Bliskapaczka\ApiClient\ValidatorInterface;
use Bliskapaczka\ApiClient\Exception;

/**
 * Sender Data Validator class
 *
 * @author  Mateusz Koszutowski (mkoszutowski@divante.pl)
 * @version 0.1.0
 */
class Sender extends Advice implements ValidatorInterface
{
    /**
     * Basic validation for data
     */
    protected function validationByProperty()
    {
        foreach ($this->properties as $property => $settings) {
            if (!isset($this->data[$property])) {
                throw new Exception($property . " is required", 1);
            }

            $this->notBlank($property, $settings);
            $this->maxLength($property, $settings);
            $this->specificValidation($property);
        }
    }
}
