<?php

namespace Bliskapaczka\ApiClient\Bliskapaczka;

use Bliskapaczka\ApiClient\Config;
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

        $apiKey = '6061914b-47d3-42de-96bf-0004a57f1dba';
        $this->configMock = $this->getMockBuilder(Config::class)
                                     ->disableOriginalConstructor()
                                     ->disableOriginalClone()
                                     ->disableArgumentCloning()
                                     ->disallowMockingUnknownTypes()
                                     ->setMethods(
                                         array(
                                             'getApiKey'
                                         )
                                     )
                                     ->getMock();

        $this->configMock->method('getApiKey')->will($this->returnValue($apiKey));
    }

    public function testClassExists()
    {
        $this->assertTrue(class_exists('Bliskapaczka\ApiClient\Bliskapaczka\Pricing'));
    }

    public function testGetUrl()
    {
        $apiUrl = 'http://localhost:1234';
        
        $apiClientPricing = new Pricing($this->configMock);
        $apiClientPricing->setApiUrl($apiUrl);

        $this->assertEquals('pricing', $apiClientPricing->getUrl());
    }

    public function testGet()
    {
        $apiUrl = 'http://localhost:1234';
        
        $apiClientPricing = new Pricing($this->configMock);
        $apiClientPricing->setApiUrl($apiUrl);

        $apiClientPricing->get($this->pricingData);
    }
}
