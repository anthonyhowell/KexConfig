<?php

namespace Pax\Config\Test;

use Pax\Config\Model\StringConfig;


/**
 * Class StringConfigTest
 * @package Pax\Config\Test
 *
 * @author Anthony Howell <anthonyhowell@gmail.com>
 */
class StringConfigTest extends ConfigTestCase
{

    const VALUE = 'foo';


    public function getNewConfig()
    {
        return new StringConfig();
    }

    public function testValue()
    {
        $config = $this->getNewConfig();
        $config->setValue(self::VALUE);
        $this->assertEquals(self::VALUE, $config->getValue());
        $this->assertTrue(is_string($config->getValue()));
    }

}