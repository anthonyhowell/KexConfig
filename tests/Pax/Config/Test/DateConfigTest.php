<?php

namespace Pax\Config\Test;

use Pax\Config\Model\DateConfig;


/**
 * Class DateConfigTest
 * @package Pax\Config\Test
 *
 * @author Anthony Howell <anthonyhowell@gmail.com>
 */
class DateConfigTest extends ConfigTestCase
{

    /**
     * {@inheritdoc}
     */
    public function getConfigTypeClass()
    {
        return DateConfig::class;
    }

    public function testValue()
    {
        $config = new DateConfig();
        $config->setValue(new \DateTime());
        $this->assertTrue($config->getValue() instanceof \DateTime);
    }

}