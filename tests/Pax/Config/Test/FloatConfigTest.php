<?php

namespace Pax\Config\Test;

use Pax\Config\Model\FloatConfig;


/**
 * Class FloatConfigTest
 * @package Pax\Config\Test
 *
 * @author Anthony Howell <anthonyhowell@gmail.com>
 */
class FloatConfigTest extends ConfigTestCase
{

    const VALUE = 5.22;


    public function getConfigTypeClass()
    {
        return FloatConfig::class;
    }

    public function testValue()
    {
        $config = new FloatConfig();
        $config->setValue(self::VALUE);
        $this->assertEquals(self::VALUE, $config->getValue());
        $this->assertTrue(is_float($config->getValue()));
    }

}