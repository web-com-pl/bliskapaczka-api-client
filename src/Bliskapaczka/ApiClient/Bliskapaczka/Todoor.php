<?php

namespace Bliskapaczka\ApiClient\Bliskapaczka;

use Bliskapaczka\ApiClient\BliskapaczkaInterface;
use Bliskapaczka\ApiClient\AbstractBliskapaczka;

/**
 * Bliskapaczka class
 *
 * @author  Mateusz Koszutowski (mkoszutowski@divante.pl)
 */
class Todoor extends Order implements BliskapaczkaInterface
{

    const REQUEST_URL = 'order';

    /**
     * Call API method configuration options
     *
     * @return json $response
     */
    public function get()
    {
        $response = $this->doCall($this->getUrl(), '', array(), 'GET');

        return $response;
    }

//    public function validate(array $data)
//    {
//        return true;
//    }

}
