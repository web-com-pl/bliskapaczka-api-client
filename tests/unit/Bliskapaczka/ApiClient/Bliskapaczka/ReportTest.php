<?php

namespace Bliskapaczka\ApiClient\Bliskapaczka;

use Bliskapaczka\ApiClient\Config;
use Bliskapaczka\ApiClient\Bliskapaczka\Report;
use PHPUnit\Framework\TestCase;

class ReportTest extends TestCase
{
    protected function setUp()
    {
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
        $this->assertTrue(class_exists('Bliskapaczka\ApiClient\Bliskapaczka\Report'));
    }

    /**
     * @expectedException Bliskapaczka\ApiClient\Exception
     * @expectedExceptionMessage Please set valid operator name or valid order numbers
     */
    public function testGetForEmptyOperatorAndNumbers()
    {
        $apiUrl = 'http://localhost:1234';
        $id = '';

        $apiClientReport = new Report($this->configMock);
        $apiClientReport->setApiUrl($apiUrl);

        $apiClientReport->get();
    }

    public function testGetUrl()
    {
        $apiUrl = 'http://localhost:1234';
        $operator = 'ruch';
        
        $apiClientReport = new Report($this->configMock);
        $apiClientReport->setApiUrl($apiUrl);
        $apiClientReport->setOperator($operator);

        $this->assertEquals('report/pickupconfirmation/' . $operator, $apiClientReport->getUrl());
    }

    public function testGetUrlWithStartPeriod()
    {
        $apiUrl = 'http://localhost:1234';
        $operator = 'ruch';
        $date = '2017-10-23T12:00:00';
        
        $apiClientReport = new Report($this->configMock);
        $apiClientReport->setApiUrl($apiUrl);
        $apiClientReport->setOperator($operator);
        $apiClientReport->setStartPeriod($date);

        $this->assertEquals(
            'report/pickupconfirmation/' . $operator . '?startPeriod=2017-10-23T12:00:00',
            $apiClientReport->getUrl()
        );

        $date = '2017-10-23';
        $apiClientReport->setStartPeriod($date);

        $this->assertEquals(
            'report/pickupconfirmation/' . $operator . '?startPeriod=2017-10-23T00:00:00',
            $apiClientReport->getUrl()
        );
    }

    public function testGet()
    {
        $apiUrl = 'http://localhost:1234';
        $operator = 'ruch';
        
        $apiClientReport = new Report($this->configMock);
        $apiClientReport->setApiUrl($apiUrl);
        $apiClientReport->setOperator($operator);

        $apiClientReport->get();
    }

    public function testGetUrlWithNumbers()
    {
        $apiUrl = 'http://localhost:1234';
        $numbers = '000000001P-0000000001,000000001P-0000000002';

        $apiClientReport = new Report($this->configMock);
        $apiClientReport->setApiUrl($apiUrl);
        $apiClientReport->setNumbers($numbers);

        $this->assertEquals(
            'report/pickupconfirmation?numbers=' . $numbers,
            $apiClientReport->getUrl()
        );
    }

    public function testGetNumbers()
    {
        $apiUrl = 'http://localhost:1234';
        $numbers = '000000001P-0000000001,000000001P-0000000002';

        $apiClientReport = new Report($this->configMock);
        $apiClientReport->setApiUrl($apiUrl);
        $apiClientReport->setNumbers($numbers);

        $apiClientReport->get();
    }

    public function testTimeout()
    {
        $apiClient = new \Bliskapaczka\ApiClient\Bliskapaczka\Report($this->configMock);

        $this->assertEquals(10, $apiClient->getApiTimeout());
    }
}
