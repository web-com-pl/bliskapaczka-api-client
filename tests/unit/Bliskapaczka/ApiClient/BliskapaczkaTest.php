<?php

namespace Bliskapaczka;

use PHPUnit\Framework\TestCase;

class BliskapaczkaTest extends TestCase
{
    public function testClassExists()
    {
        $this->assertTrue(class_exists('Bliskapaczka\ApiClient\Bliskapaczka'));
    }
}
