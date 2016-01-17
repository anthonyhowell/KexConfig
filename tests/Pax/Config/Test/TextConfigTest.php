<?php

namespace Pax\Config\Test;

use Pax\Config\Model\TextConfig;


/**
 * Class TextConfigTest
 * @package Pax\Config\Test
 *
 * @author Anthony Howell <anthonyhowell@gmail.com>
 */
class TextConfigTest
{

    const VALUE = 'foo';


    public function getConfigTypeClass()
    {
        return TextConfig::class;
    }

    public function testValue()
    {
        $config = new TextConfig();
        $config->setValue(self::VALUE);
        $this->assertEquals(self::VALUE, $config->getValue());
        $this->assertTrue(is_string($config->getValue()));
    }

}