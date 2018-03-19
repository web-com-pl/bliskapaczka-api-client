<?php

namespace Bliskapaczka\ApiClient\Validator\Order\Advice;

use Bliskapaczka\ApiClient\ValidatorInterface;
use Bliskapaczka\ApiClient\Validator\Order\Advice\Sender;
use PHPUnit\Framework\TestCase;

class SenderTest extends TestCase
{
    protected function setUp()
    {
        $this->orderData = [
            "senderFirstName" => "string",
            "senderLastName" => "string",
            "senderPhoneNumber" => "606555433",
            "senderEmail" => "bob@example.com",
            "senderStreet" => "string",
            "senderBuildingNumber" => "string",
            "senderFlatNumber" => "string",
            "senderPostCode" => "54-130",
            "senderCity" => "string",
            "receiverFirstName" => "string",
            "receiverLastName" => "string",
            "receiverPhoneNumber" => "600555432",
            "receiverEmail" => "eva@example.com",
            "operatorName" => "INPOST",
            "destinationCode" => "KRA010",
            "postingCode" => "KRA011",
            "codValue" => 0,
            "insuranceValue" => 0,
            "additionalInformation" => "string",
            "parcel" => [
                "dimensions" => [
                    "height" => 20,
                    "length" => 20,
                    "width" => 20,
                    "weight" => 2
                ]
            ]
        ];
    }

    public function testClassExists()
    {
        $this->assertTrue(class_exists('Bliskapaczka\ApiClient\Validator\Order\Advice\Sender'));
    }

    public function testClassImplementInterface()
    {
        $order = new Sender();
        $this->assertTrue(is_a($order, 'Bliskapaczka\ApiClient\ValidatorInterface'));
    }

    /**
     * @expectedException Bliskapaczka\ApiClient\Exception
     * @expectedExceptionMessageRegExp /Invalid \w+/
     */
    public function testSenderPostCodeShouldntbeValid()
    {
        $this->orderData['senderPostCode'] = 'string';

        $order = new Sender();
        $order->setData($this->orderData);
        $order->validate();
    }

    /**
     * @expectedException Bliskapaczka\ApiClient\Exception
     * @expectedExceptionMessageRegExp /\w+ is required/
     */
    public function testSenderPostCodeShouldntbeNotEmpty()
    {
        unset($this->orderData['senderPostCode']);

        $order = new Sender();
        $order->setData($this->orderData);
        $order->validate();
    }
}
