<?php

namespace Bliskapaczka\ApiClient\Bliskapaczka;

use Bliskapaczka\ApiClient\Config;
use Bliskapaczka\ApiClient\Bliskapaczka\Pos;
use PHPUnit\Framework\TestCase;

class PosTest extends TestCase
{
    protected function setUp()
    {
        $this->operator = 'ruch';
        $this->pointCode = '112345';

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
        $this->assertTrue(class_exists('Bliskapaczka\ApiClient\Bliskapaczka\Pos'));
    }

    public function testGetUrl()
    {
        $apiUrl = 'http://localhost:1234';
        
        $apiClientPos = new Pos($this->configMock);
        $apiClientPos->setApiUrl($apiUrl);
        $apiClientPos->setOperator($this->operator);
        $apiClientPos->setPointCode($this->pointCode);

        $this->assertEquals('pos/' . $this->operator . '/' . $this->pointCode, $apiClientPos->getUrl());
    }

    public function testGet()
    {
        $apiUrl = 'http://localhost:1234';
        
        $apiClientPos = new Pos($this->configMock);
        $apiClientPos->setApiUrl($apiUrl);
        $apiClientPos->setOperator($this->operator);
        $apiClientPos->setPointCode($this->pointCode);

        $apiClientPos->get();
    }

    /**
     * @expectedException Bliskapaczka\ApiClient\Exception
     * @expectedExceptionMessage Please set valid operator name or valid point code
     */
    public function testGetUrlForEmptyPointCode()
    {
        $apiUrl = 'http://localhost:1234';

        $apiClientPos = new Pos($this->configMock);
        $apiClientPos->setOperator($this->operator);

        var_dump($apiClientPos->getUrl());
    }

    /**
     * @expectedException Bliskapaczka\ApiClient\Exception
     * @expectedExceptionMessage Please set valid operator name or valid point code
     */
    public function testGetUrlForEmptyOperator()
    {
        $apiUrl = 'http://localhost:1234';

        $apiClientPos = new Pos($this->configMock);
        $apiClientPos->setPointCode($this->pointCode);

        var_dump($apiClientPos->getUrl());
    }
}
