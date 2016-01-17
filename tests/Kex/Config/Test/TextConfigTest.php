<?php

namespace Kex\Config\Test;

use Kex\Config\Model\TextConfig;


/**
 * Class TextConfigTest
 * @package Kex\Config\Test
 *
 * @author Anthony Howell <anthonyhowell@gmail.com>
 */
class TextConfigTest
{

    const VALUE = 'foo';


    public function getNewConfig()
    {
        return new TextConfig();
    }

    public function testValue()
    {
        $config = $this->getNewConfig();
        $config->setValue(self::VALUE);
        $this->assertEquals(self::VALUE, $config->getValue());
        $this->assertTrue(is_string($config->getValue()));
    }

}