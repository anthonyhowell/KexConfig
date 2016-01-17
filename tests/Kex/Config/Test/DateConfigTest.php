<?php

namespace Kex\Config\Test;

use Kex\Config\Model\DateConfig;


/**
 * Class DateConfigTest
 * @package Kex\Config\Test
 *
 * @author Anthony Howell <anthonyhowell@gmail.com>
 */
class DateConfigTest extends ConfigTestCase
{

    /**
     * {@inheritdoc}
     */
    public function getNewConfig()
    {
        return new DateConfig();
    }

    public function testValue()
    {
        $config = $this->getNewConfig();
        $config->setValue(new \DateTime());
        $this->assertTrue($config->getValue() instanceof \DateTime);
    }

}