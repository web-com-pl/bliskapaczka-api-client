<?php

namespace Bliskapaczka\ApiClient;

use Bliskapaczka\ApiClient\Mappers\Order;
use PHPUnit\Framework\TestCase;

class ValidatorTest extends TestCase
{
    public function testClassExists()
    {
        $this->assertTrue(class_exists('Bliskapaczka\ApiClient\Mappers\Order\Validator'));
    }

    /**
     * @expectedException Bliskapaczka\ApiClient\Exception
     * @expectedExceptionMessage Invalid email
     */
    public function testForInvalidEmail()
    {
        Order\Validator::email('string');
    }

    public function testForValidEmail()
    {
        $this->assertTrue(Order\Validator::email('bob@example.com'));
    }


    /**
     * @expectedException Bliskapaczka\ApiClient\Exception
     * @expectedExceptionMessage Invalid phone number
     */
    public function testSenderPhoneNumberValidation()
    {
        Order\Validator::phone('string');
    }
}
