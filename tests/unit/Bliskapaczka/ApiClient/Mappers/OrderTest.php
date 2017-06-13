<?php

namespace Bliskapaczka\ApiClient;

use Bliskapaczka\ApiClient\Mappers\Order;
use PHPUnit\Framework\TestCase;

class OrderTest extends TestCase
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
            "parcels" => [
                [
                    "dimensions" => [
                        "height" => 20,
                        "length" => 20,
                        "width" => 20,
                        "weight" => 2
                    ]
                ]
            ]
        ];
    }

    public function testClassExists()
    {
        $this->assertTrue(class_exists('Bliskapaczka\ApiClient\Mappers\Order'));
    }

    public function testCreateFromArray()
    {
        $order = Order::createFromArray($this->orderData);
        $order->validate();

        $this->assertEquals('Bliskapaczka\ApiClient\Mappers\Order', get_class($order));
    }

    public function testObjectToJson()
    {
        $order = Order::createFromArray($this->orderData);

        $this->assertTrue(is_json($order->toJson()));
    }

    /**
     * @expectedException Bliskapaczka\ApiClient\Exception
     * @expectedExceptionMessage Invalid phone number
     */
    public function testReceiverPhoneNumberValidation()
    {
        $this->orderData['receiverPhoneNumber'] = 'string';

        $order = Order::createFromArray($this->orderData);
        $order->validate();
    }

    /**
     * @expectedException Bliskapaczka\ApiClient\Exception
     * @expectedExceptionMessage Invalid sender post code
     */
    public function testSenderPostCodeValidation()
    {
        $this->orderData['senderPostCode'] = 'string';

        $order = Order::createFromArray($this->orderData);
        $order->validate();
    }

    /**
     * @expectedException Bliskapaczka\ApiClient\Exception
     * @expectedExceptionMessage Invalid parcels
     */
    public function testParcelsValidation()
    {
        $this->orderData['parcels'] = 'string';

        $order = Order::createFromArray($this->orderData);
        $order->validate();
    }

    /**
     * @expectedException Bliskapaczka\ApiClient\Exception
     * @expectedExceptionMessageRegExp /Invalid \w+/
     */
    public function testRestOfPropertiesValidation()
    {
        $this->orderData['senderFlatNumber'] = '';

        $order = Order::createFromArray($this->orderData);
        $order->validate();
    }

    /**
     * @expectedException Bliskapaczka\ApiClient\Exception
     * @expectedExceptionMessage Dimesnion must be grate than 0
     */
    public function testParcelDimensionsValidation()
    {
        $this->orderData['parcels'][0]['dimensions']['height'] = 0;

        $order = Order::createFromArray($this->orderData);
        $order->validate();

        $this->orderData['parcels'][0]['dimensions']['height'] = -1;

        $order = Order::createFromArray($this->orderData);
        $order->validate();
    }
}
