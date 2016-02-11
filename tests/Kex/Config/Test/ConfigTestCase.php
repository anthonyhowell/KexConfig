<?php

namespace Kex\Config\Test;

use PHPUnit_Framework_TestCase;


abstract class ConfigTestCase extends PHPUnit_Framework_TestCase
{

    const KEY   = 'key';
    const LABEL = 'label';


    /**
     * @return string
     */
    abstract public function getNewConfig();

    abstract public function testValue();

    public function testKey()
    {
        /** @var \Kex\Config\Model\ConfigInterface $config */
        $config = $this->getNewConfig();
        $config->setKey(self::KEY);
        $this->assertEquals(self::KEY, $config->getKey());
    }

    public function testLabel()
    {
        /** @var \Kex\Config\Model\ConfigInterface $config */
        $config = $this->getNewConfig();
        $config->setLabel(self::LABEL);
        $this->assertEquals(self::LABEL, $config->getLabel());
    }

}