<?php

namespace Bliskapaczka\ApiClient\Bliskapaczka\Order;

use Bliskapaczka\ApiClient\Config;
use Bliskapaczka\ApiClient\Bliskapaczka\Order\Confirm;
use PHPUnit\Framework\TestCase;

class ConfirmTest extends TestCase
{
    protected function setUp()
    {
        $this->operator = 'POCZTA';

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
        $this->assertTrue(class_exists('Bliskapaczka\ApiClient\Bliskapaczka\Order\Confirm'));
    }

    /**
     * @expectedException Bliskapaczka\ApiClient\Exception
     * @expectedExceptionMessage Please set valid operator name
     */
    public function testGetUrlForEmptyId()
    {
        $apiUrl = 'http://localhost:1234';
        $id = '';
        
        $apiClientOrder = new Confirm($this->configMock);
        $apiClientOrder->setApiUrl($apiUrl);

        $apiClientOrder->getUrl();
    }

    public function testGetUrl()
    {
        $apiUrl = 'http://localhost:1234';
        
        $apiClientOrder = new Confirm($this->configMock);
        $apiClientOrder->setApiUrl($apiUrl);
        $apiClientOrder->setOperator($this->operator);

        $this->assertEquals('orders/confirm?operatorName=' . $this->operator, $apiClientOrder->getUrl());
    }

    public function testConfirm()
    {
        $apiUrl = 'http://localhost:1234';
        
        $apiClientOrder = new Confirm($this->configMock);
        $apiClientOrder->setApiUrl($apiUrl);
        $apiClientOrder->setOperator($this->operator);

        $apiClientOrder->confirm();
    }
}
