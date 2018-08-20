<?php

namespace Bliskapaczka\ApiClient;

use PHPUnit\Framework\TestCase;

class ConfigTest extends TestCase
{
    public function testClassExists()
    {
        $this->assertTrue(class_exists('Bliskapaczka\ApiClient\Config'));
    }

    public function testStaticMethods()
    {
        $this->assertTrue(method_exists('Bliskapaczka\ApiClient\Config', 'get'));
    }

    public function testBearer()
    {
        $apiKey = '6061914b-47d3-42de-96bf-0004a57f1dba';

        $config = Config::get();
        $config->setApiKey($apiKey);

        $this->assertEquals($apiKey, $config->getApiKey());
    }

    public function testMode()
    {
        $config = Config::get();
        $this->assertEquals('prod', $config->getMode());

        $mode = 'test';
        $config->setMode($mode);

        $this->assertEquals($mode, $config->getMode());
    }
}
