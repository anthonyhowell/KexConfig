<?php

namespace Pax\Config\Test;

use Pax\Config\Model\IntegerConfig;


/**
 * Class IntegerConfigTest
 * @package Pax\Config\Test
 *
 * @author Anthony Howell <anthonyhowell@gmail.com>
 */
class IntegerConfigTest extends ConfigTestCase
{

    const VALUE = 5;


    public function getConfigTypeClass()
    {
        return IntegerConfig::class;
    }

    public function testValue()
    {
        $config = new IntegerConfig();
        $config->setValue(self::VALUE);
        $this->assertEquals(self::VALUE, $config->getValue());
        $this->assertTrue(is_integer($config->getValue()));
        $this->assertTrue(true);
    }

}