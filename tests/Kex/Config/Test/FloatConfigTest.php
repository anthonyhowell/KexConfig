<?php

namespace Kex\Config\Test;

use Kex\Config\Model\FloatConfig;


/**
 * Class FloatConfigTest
 * @package Kex\Config\Test
 *
 * @author Anthony Howell <anthonyhowell@gmail.com>
 */
class FloatConfigTest extends ConfigTestCase
{

    const VALUE = 5.22;


    public function getNewConfig()
    {
        return new FloatConfig();
    }

    public function testValue()
    {
        $config = $this->getNewConfig();
        $config->setValue(self::VALUE);
        $this->assertEquals(self::VALUE, $config->getValue());
        $this->assertTrue(is_float($config->getValue()));
    }

}