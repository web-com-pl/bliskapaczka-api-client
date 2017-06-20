<?php

namespace Bliskapaczka;

use PHPUnit\Framework\TestCase;

class BliskapaczkaTest extends TestCase
{
    public function testClassExists()
    {
        $this->assertTrue(class_exists('Bliskapaczka\ApiClient\Bliskapaczka'));
    }

    public function testGetApiUrl()
    {
        $apiKey = '6061914b-47d3-42de-96bf-0004a57f1dba';
        $apiClient = new \Bliskapaczka\ApiClient\Bliskapaczka($apiKey);

        $url = $apiClient->getApiUrl('prod');
        $this->assertEquals('https://api.bliskapaczka.pl', $url);

        $url = $apiClient->getApiUrl('test');
        $this->assertEquals('https://api.sandbox-bliskapaczka.pl', $url);
    }
}
