<?php

namespace Bliskapaczka\ApiClient\Bliskapaczka;

use Bliskapaczka\ApiClient\BliskapaczkaInterface;
use Bliskapaczka\ApiClient\AbstractBliskapaczka;
// use Bliskapaczka\ApiClient\Mappers\Order as MappersOrder;

/**
 * Bliskapaczka class
 *
 * @author  Mateusz Koszutowski (mkoszutowski@divante.pl)
 * @version 0.1.0
 */
class Order extends AbstractBliskapaczka implements BliskapaczkaInterface
{
    const REQUEST_URL = 'order';

    /**
     * Call API method create order
     *
     * @param array $data
     */
    public function create(array $data)
    {
        $this->validate($data);

        $response = $this->doCall($this->getUrl(), json_encode($data), array(), 'POST');

        return $response;
    }

    public function validate(array $data)
    {

    }
}
