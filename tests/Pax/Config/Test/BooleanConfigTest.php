<?php

namespace Pax\Config\Test;
use Pax\Config\Model\BooleanConfig;


/**
 * Class BooleanTest
 * @package Pax\Config\Test
 *
 * @author Anthony Howell <anthonyhowell@gmail.com>
 */
class BooleanConfigTest extends ConfigTestCase
{

    public function getConfigTypeClass()
    {
        return BooleanConfig::class;
    }

    public function testValue()
    {
        $config = new BooleanConfig();
        $config->setValue(true);
        $this->assertEquals($config->getValue(), true);
    }

}