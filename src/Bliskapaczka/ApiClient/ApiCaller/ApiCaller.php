<?php

namespace Bliskapaczka\ApiClient\ApiCaller;

use Bliskapaczka\ApiClient\Logger;

/**
 * Class ApiCaller
 *
 * @package            Bliskapaczka\ApiClient\ApiCaller
 * @codeCoverageIgnore That makes a HTTP request with the bpost API
 */
class ApiCaller
{

    /**
 * @var Logger
*/
    private $logger;

    /**
     * ApiCaller constructor.
     *
     * @param Logger $logger
     */
    public function __construct(Logger $logger = null)
    {
        $this->logger = $logger;
    }

    /**
     * @param array $options
     * @return bool
     */
    public function doCall(array $options)
    {
        $curl = curl_init();

        $options[CURLOPT_RETURNTRANSFER] = 1;

        curl_setopt_array($curl, $options);

        $response = curl_exec($curl);
        $error = curl_error($curl);

        return $response;
    }
}
