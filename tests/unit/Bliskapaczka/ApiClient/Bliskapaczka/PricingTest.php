<?php

namespace Bliskapaczka\ApiClient\Bliskapaczka;

use Bliskapaczka\ApiClient\Bliskapaczka\Pricing;
use PHPUnit\Framework\TestCase;

class PricingTest extends TestCase
{
    protected function setUp()
    {
        $this->pricingData = [
            "dimensions" => [
                "height" => 20,
                "length" => 20,
                "width" => 20,
                "weight" => 2
            ]
        ];
    }

    public function testClassExists()
    {
        $this->assertTrue(class_exists('Bliskapaczka\ApiClient\Bliskapaczka\Pricing'));
    }

    public function testGetUrl()
    {
        $apiKey = '6061914b-47d3-42de-96bf-0004a57f1dba';
        $apiUrl = 'http://localhost:1234';
        
        $apiClientOrder = new \Bliskapaczka\ApiClient\Bliskapaczka\Pricing($apiKey);
        $apiClientOrder->setApiUrl($apiUrl);

        $this->assertEquals('pricing', $apiClientOrder->getUrl());
    }

    public function testGet()
    {
        $apiKey = '6061914b-47d3-42de-96bf-0004a57f1dba';
        $apiUrl = 'http://localhost:1234';
        
        $apiClientOrder = new \Bliskapaczka\ApiClient\Bliskapaczka\Pricing($apiKey);
        $apiClientOrder->setApiUrl($apiUrl);

        $apiClientOrder->get($this->pricingData);
    }
}
