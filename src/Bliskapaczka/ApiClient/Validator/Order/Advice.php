<?php

namespace Bliskapaczka\ApiClient\Validator\Order;

use Bliskapaczka\ApiClient\Validator\Order;
use Bliskapaczka\ApiClient\AbstractValidator;
use Bliskapaczka\ApiClient\ValidatorInterface;
use Bliskapaczka\ApiClient\Exception;

/**
 * Order Validator class
 *
 * @author  Mateusz Koszutowski (mkoszutowski@divante.pl)
 * @version 0.1.0
 */
class Advice extends Order implements ValidatorInterface
{
    /**
     * Basic validation for data
     */
    protected function validationByProperty()
    {
        foreach ($this->properties as $property => $settings) {
            if (!isset($this->data[$property]) && isset($settings['notblank']) && $settings['notblank'] === true) {
                throw new Exception($property . " is required", 1);
            } elseif (!isset($this->data[$property]) && isset($settings['notblankor']) && $settings['notblankor'][0] === true && !isset($this->data[$settings['notblankor'][1]])) {
                throw new Exception($property . " is required", 1);
            }

            $this->notBlank($property, $settings);
            $this->maxLength($property, $settings);
            $this->specificValidation($property);
        }
    }
}
