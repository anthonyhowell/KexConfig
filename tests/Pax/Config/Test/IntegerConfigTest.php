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


    public function getNewConfig()
    {
        return new IntegerConfig();
    }

    public function testValue()
    {
        $config = $this->getNewConfig();
        $config->setValue(self::VALUE);
        $this->assertEquals(self::VALUE, $config->getValue());
        $this->assertTrue(is_integer($config->getValue()));
        $this->assertTrue(true);
    }

}