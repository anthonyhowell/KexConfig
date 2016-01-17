<?php

namespace Kex\Config\Test;

use Kex\Config\Model\BooleanConfig;


/**
 * Class BooleanTest
 * @package Kex\Config\Test
 *
 * @author Anthony Howell <anthonyhowell@gmail.com>
 */
class BooleanConfigTest extends ConfigTestCase
{

    public function getNewConfig()
    {
        return new BooleanConfig();
    }

    public function testValue()
    {
        $config = $this->getNewConfig();
        $config->setValue(true);
        $this->assertEquals($config->getValue(), true);
    }

}