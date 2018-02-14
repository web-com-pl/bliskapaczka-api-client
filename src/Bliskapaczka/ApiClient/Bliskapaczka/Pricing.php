<?php

namespace Bliskapaczka\ApiClient\Bliskapaczka;

use Bliskapaczka\ApiClient\AbstractBliskapaczka;

/**
 * Bliskapaczka class
 *
 * @author  Mateusz Koszutowski (mkoszutowski@divante.pl)
 * @version 0.1.0
 */
class Pricing extends AbstractBliskapaczka
{
    const REQUEST_URL = 'pricing';

    /**
     * Call API method create order
     *
     * @param array $data
     */
    public function get(array $data)
    {
        $response = $this->doCall($this->getUrl(), json_encode($data), array(), 'POST');

        return $response;
    }
}
